<?php
  session_start();
  $uid=$_SESSION['uid'];
  $email=$_SESSION['email'];
  $role=$_SESSION['role'];
  //echo($role);
  if($role!='admin'){
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
<div id="container">
<?php include("menu.php");?>
<h1>Add user</h1>
	<form action="<?php $_PHP_SELF ?>" method="post" id='form'>
  Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" /><br><br><br>
  Email:&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<input type="text" name="email" /><br><br><br>
  password:<input type="password" name="password"><br><br><br>
  Role:&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
  <select name="role">
  <option value="user">User</option>
  <option value="content">Content manager</option>
  </select><br><br><br>
  <input name="add" type="submit" id="submit"  value="Submit" />
</form>
</div>
</body>
</html>   
