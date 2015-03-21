
<html>
<head>
	<title>ADD USER</title>
</head>
<body>

  <?php

  session_start();
  $uid=$_SESSION['uid'];
  $email=$_SESSION['email'];
  $role=$_SESSION['role'];
  if($role!='admin'){
  header('location:sign_in.html'); 
}
  include("menu.php"); 
  echo("welcome Your role is  ".$role);
  include('addDatabase.php');
  $sql = 'select uid,name,email,role from user where role !="admin"';
  mysql_select_db('events');
  $retval = mysql_query( $sql, $conn );
  if(! $retval ){
    die('Could not enter data: ' . mysql_error());
  }
  $all_results = array();
  while ($result = mysql_fetch_assoc($retval)){
    $all_results[] = $result;
  } 
  ?>
  <form action="actionUser.php" method="post">
    <table border="2px black" cellspacing="3px" cellpadding="3px">
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
      </tr>

      <?php
      foreach ($all_results as $key => $value) { ?>
      <tr>
        <td><?php echo($all_results[$key]['name']); ?></td>
        <td><?php echo($all_results[$key]['email']); ?></td>
        <td><?php echo($all_results[$key]['role']); ?></td>
        <td><input type="checkbox" name="uid[]" value="<?php echo($all_results[$key]['uid']); ?>"></td>
      </tr>
      <?php	} ?>

    </table> 
    <input type="submit" name="action" value="delete">
    <input type="submit" name="action" value="edit">

  </form>
  <?php
  mysql_close($conn);?>
  <a href="addUser.php"><button>Add user</button></a>
  <a href="viewTaxonomy.php"><button>ViewTaxonomy</button></a>
  <a href="viewEvent.php"><button>View Events</button></a>
  <a href="addEvent.php"><button>Add Events</button></a>
  
</body>
</html>