

<?php
include('session.php');

if($role_session=='admin'){

header('location:viewEventAdmin.php');
}
elseif ($role_session=='content') {
	header('location:viewEventContent.php');
}
elseif ($role_session=='user') {
	header('location:viewEventUser.php');
}
	?>

