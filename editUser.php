<?php
include('session.php');
$uid=$_GET['uid'];
if($role_session!='admin'){
  header('location:sign_in.html'); 
}
$name=$_POST["name"];
$email=$_POST["email"];
$password=$_POST["password"];
$role=$_POST["role"];

include('addDatabase.php');
$sql = 'select name,email,password,role from user where uid='.$uid;

mysql_select_db('events');
$retval = mysql_query( $sql, $conn );
if(! $retval ){
  die('Could not enter data: ' . mysql_error());
}
$all_results = array();
while ($result = mysql_fetch_assoc($retval)){
  $all_results[] = $result;
} 
    //print_r($all_results);

foreach ($all_results as $key => $value) { 

 $fname=$all_results[$key]['name'];
 $femail=$all_results[$key]['email'];
 $fpassword=$all_results[$key]['password'];     
 $frole=$all_results[$key]['role'];  
}
if(isset($_POST["add"]))
{

  $sql = 'update user  set name="'.$name.'",email="'.$email.'",password="'.$password.'",role="'.$role.'" where uid='.$uid;

  mysql_select_db('events');
  $retval = mysql_query( $sql, $conn );
  if(! $retval )
  {
    die('Could not enter data: ' . mysql_error());
  }
  else {
    header('location:viewUser.php');    
  }
  
  mysql_close($conn);
}

?>
<html>
<head>
  <title></title>
<?php include('layout.php') ?>
</head>
<body>
<?php include('header.php'); ?>
<div id="container">
<?php include("menu.php");?>
  <h1>Edit user</h1>
  <div id='form'>
  <form action="<?php $_PHP_SELF ?>" method="post">
    Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="name" value="<?php echo($fname);?>" /><br><br><br>
    Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" value="<?php echo($femail);?>" /><br><br><br>
    Password: <input type="password" name="password" value="<?php echo($fpassword);?>" /><br><br><br>
    Role:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select name="role">
      <option value="user">User</option>
      <option value="content">Content manager</option>
    </select><br><br><br>
    <input name="add" type="submit" id='submit' value="submit" />
  </form>
  </div>
  </div>
  <?php include('footer.php');?>
</body>
</html>   