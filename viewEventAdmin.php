<html>
<head>
	<title>Events</title>
  <?php include('layout.php') ?>
</head>
<body>

<?php 

include('header.php'); 
?>
  <div id="container">
  
  <?php

    include('session.php');
    if($role_session!='admin'&&$role_session!='content'&&$role_session!='user'){//unauthorized person can't access
      header('location:sign_in.html');
    }
    include("menu.php");   
    include('addDatabase.php');
    $sql = 'select event.eid,event.ename,event.uid as creater ,substring(event.edescription,1,60)as edescription,event.eimg,taxonomy.name,user.name as owner from event left join taxonomy on event.tid=taxonomy.tid left join user on event.owner=user.uid';//query taking join of user,event,taxonomy

    mysql_select_db('events');
    $retval = mysql_query( $sql, $conn );
    if(! $retval ){
      die('Could not enter data: ' . mysql_error());
    }
    $all_results = array();
    while ($result = mysql_fetch_assoc($retval)){
      $all_results[] = $result;                         //checking connection and saving result of query in all_result
    }
    
    include('taxonomyDropdown.php'); //including taxonomy table  for dropdown
    // print_r($all_results_tax);
    include('userDropdown.php');    //including user table  for dropdown
  ?>
  <br><h1>Events</h1><br>
  <div id='filter'>
  <form action="filterEvent.php" method="POST">

      <select name="tid">
        <option value="" disabled selected>Choose Type</option>
        <option value="any">Any</option>
        <?php
        foreach ($all_results_tax as $key => $value) { 
        ?>
        <option value="<?php echo($all_results_tax[$key]['tid']); ?>"><?php echo($all_results_tax[$key]['name']); ?></option>
        <?php  } ?>
      </select>
      
      <select name="owner">
      <option value="" disabled selected>Choose Owner</option>
      <option value="any">Any</option>
        <?php
        foreach ($all_results_user as $key => $value) { ?>
        <option value="<?php echo($all_results_user[$key]['uid']); ?>"><?php echo($all_results_user[$key]['name']); ?></option>
        <?php  } ?>
      </select>
      <input name="add" type="submit" id='submit' value="Go"/>  
  </form></div>
    
    <table style="clear:both;">
      <tr>
        <th>Name</th>
        <th>Image</th>
        <th>Descripton</th>
        <th>Event owner</th>
        <th>Type</th>

        <th>Action</th>
      </tr>
        <?php
          foreach ($all_results as $key => $value) { 
        ?>
      <tr>

       <td> <a href="viewEventDes.php?eid=<?php echo($all_results[$key]['eid']); ?>&uid=<?php echo($uid); ?>&img=<?php echo($all_results[$key]['eimg']); ?>"><?php echo($all_results[$key]['ename']); ?></a></td> <!-- event name -->
       <td><img src="uploads/<?php echo($all_results[$key]['eimg']); ?>" style="width:100px;height:100px" /></td><!-- image name -->
       
       <td id="description"><?php echo($all_results[$key]['edescription']); ?>.. <a href="viewEventDes.php?eid=<?php echo($all_results[$key]['eid']); ?>&uid=<?php echo($uid); ?>&img=<?php echo($all_results[$key]['eimg']); ?>">read more.</a></td> <!-- description with link to fulll view -->

       <td><?php echo $all_results[$key]['owner'] ; ?></td> <!-- owner of event -->
       <td><?php echo $all_results[$key]['name'] ; ?></td> <!-- taxonomy name -->
          <?php  if ($role_session =='admin') { ?>   <!-- if role =admin he can edit and delete all events -->
        <td id="tableNoColor"><a href="editEvent.php?eid=<?php echo($all_results[$key]['eid']); ?>&uid=<?php echo($uid); ?>"><button>edit</button></a> <!-- EDIT -->
       <a href="deleteEvent.php?eid=<?php echo($all_results[$key]['eid']); ?>&uid=<?php echo($uid); ?>&img=<?php echo($all_results[$key]['eimg']); ?>"><button>delete</button></a></td> <!-- delete -->
        <?php  }
        elseif ($role_session=='content'&& $uid==$all_results[$key]['creater'] ) { 
          // if role is content than he can edit or delete only those event whose session uid means (current user) equals to uid of user who created evnt 
          ?>
        <td id="tableNoColor"><a href="editEvent.php?eid=<?php echo($all_results[$key]['eid']); ?>&uid=<?php echo($uid); ?>"><button>edit</button></a><a href="deleteEvent.php?eid=<?php echo($all_results[$key]['eid']); ?>&uid=<?php echo($uid); ?>&img=<?php echo($all_results[$key]['eimg']); ?>"><button>delete</button></a></td>
        <?php }
        ?>
       
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