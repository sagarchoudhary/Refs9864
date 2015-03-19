<?php
  session_start();
  $uid=$_SESSION['uid'];
  $ename=$_POST["ename"];
  $eimg=$_POST["eimg"];
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
    while ($result = mysql_fetch_assoc($retval)){
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
  
	

	$sql = 'insert into user (name,email,password,role) values ("'.$name.'","'.$email.'","'.$password.'","'.$role.'")';

	mysql_select_db('events');
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
  	die('Could not enter data: ' . mysql_error());
	}
	
	mysql_close($conn);
  }	
?>
<!DOCTYPE html>
<html>
<head>
	<title>add events</title>
</head>
<body>
<h1>Add events</h1>
	<form action="<?php $_PHP_SELF ?>" method="post">
  Event Name: <input type="text" name="ename" /><br><br><br>
  Upload Image: <input type="file" name="eimg" /><br><br><br>
  Event Description:<input type="textarea" name="edescription"><br><br><br>
  choose taxonomy:<select name="tid">

    <?php
    foreach ($all_results_tax as $key => $value) { ?>
    
       
      <option value="<?php echo($all_results_tax[$key]['name']); ?>"><?php echo($all_results_tax[$key]['name']); ?></option>
           
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
