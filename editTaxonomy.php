<?php
  $name=$_POST["name"];
  $tid=$_GET['tid'];
  $dbhost = 'localhost:3036';
  $dbuser = 'root';
  $dbpass = '123456';
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
  if(! $conn ){
      die('Could not connect: ' . mysql_error());
  }
  $sql = 'select name from taxonomy where tid='.$tid;

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
       
     $tname=$all_results[$key]['name'];
  
   }
   if(isset($_POST["add"]))
  {

  $sql = 'update taxonomy  set name="'.$name.'"where tid='.$tid;

  mysql_select_db('events');
  $retval = mysql_query( $sql, $conn );
  if(! $retval )
  {
    die('Could not enter data: ' . mysql_error());
  }
  else {
  header('location:viewTaxonomy.php');    
  }
  
  mysql_close($conn);
  }

    ?>
  <html>
<head>
  <title></title>
</head>
<body>
<h1>Edit Taxonomy</h1>
  <form action="<?php $_PHP_SELF ?>" method="post">
 Taxonomy Name: <input type="text" name="name" value="<?php echo($tname);?>" />
  
  <input name="add" type="submit" />
</form>
</body>
</html>   