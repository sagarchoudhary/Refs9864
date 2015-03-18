<?php
   
  $email=$_POST["email"];
  $password=$_POST["password"];
  $dbhost = 'localhost:3036';
  $dbuser = 'root';
  $dbpass = '123456';
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
	{
  die('Could not connect: ' . mysql_error());
	}

	$sql = 'select * from user where email="'.$email.'" and password ="'.$password.'" ';

	mysql_select_db('events');
	$retval = mysql_query( $sql, $conn );
  if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

  $row = mysql_fetch_array($retval);
  if(empty($row)){
  echo("wrong");
 }
else{
 session_start();
 $_SESSION["uid"]=$row['uid'];
 $_SESSION["email"]=$_POST['email'];
 $_SESSION["role"]=$row['role'];
 echo ($_SESSION["uid"]);
header('Location: landing.php');
}
	mysql_close($conn);

  	
?>
