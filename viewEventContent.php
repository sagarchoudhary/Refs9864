<html>
<head>
  <title>Events</title>
</head>
<body>

  <?php
  session_start();
  $uid=$_SESSION['uid'];
  $email=$_SESSION['email'];
  $role=$_SESSION['role'];
  if($role!='content'){
    header('location:sign_in.html');
  }

  include("menu.php"); 

  echo("welcome Your role is  ".$role);
  
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
    <table border="2px black" cellspacing="3px" cellpadding="3px">
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
      <?php if($all_results[$key]['uid']==$uid){ ?>
      <td><a href="editEvent.php?eid=<?php echo($all_results[$key]['eid']); ?>&uid=<?php echo($uid); ?>">edit</a></td>
      <td><a href="deleteEvent.php?eid=<?php echo($all_results[$key]['eid']); ?>&uid=<?php echo($uid); ?>&img=<?php echo($all_results[$key]['eimg']); ?>">delete</a></td>
       
      <?php } else {?>
      <td>view  </td>
      <td>view</td>
      <?php } ?>      
      </tr>
   <?php  } ?>

   </table>

  
 

<a href="addEvent.php"><button>Add events</button></a>
 
 
 
 <?php

mysql_close($conn);
?>

</body>
</html>