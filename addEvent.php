<?php
session_start();
$uid=$_SESSION['uid'];
$ename=$_POST["ename"];

$email=$_SESSION['email'];
$role=$_SESSION['role'];
  //echo($role);
if($role!='admin'&&$role!='content'){
  header('location:sign_in.html'); 
}


$edescription=$_POST["edescription"];
$owner=$_POST["owner"];
include('addDatabase.php');
$sql_tax = 'select * from taxonomy';
mysql_select_db('events');
$retval = mysql_query( $sql_tax, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
$all_results_tax = array();
while ($result = mysql_fetch_assoc($retval))
{
  $all_results_tax[] = $result;
}


$sql_user = 'select name from user where role="user"';
mysql_select_db('events');
$retval = mysql_query( $sql_user, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
$all_results_user = array();
while ($result = mysql_fetch_assoc($retval)){
  $all_results_user[] = $result;
} 

if(isset($_POST["add"]))
{

  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["eimg"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) 
  {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
  } 
  else {
    if (move_uploaded_file($_FILES["eimg"]["tmp_name"], $target_file)) {
      echo "The file ". basename( $_FILES["eimg"]["name"]). " has been uploaded.";
      $img_name=basename( $_FILES["eimg"]["name"]);
    } 
    else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
  $sql = 'insert into event (uid,ename,eimg,edescription,owner) values ("'.$uid.'","'.$ename.'","'.$img_name.'","'.$edescription.'","'.$owner.'")';

  mysql_select_db('events');
  $retval = mysql_query( $sql, $conn );
  if(! $retval )
  {
    die('Could not enter data: ' . mysql_error());
  }

  mysql_close($conn);
  header('location:viewEvent.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>add events</title>
</head>
<body>
  <h1>Add events</h1>
  <form action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
    Event Name: <input type="text" name="ename" /><br><br><br>
    Upload Image: <input type="file" name="eimg" /><br><br><br>
    Event Description:<input type="textarea" name="edescription"><br><br><br>
    choose taxonomy:<select name="tid">

    <?php
    foreach ($all_results_tax as $key => $value) { ?>
    

    <option value="<?php echo($all_results_tax[$key]['tid']); ?>"><?php echo($all_results_tax[$key]['name']); ?></option>

    <?php  } ?>

  </select>
  choose owner:<select name="owner">

  <?php
  foreach ($all_results_user as $key => $value) { ?>


  <option value="<?php echo($all_results_user[$key]['name']); ?>"><?php echo($all_results_user[$key]['name']); ?></option>

  <?php  } ?>

</select>

<input name="add" type="submit" />
</form>
</body>
</html>   
