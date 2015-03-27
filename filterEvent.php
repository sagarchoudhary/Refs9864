<html>
<head>
  <title>Events</title>
<?php include('layout.php') ?>
</head>
<body>
<?php include('header.php'); ?>
<div id="container">
  
  
  <?php
  include('session.php');
  if($role_session!='admin'&&$role_session!='content'&&$role_session!='user'){
    header('location:sign_in.html');
  }

 

   include("menu.php");  
   $uid_filter=$_POST['owner'];
  $tid_filter=$_POST['tid']; 
    
  include('addDatabase.php');
  if($uid_filter=='any'||$tid_filter=='any'){
      if($uid_filter=='any'&&$tid_filter!='any'){
        $sql = 'select event.eid,event.ename,event.uid as creater ,event.eimg,substring(event.edescription,1,60) as edescription,taxonomy.name,user.name as owner from event join taxonomy join user on event.tid=taxonomy.tid and event.owner=user.uid where event.tid="'.$tid_filter.'"';
      }
      elseif ($tid_filter=='any'&&$uid_filter!='any'){
        $sql = 'select event.eid,event.ename,event.uid as creater ,event.eimg,substring(event.edescription,1,60) as edescription,taxonomy.name,user.name as owner from event join taxonomy join user on event.tid=taxonomy.tid and event.owner=user.uid where owner="'.$uid_filter.'"';
      }
      else{
        $sql = 'select event.eid,event.ename,event.uid as creater ,event.eimg,substring(event.edescription,1,60) as edescription,taxonomy.name,user.name as owner from event left join taxonomy on event.tid=taxonomy.tid left join user on event.owner=user.uid ';
      }
  }
  else{
    $sql = 'select event.eid,event.ename,event.uid as creater ,event.eimg,substring(event.edescription,1,60) as edescription,taxonomy.name,user.name as owner from event join taxonomy join user on event.tid=taxonomy.tid and event.owner=user.uid where event.tid="'.$tid_filter.'"and owner="'.$uid_filter.'"';
  }
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
    <br><h1>Events</h1>
    <table >
    <tr>
    
      <th>Name</th>
      <th>img</th>
      <th>descripton</th>
      <th>owner</th>
      <th>Taxonomy</th>
      <th>Action</th>
      <th></th>
      <th></th>
    </tr>
   <?php
    foreach ($all_results as $key => $value) { ?>
      <tr>
       
      <td><?php echo($all_results[$key]['ename']); ?></td>
       <td><img src="uploads/<?php echo($all_results[$key]['eimg']); ?>" style="width:100px;height:100px" /></td>
    <td id="description"><?php echo($all_results_des[$key]['des']); ?>.. <a href="viewEventDes.php?eid=<?php echo($all_results[$key]['eid']); ?>&uid=<?php echo($uid); ?>&img=<?php echo($all_results[$key]['eimg']); ?>">countinue reading.</a></td>
       <td><?php echo $all_results[$key]['owner'] ; ?></td>
       <td><?php echo $all_results[$key]['name'] ; ?></td>
       <?php  if ($role_session =='admin') { ?>
         <td id="tableNoColor"><a href="editEvent.php?eid=<?php echo($all_results[$key]['eid']); ?>&uid=<?php echo($uid); ?>"><button>edit</button></a></td>
      <td id="tableNoColor"><a href="deleteEvent.php?eid=<?php echo($all_results[$key]['eid']); ?>&uid=<?php echo($uid); ?>&img=<?php echo($all_results[$key]['eimg']); ?>"><button>delete</button></a></td>
      <?php  }
      elseif ($role_session=='content'&& $uid==$all_results[$key]['creater'] ) { ?>
        <td id="tableNoColor"><a href="editEvent.php?eid=<?php echo($all_results[$key]['eid']); ?>&uid=<?php echo($uid); ?>"><button>edit</button></a></td>
      <td id="tableNoColor"><a href="deleteEvent.php?eid=<?php echo($all_results[$key]['eid']); ?>&uid=<?php echo($uid); ?>&img=<?php echo($all_results[$key]['eimg']); ?>"><button>delete</button></a></td>
     <?php }
      ?>
      
      <td id="tableNoColor"><a href="viewEventDes.php?eid=<?php echo($all_results[$key]['eid']); ?>&uid=<?php echo($uid); ?>&img=<?php echo($all_results[$key]['eimg']); ?>"><button>view</button></a></td>
       
      
      </tr>
   <?php  } ?>

   </table>

 
 
 <?php

mysql_close($conn);
?>

</div>
<?php include('footer.php');?>
</body>
</html>