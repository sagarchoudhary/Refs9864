<?php
 
session_start();

  $email=$_SESSION['email'];
  $role_session=$_SESSION['role'];
  $username=$_SESSION['username'];

  //$uid=$_GET['uid'];
  //$uid_session=$_SESSION['uid']; 
  //echo($role);
if($role_session!='admin'&&$role_session!='content'&&$role_session!='user'){
  header('location:sign_in.html'); 
}


$eid=$_GET['eid']; 
//$ename=$_POST["ename"];

//$edescription=$_POST["edescription"];
include('addDatabase.php');
// $sql_tax = 'select * from taxonomy';
// mysql_select_db('events');
// $retval = mysql_query( $sql_tax, $conn );
// if(! $retval )
// {
//   die('Could not enter data: ' . mysql_error());
// }
// $all_results_tax = array();
// while ($result = mysql_fetch_assoc($retval))
// {
//   $all_results_tax[] = $result;
// }


// $sql_user = 'select name from user where role="user"';
// mysql_select_db('events');
// $retval = mysql_query( $sql_user, $conn );
// if(! $retval )
// {
//   die('Could not enter data: ' . mysql_error());
// }
// $all_results_user = array();
// while ($result = mysql_fetch_assoc($retval)){
//   $all_results_user[] = $result;
// }



$sql_value = 'select * from event where eid='.$eid;

mysql_select_db('events');
$retval_value = mysql_query( $sql_value, $conn );
if(! $retval_value ){
  die('Could not enter dataaaaaaaaa: ' . mysql_error());
}
  //print_r(mysql_fetch_array($retval_value));
$all_results_value = array();
while ($result = mysql_fetch_assoc($retval_value)){
  $all_results_value[] = $result;
}
    //print_r($all_results_value[0]['ename']);
$ename_value= $all_results_value[0]['ename'];
$edescription_value=$all_results_value[0]['edescription'];
$eimg_value=$all_results_value[0]['eimg'];
    //print_r($all_results_value['ename']);



 mysql_close($conn);
 


?>

<!DOCTYPE html>
<html>
<head>
  <title> events</title>
  <?php include('layout.php') ?>
</head>

<body>
<?php include('header.php'); ?>
<div id="container">
<?php
   
include("menu.php");

?>
  
    <br><h1><?php echo($ename_value); ?></h1><br><br><br>
    <img src="uploads/<?php echo($eimg_value);?>" style="width:300px;height:200px" > 
    <br><br>
    <h3><?php echo($edescription_value); ?></h3><br><br><br>
    
</div>
<?php include('footer.php');?>
</body>

</html>   
