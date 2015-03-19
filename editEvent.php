<?php
  session_start();
  $uid_session=$_SESSION['uid'];
 $uid=$_GET['uid'];
 $eid=$_GET['eid']; 
  $ename=$_POST["ename"];

  $edescription=$_POST["edescription"];
  $owner=$_POST["owner"];
  $dbhost = 'localhost:3036';
  $dbuser = 'root';
  $dbpass = '123456';

  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
  if(! $conn )
  {
    die('Could not connect: ' . mysql_error());
  }
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

    
    $sql_value = 'select * from event where uid="'.$uid.'" and eid='.$eid;

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
    //print_r($all_results_value['ename']);


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
    $sql = 'update event set uid="'.$uid.'", ename="'.$ename.'",eimg="'.$img_name."',edescription='".$edescription.'",owner="'.$owner.'" where eid='.$eid;

   mysql_select_db('events');
   $retval = mysql_query( $sql, $conn );
   if(! $retval )
   {
     die('Could not enter dataaaa: ' . mysql_error());
   }
  
   mysql_close($conn);
   header('location:landing.php');
  }

?>

  <!DOCTYPE html>
<html>
<head>
  <title>edit events</title>
</head>
<body>
<h1>edit events</h1>
  <form action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
  Event Name: <input type="text" name="ename" value="<?php echo($ename_value); ?>"/><br><br><br>
  Upload Image: <input type="file" name="eimg" /><br><br><br>
  Event Description:<input type="textarea" name="edescription" value="<?php echo($edescription_value);?>"><br><br><br>
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
   