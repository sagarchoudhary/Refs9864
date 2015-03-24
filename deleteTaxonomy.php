<?php
  $role_session=$_SESSION['role'];
  
if($role_session!='admin'){
  header('location:sign_in.html'); 
}
  $tid=$_GET['tid'];
  $dbhost = 'localhost:3036';
  $dbuser = 'root';
  $dbpass = '123456';
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
  if(! $conn ){
      die('Could not connect: ' . mysql_error());
  }
  $sql = 'delete from taxonomy where tid='.$tid;

  mysql_select_db('events');
  $retval = mysql_query( $sql, $conn );
  if(! $retval ){
      die('Could not enter data: ' . mysql_error());
  }
  else{
    header('location:viewTaxonomy.php');
  }
   mysql_close($conn);
  ?>
 