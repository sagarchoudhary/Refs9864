<?php
  $uid=$_GET['uid'];
  $dbhost = 'localhost:3036';
  $dbuser = 'root';
  $dbpass = '123456';
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
  if(! $conn ){
      die('Could not connect: ' . mysql_error());
  }
  $sql = 'delete from user where uid='.$uid;

  mysql_select_db('events');
  $retval = mysql_query( $sql, $conn );
  if(! $retval ){
      die('Could not enter data: ' . mysql_error());
  }
  else{
    header('location:landing.php');
  }
   mysql_close($conn);
  ?>
 