<?php


  include('addDatabase.php');
  foreach ($uid as $key => $value) {

    foreach ($value as $key1 => $id) {

      $sql = 'delete from user where uid='.$id;

  mysql_select_db('events');
  $retval = mysql_query( $sql, $conn );
  if(! $retval ){
      die('Could not enter data: ' . mysql_error());
  }
 
    }
      }
  
    header('location:viewUser.php');
    mysql_close($conn);
  ?>
 