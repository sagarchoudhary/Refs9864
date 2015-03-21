
<html>
<head>
	<title>taxonomy</title>
</head>
<body>

  <?php
  session_start();
  $uid=$_SESSION['uid'];
  $email=$_SESSION['email'];
  $role=$_SESSION['role'];
  //echo($role);
  if($role!='admin'){
    header('location:sign_in.html'); 
  }
  include('addDatabase.php');
  $sql = 'select * from taxonomy';

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
    	<th>Taxonomy Name</th>
    	<th>Action</th>
    	<th>Action</th>
    </tr>
    <?php
    foreach ($all_results as $key => $value) { ?>
    <tr>

     <td><?php echo($all_results[$key]['name']); ?></td>
     <td><a href="editTaxonomy.php?tid=<?php echo($all_results[$key]['tid']); ?>">edit</a></td>
     <td><a href="deleteTaxonomy.php?tid=<?php echo($all_results[$key]['tid']); ?>">delete</a></td>   		
   </tr>
   <?php	} ?>

 </table> 

 <?php
 mysql_close($conn);?>

 <a href="addTaxonomy.php"><button>Add Taxonomy</button></a>
 <?php




 ?>

</body>
</html>