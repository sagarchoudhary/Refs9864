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
	<title>Add Taxonomy</title>
  <?php include('layout.php') ?>
</head>
<body>
<div id="container">
<?php include("menu.php");?>
 <br><br><br> <h1>Add Taxonomy</h1>
  <form action="<?php $_PHP_SELF ?>" method="post" id='form'><br>
   <br> Taxonomy Name: <input type="text" name="tname" /><br><br><br><br><br>
    
    <input name="add" type="submit" id='submit' value="submit" /><br>
  </form>
  </div>
</body>
</html>   
