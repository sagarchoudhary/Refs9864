<?php
include('session.php');
  //echo($role);
if($role_session!='admin'){
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
<?php include('header.php'); ?>
<div id="container">
<?php include("menu.php");?>
 <br> <h1>Add Type</h1><br>
  <div id="form1">
  <form action="<?php $_PHP_SELF ?>" method="post" id='form'>
    <input type="text" name="tname" placeholder="  Add Type" /><br><br><br><br><br>
    
    <input name="add" type="submit" id='submit' value="Submit" /><br>
  </form>
  </div>
  </div>
  <?php include('footer.php');?>
</body>
</html>   
