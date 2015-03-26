<?php

$email=$_POST["email"];
$password=$_POST["password"];
include 'addDatabase.php';
$sql = 'select * from user where email="'.$email.'" and password =md5("'.$password.'")';
mysql_select_db('events');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

$row = mysql_fetch_array($retval);
if(empty($row))
{
  echo("Wrong user name or passsword");
}
else
{
 session_start();
 $_SESSION["uid"]=$row['uid'];
 $_SESSION["email"]=$_POST['email'];
 $_SESSION["role"]=$row['role'];
 $_SESSION["username"]=$row['name'];
 if($row['role']=='admin')
 {
  header('Location: viewUser.php');
}
elseif ($row['role']=='content') {
  header('Location: viewEvent.php');
}
elseif ($row['role']=='user') {
  header('Location: viewEvent.php'); 
}
}
mysql_close($conn);
?>
