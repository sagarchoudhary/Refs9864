
<html>
<head>
	<title>taxonomy</title>
  <?php include('layout.php') ?>
</head>
<body>
<div id="container">

  <?php
  include("session.php");
  include("menu.php");
  if($role_session!='admin'){
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
  <br>
  <h1>Taxonomy</h1>
  <br>
  <table >
    <tr>
    	<th>Taxonomy Name</th>
    	<th>Action</th>
    	<th>Action</th>
    </tr>
    <?php
    foreach ($all_results as $key => $value) { ?>
    <tr>

     <td><?php echo($all_results[$key]['name']); ?></td>
     <td><a href="editTaxonomy.php?tid=<?php echo($all_results[$key]['tid']); ?>"><button>edit</button></a></td>
     <td><a href="deleteTaxonomy.php?tid=<?php echo($all_results[$key]['tid']); ?>"><button>delete</button></a></td>   		
   </tr>
   <?php	} ?>

 </table> 

 <?php
 mysql_close($conn);?>

 
 <?php




 ?>
</div>
</body>
</html>