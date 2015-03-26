<?php
 include('session.php');
  //echo($role);
  if($role_session!='admin'){
    header('location:sign_in.html'); 
 }
  $name=$_POST["name"];
  $email=$_POST["email"];
  $password=$_POST["password"];
  $role=$_POST["role"];
  if(isset($_POST["add"]))
  {
  include('addDatabase.php');

	$sql = 'insert into user (name,email,password,role) values ("'.$name.'","'.$email.'",md5("'.$password.'"),"'.$role.'")';

	mysql_select_db('events');
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
  	die('Could not enter data: ' . mysql_error());
	}
	else{
    header('location:viewUser.php');
  }

  

	mysql_close($conn);
  }	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <?php include('layout.php') ?>
</head>
<body>
<?php include('header.php'); ?>
<div id="container">
<?php include("menu.php");?>
<br><h1>Add user</h1><br>
	<form action="<?php $_PHP_SELF ?>" method="post" id='form'>
  Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" placeholder=' Enter Name'/><br><br><br>
  Email:&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<input type="text" name="email" placeholder=' Enter Email  '/><br><br><br>
  password:<input type="password" name="password" placeholder=' Enter Password'><br><br><br>
  Role:&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
  <select name="role">
  <option value="user">User</option>
  <option value="content">Content manager</option>
  </select><br><br><br>
  <input name="add" type="submit" id="submit"  value="Submit" />
  
</form>
</div>
<?php include('footer.php');?>
</body>
</html>   
