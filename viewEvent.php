

<?php
session_start();
$uid=$_SESSION['uid'];
$email=$_SESSION['email'];
$role=$_SESSION['role'];

if($role=='admin'){

header('location:viewEventAdmin.php');
}
elseif ($role=='content') {
	header('location:viewEventContent.php');
}
elseif ($role=='user') {
	header('location:viewEventUser.php');
}
	?>

