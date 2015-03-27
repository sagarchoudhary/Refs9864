
<html>
<head>
	<title>ADD USER</title>
  <?php include('layout.php') ?>
</head>
<body>
<?php include('header.php'); ?>
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
  <br><h1>View Users</h1><br>
  <form action="actionUser.php" method="get" >
  
    <table>
      <tr>
        <th></th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Action</th>

      </tr>

      <?php
      foreach ($all_results as $key => $value) { ?>
      <tr>
        <td><input type="checkbox" name="uid[]" id="checkbox" value="<?php echo($all_results[$key]['uid']); ?>"></td>
        <td><?php echo($all_results[$key]['name']); ?></td>
        <td><?php echo($all_results[$key]['email']); ?></td>
        <td><?php echo($all_results[$key]['role']); ?></td>
        <td><a href="editUser.php?uid=<?php echo($all_results[$key]['uid']); ?>">Edit</a></td>
      </tr>
      <?php	} ?>

    </table> 
    <br>
    <br>
    <br>
    <input type="submit" name="action" value="Delete" id="submit"> &nbsp;&nbsp;&nbsp;
    

  </form>
  <?php
  mysql_close($conn);?>
  
  </div>
  <?php include('footer.php');?>
</body>
</html>