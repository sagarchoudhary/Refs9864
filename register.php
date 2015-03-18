
<?php
  $name=$_POST["name"];
  $email=$_POST["email"];
  $password=$_POST["password"];
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

	$sql = 'insert into user (name,email,password,role) values ("'.$name.'","'.$email.'","'.$password.'","user")';

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
	<title>register</title>
</head>
<body>
<h1>Register to events</h1>
  <form action="<?php $_PHP_SELF ?>" method="post">
  Name: <input type="text" name="name" />
  Email: <input type="text" name="email" />
  password:<input type="password" name="password">
  <input name ="add" type="submit" />
  </form>
</body>
</html>