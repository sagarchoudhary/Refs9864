  <?php

$uid[]=$_POST['uid'];

if($_POST['action']=='Delete'){
  include('deleteUser.php');
}
elseif ($_POST['action']=='Edit') {

  header('location:editUser.php?uid='.urldecode($uid[0][0]));
}

//header('location:viewUser.php');
?>
