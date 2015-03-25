<html>
<head>
  <title>Events</title>
<?php include('layout.php') ?>
</head>
<body>

<div id="container">

  <?php
   include("session.php");
  if($role_session!='content'){
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

$sql_tax = 'select * from taxonomy';
mysql_select_db('events');
$retval = mysql_query( $sql_tax, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
$all_results_tax = array();
while ($result = mysql_fetch_assoc($retval))
{
  $all_results_tax[] = $result;
}


$sql_user = 'select * from user where role="user"';
mysql_select_db('events');
$retval = mysql_query( $sql_user, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
$all_results_user = array();
while ($result = mysql_fetch_assoc($retval)){
  $all_results_user[] = $result;
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
    <td id="description"><?php echo($all_results_des[$key]['des']); ?>.. <a href="viewEventDes.php?eid=<?php echo($all_results[$key]['eid']); ?>&uid=<?php echo($uid); ?>&img=<?php echo($all_results[$key]['eimg']); ?>">...read more</a></td>
       <td><?php echo $all_results_owner[$key]['name'] ; ?></td>
       <td><?php echo $all_results_tax[$key]['name'] ; ?></td>
      <?php if($all_results[$key]['uid']==$uid){ ?>
      <td><a href="editEvent.php?eid=<?php echo($all_results[$key]['eid']); ?>&uid=<?php echo($uid); ?>"><button>edit</button></a></td>
      <td><a href="deleteEvent.php?eid=<?php echo($all_results[$key]['eid']); ?>&uid=<?php echo($uid); ?>&img=<?php echo($all_results[$key]['eimg']); ?>"><button>delete</button></a></td>
      <td id="tableNoColor"><a href="viewEventDes.php?eid=<?php echo($all_results[$key]['eid']); ?>&uid=<?php echo($uid); ?>&img=<?php echo($all_results[$key]['eimg']); ?>"><button>view</button></a></td>
       
      <?php } else {?>
      
      <td id="tableNoColor"><a href="viewEventDes.php?eid=<?php echo($all_results[$key]['eid']); ?>&uid=<?php echo($uid); ?>&img=<?php echo($all_results[$key]['eimg']); ?>"><button>view</button></a></td>
      <?php } ?>      
      </tr>
   <?php  } ?>

   </table>

  
 


 
 
 
 <?php

mysql_close($conn);
?>
<h3>search user by taxonomy and owner</h3>
<form action="filterEvent.php" method="POST">

  choose taxonomy:<select name="tid">

    <?php
    foreach ($all_results_tax as $key => $value) { ?>
    

    <option value="<?php echo($all_results_tax[$key]['tid']); ?>"><?php echo($all_results_tax[$key]['name']); ?></option>

    <?php  } ?>

  </select><br><br><br>
  choose owner:<select name="owner">

  <?php
  foreach ($all_results_user as $key => $value) { ?>


  <option value="<?php echo($all_results_user[$key]['uid']); ?>"><?php echo($all_results_user[$key]['name']); ?></option>

  <?php  } ?>

</select><br><br><br>
<input name="add" type="submit" id='submit' value="submit"/>  
</form>
</div>

</body>
</html>