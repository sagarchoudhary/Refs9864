
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

echo("welcome Your role is  ".$role);

if($role==admin){
	$dbhost = 'localhost:3036';
	$dbuser = 'root';
	$dbpass = '123456';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn ){
  		die('Could not connect: ' . mysql_error());
	}
	$sql = 'select name,email,role from user where role !="admin"';

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
   		<td>Edit</td>
   		<td>Delete</td>
   		</tr>
   <?php	} ?>

   </table> 
    
<?php
	mysql_close($conn);?>
  <a href="addUser.php">Add user</a>
  <?php


}

?>

</body>
</html>