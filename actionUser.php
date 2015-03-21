<?php

$uid[]=$_POST['uid'];

if($_POST['action']=='delete'){
  include('deleteUser.php');
}
elseif ($_POST['action']=='edit') {

  header('location:editUser.php?uid='.urldecode($uid[0][0]));
}

//header('location:viewUser.php');
?>
