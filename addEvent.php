<?php
include('session.php');
  //echo($role);
if($role_session!='admin'&&$role_session!='content'){
  header('location:sign_in.html'); 
}


$edescription=$_POST["edescription"];
$owner=$_POST["owner"];
$tid=$_POST["tid"];
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


$sql_user = 'select * from user where role="user"';
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
  $filename=basename($target_file,'.'.$imageFileType);
  $newname=$filename.'-'.date('Y-m-d-H-s').'.'.$imageFileType;
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
    if (move_uploaded_file($_FILES["eimg"]["tmp_name"], $target_dir . $newname)) {
      echo "The file ". basename( $_FILES["eimg"]["name"]). " has been uploaded.";
      $img_name=$newname;
    } 
    else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
  $sql = 'insert into event (uid,ename,eimg,edescription,owner,tid) values ("'.$uid.'","'.$ename.'","'.$img_name.'","'.$edescription.'","'.$owner.'","'.$tid.'")';

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
  <?php include('layout.php') ?>
</head>
<body>
  
  <div id="container">
<?php 
include("menu.php");


?>
  <h1>Add events</h1>
  <form action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data" id='form'>
    Event Name: <input type="text" name="ename" /><br><br><br>
    Upload Image: <input type="file" name="eimg" /><br><br><br>
    Event Description:<textarea name="edescription" id='textbox' rows="20" cols=""></textarea><br><br><br>
    choose taxonomy:<select name="tid">

    <?php
    foreach ($all_results_tax as $key => $value) { ?>
    

    <option value="<?php echo($all_results_tax[$key]['tid']); ?>"><?php echo($all_results_tax[$key]['name']); ?></option>

    <?php  } ?>

  </select><br><br><br>
  choose owner:<select name="owner">

  <?php
  foreach ($all_results_user as $key => $value) { ?>


  <option value="<?php echo($all_results_user[$key]['uid']); ?>"><?php echo($all_results_user[$key]['name']); ?></option>

  <?php  } ?>

</select><br><br><br>

<input name="add" type="submit" id='submit' value="submit"/>
</form>
</div>
</body>
</html>   
