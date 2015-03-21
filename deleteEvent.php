<?php
  $eid=$_GET['eid'];
  $uid=$_GET['uid'];
  $img=$_GET['img'];
  $uid_session=$_SESSION['uid'];
  if($role!='admin'&&$role!='content'){
  header('location:sign_in.html'); 
}

if($role=='content'){
  if($uid!=$uid_session){
  header('location:sign_html');
}
}

 include('addDatabase.php');
  $sql = "delete from event where uid='".$uid."' and eid= '".$eid."'";

  mysql_select_db('events');
  $retval = mysql_query( $sql, $conn );
  unlink('uploads/'.$img);
  if(! $retval ){
      die('Could not enter data: ' . mysql_error());
  }
  else{
    header('location:viewEvent.php');
  }
   mysql_close($conn);
  ?>
 