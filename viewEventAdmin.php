<html>
<head>
	<title>Events</title>
<?php include('layout.php') ?>
</head>
<body>
<div id="container">
  
  <?php include("menu.php"); ?>
  <?php
  session_start();
  $uid=$_SESSION['uid'];
  $email=$_SESSION['email'];
  $role=$_SESSION['role'];
  if($role!='admin'){
    header('location:sign_in.html');
  }

 

  
  
  include('addDatabase.php');
  $sql = 'select * from event';

  mysql_select_db('events');
  $retval = mysql_query( $sql, $conn );
  if(! $retval ){
    die('Could not enter data: ' . mysql_error());
  }
  

 $all_results = array();
    while ($result = mysql_fetch_assoc($retval)){
    $all_results[] = $result;
    } ?>
    <br><h1>Events</h1>
    <table >
    <tr>
      <th>Name</th>
      <th>img</th>
      <th>descripton</th>
      <th>owner</th>
      <th>Action</th>
      <th>Action</th>
    </tr>
   <?php
    foreach ($all_results as $key => $value) { ?>
      <tr>
       
      <td><?php echo($all_results[$key]['ename']); ?></td>
       <td><img src="uploads/<?php echo($all_results[$key]['eimg']); ?>" style="width:100px;height:100px" /></td>
    <td><?php echo($all_results[$key]['edescription']); ?></td>
       <td><?php echo($all_results[$key]['owner']); ?></td>
      <td><a href="editEvent.php?eid=<?php echo($all_results[$key]['eid']); ?>&uid=<?php echo($uid); ?>"><button>edit</button></a></td>
      <td><a href="deleteEvent.php?eid=<?php echo($all_results[$key]['eid']); ?>&uid=<?php echo($uid); ?>&img=<?php echo($all_results[$key]['eimg']); ?>"><button>delete</button></a></td>
       
      
      </tr>
   <?php  } ?>

   </table>

 
 
 <?php

mysql_close($conn);
?>
  </div>
</body>
</html>