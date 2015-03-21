<?php
  session_start();
  $uid=$_SESSION['uid'];
  $email=$_SESSION['email'];
  $role=$_SESSION['role'];
  //echo($role);
  if($role!='admin'){
    header('location:sign_in.html'); 
 }
  $name=$_POST["name"];
  $email=$_POST["email"];
  $password=$_POST["password"];
  $role=$_POST["role"];
  if(isset($_POST["add"]))
  {
  include('addDatabase.php');

	$sql = 'insert into user (name,email,password,role) values ("'.$name.'","'.$email.'","'.$password.'","'.$role.'")';

	mysql_select_db('events');
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
  	die('Could not enter data: ' . mysql_error());
	}
	else{
    header('location:landing.php');
  }
	mysql_close($conn);
  }	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Add user</h1>
	<form action="<?php $_PHP_SELF ?>" method="post">
  Name: <input type="text" name="name" />
  Email: <input type="text" name="email" />
  password:<input type="password" name="password">
  Role:
  <select name="role">
  <option value="user">User</option>
  <option value="content">Content manager</option>
  </select>
  <input name="add" type="submit" />
</form>
</body>
</html>   
