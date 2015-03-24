
<html>
<head>
	<title>ADD USER</title>
  <?php include('layout.php') ?>
</head>
<body>
<div id="container">
  <?php

  include("session.php");
  if($role_session!='admin'){
  header('location:sign_in.html'); 
}
  include("menu.php"); 
  
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
  <form action="actionUser.php" method="post" id='form'>
  <br><br><br>
    <table  >
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
        <td id="tableNoColor"><input type="checkbox" name="uid[]" value="<?php echo($all_results[$key]['uid']); ?>"></td>
      </tr>
      <?php	} ?>

    </table> 
    <br>
    <br>
    <input type="submit" name="action" value="delete" id="submit"> &nbsp;&nbsp;&nbsp;
    <input type="submit" name="action" value="edit" id="submit">

  </form>
  <?php
  mysql_close($conn);?>
  
  </div>
</body>
</html>