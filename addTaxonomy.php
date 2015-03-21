<?php
  session_start();
  $uid=$_SESSION['uid'];
  $email=$_SESSION['email'];
  $role=$_SESSION['role'];
  //echo($role);
  if($role!='admin'){
    header('location:sign_in.html'); 
 }
  $tname=$_POST["tname"];
  
  if(isset($_POST["add"]))
  {
  include('addDatabase.php');

	$sql = 'insert into taxonomy (name) values ("'.$tname.'")';

	mysql_select_db('events');
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
  	die('Could not enter data: ' . mysql_error());
	}
  else{
    header('location:viewTaxonomy.php');
  }
	
	mysql_close($conn);
  }	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Add Taxonomy</h1>
	<form action="<?php $_PHP_SELF ?>" method="post">
  Taxonomy Name: <input type="text" name="tname" />
  
  <input name="add" type="submit" />
</form>
</body>
</html>   
