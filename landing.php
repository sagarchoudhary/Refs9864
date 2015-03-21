
<html>
<head>
	<title>hii</title>
</head>
<body>

<?php
session_start();
$uid=$_SESSION['uid'];
$email=$_SESSION['email'];
$role=$_SESSION['role'];

include("menu.php"); 

echo("welcome Your role is  ".$role);

if($role==admin){
	$dbhost = 'localhost:3036';
	$dbuser = 'root';
	$dbpass = '123456';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn ){
  		die('Could not connect: ' . mysql_error());
	}
	$sql = 'select uid,name,email,role from user where role !="admin"';

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
    	<th>Name</th>
    	<th>Email</th>
    	<th>Role</th>
    	<th>Action</th>
    	<th>Action</th>
    </tr>
   <?php
   	foreach ($all_results as $key => $value) { ?>
   		<tr>
   		 
   		<td><?php echo($all_results[$key]['name']); ?></td>
   		 <td><?php echo($all_results[$key]['email']); ?></td>
   		 <td><?php echo($all_results[$key]['role']); ?></td>
   		<td><a href="editUser.php?uid=<?php echo($all_results[$key]['uid']); ?>">edit</a></td>
      <td><a href="deleteUser.php?uid=<?php echo($all_results[$key]['uid']); ?>">delete</a></td>   		
   		</tr>
   <?php	} ?>

   </table> 
    
<?php
	mysql_close($conn);?>
  <a href="addUser.php"><button>Add user</button></a>
  <a href="viewTaxonomy.php"><button>ViewTaxonomy</button></a>
  <a href="viewEvent.php"><button>View Events</button></a>
  <a href="addEvent.php"><button>Add Events</button></a>
  <?php


}
elseif ($role=='content') { ?>
<a href="addEvent.php"><button>Add events</button></a>

<?php  
}
elseif ($role==user) { ?>
  
<a href="viewEvent.php"><button>view  events</button></a>
<?php  
}

?>

</body>
</html>