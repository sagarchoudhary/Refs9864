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
        $sql = 'select event.eid,event.ename,event.uid as creater ,event.eimg,substring(event.edescription,1,60) as edescription,taxonomy.name,user.name as owner from event join taxonomy on event.tid=taxonomy.tid left join user on event.owner=user.uid where event.tid='.$tid_filter;
      }
      elseif ($tid_filter=='any'&&$uid_filter!='any'){
        $sql = 'select event.eid,event.ename,event.uid as creater ,event.eimg,substring(event.edescription,1,60) as edescription,taxonomy.name,user.name as owner from event left join taxonomy on event.tid=taxonomy.tid join user on event.owner=user.uid where event.owner='.$uid_filter;
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
    
    include('taxonomyDropdown.php'); //including taxonomy table  for dropdown
    // print_r($all_results_tax);
    include('userDropdown.php');    //including user table  for dropdown
  ?>
  <br><h1>Events</h1><br>
  <div id='filter'>
  <table id='filter'>
  <form action="filterEvent.php" method="POST">
      <tr>
      <td id="filter">Type</td>
      <td id="filter">Owner</td>
      </tr>
      <tr>
      <td id="filter"> 
      <select name="tid">
        <option value="any">Any</option>
        <?php
        foreach ($all_results_tax as $key => $value) { 
        ?>
        <option value="<?php echo($all_results_tax[$key]['tid']); ?>"><?php echo($all_results_tax[$key]['name']); ?></option>
        <?php  } ?>
      </select>
      </td>
      <td id="filter">
      <select name="owner">
      <option value="any">Any</option>
        <?php
        foreach ($all_results_user as $key => $value) { ?>
        <option value="<?php echo($all_results_user[$key]['uid']); ?>"><?php echo($all_results_user[$key]['name']); ?></option>
        <?php  } ?>
      </select>
      </td>
      

      <td id="filter"><input name="add" type="submit" id='submit' value="Go"/></td>  </tr>
  </form></div>
    </table>
    </div>
    <br >
    
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