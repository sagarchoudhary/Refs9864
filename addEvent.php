<?php
  session_start();
  $uid=$_SESSION['uid'];
  $ename=$_POST["ename"];
  $eimg=$_POST["eimg"];
  $edescription=$_POST["edescription"];
  $owner=$_POST["owner"];
  if(isset($_POST["add"]))
  {
  $dbhost = 'localhost:3036';
  $dbuser = 'root';
  $dbpass = '123456';
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
	{
  die('Could not connect: ' . mysql_error());
	}

	$sql = 'insert into user (name,email,password,role) values ("'.$name.'","'.$email.'","'.$password.'","'.$role.'")';

	mysql_select_db('events');
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
  	die('Could not enter data: ' . mysql_error());
	}
	
	mysql_close($conn);
  }	
?>
<!DOCTYPE html>
<html>
<head>
	<title>add events</title>
</head>
<body>
<h1>Add events</h1>
	<form action="<?php $_PHP_SELF ?>" method="post">
  Event Name: <input type="text" name="ename" />
  Email: <input type="text" name="email" />
  Event Description:<input type="text" name="edescription">
  Role:
  <select name="owner">
  <option value="user">User</option>
  <option value="content">Content manager</option>
  </select>
  <input name="add" type="submit" />
</form>
</body>
</html>   
