<html>
<head>
	<title>Events</title>
  <?php include('layout.php') ?>
</head>
<body>
 <div id="container">
  <?php
  include("session.php");
  if($role_session!='user'){
    header('location:sign_in.html');
  }

  include("menu.php"); 

  

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
  }
  foreach ($all_results as $key => $value) {
      $owner_array[] = $all_results[$key]['owner']; 
      $tax_array[] = $all_results[$key]['tid'];
    }
  $sql_des = 'select substring(edescription,1,60) as des from event';
 mysql_select_db('events');
  $retval_des = mysql_query( $sql_des, $conn );
  if(! $retval ){
    die('Could not enter data: ' . mysql_error());
  }
 $all_results_des = array();
    while ($result = mysql_fetch_assoc($retval_des)){
    $all_results_des[] = $result;
    }
    foreach ($owner_array as $key => $value) {
    
     
  $sql_owner = 'select name from user where uid='.$value;

  mysql_select_db('events');
  $retval_owner = mysql_query( $sql_owner, $conn );
  if(! $retval_owner ){
    die('Could not enter data: ' . mysql_error());
  }
  
  
    $all_results_owner[]=mysql_fetch_assoc($retval_owner);
      
  }
  
  foreach ($tax_array as $key => $value) {
    
     
  $sql_tax = 'select name from taxonomy where tid='.$value;

  mysql_select_db('events');
  $retval_tax = mysql_query( $sql_tax, $conn );
  if(! $retval_tax ){
    die('Could not enter data: ' . mysql_error());
  }
  
  
    $all_results_tax[]=mysql_fetch_assoc($retval_tax);
      
  }


   ?>
  <br><br>
  <table >
    <tr>
    	<th>Name</th>
    	<th>img</th>
    	<th>descripton</th>
    	<th>owner</th>
      <th>Taxonomy</th>
    	<th>Action</th>
    	
    </tr>
    <?php
    foreach ($all_results as $key => $value) { ?>
    <tr>

     <td><?php echo($all_results[$key]['ename']); ?></td>
     <td><img src="uploads/<?php echo($all_results[$key]['eimg']); ?>" style="width:100px;height:100px" /></td>
     <td id="description"><?php echo($all_results_des[$key]['des']); ?>.. <a href="viewEventDes.php?eid=<?php echo($all_results[$key]['eid']); ?>&uid=<?php echo($uid); ?>&img=<?php echo($all_results[$key]['eimg']); ?>">countinue reading.</a></td>
     <td><?php echo $all_results_owner[$key]['name'] ; ?></td>
       <td><?php echo $all_results_tax[$key]['name'] ; ?></td>
     <td id="tableNoColor"><a href="viewEventDes.php?eid=<?php echo($all_results[$key]['eid']); ?>&uid=<?php echo($uid); ?>&img=<?php echo($all_results[$key]['eimg']); ?>"><button>view</button></a></td>

     <?php } ?>  		
   </tr>
 </table>





 <?php

mysql_close($conn);
?>
</div>
</body>
</html>