<?php
  $eid=$_GET['eid'];
  $uid=$_GET['uid'];
  $img=$_GET['img'];
  $dbhost = 'localhost:3036';
  $dbuser = 'root';
  $dbpass = '123456';
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
  if(! $conn ){
      die('Could not connect: ' . mysql_error());
  }
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
 