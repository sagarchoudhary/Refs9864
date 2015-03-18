<?php
  $name=$_POST["name"];
  $email=$_POST["email"];
  $password=$_POST["password"];
  $role=$_POST["role"];
  $uid=$_GET['uid'];
  $dbhost = 'localhost:3036';
  $dbuser = 'root';
  $dbpass = '123456';
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
  if(! $conn ){
      die('Could not connect: ' . mysql_error());
  }
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
     $role=$all_results[$key]['role'];  
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
  header('location:landing.php');    
  }
  
  mysql_close($conn);
  }

    ?>
  <html>
<head>
  <title></title>
</head>
<body>
<h1>Edit user</h1>
  <form action="<?php $_PHP_SELF ?>" method="post">
  Name: <input type="text" name="name" value="<?php echo($fname);?>" />
  Email: <input type="text" name="email" value="<?php echo($femail);?>" />
  Password: <input type="password" name="password" value="<?php echo($fpassword);?>" />
  Role:
  <select name="role">
  <option value="user">User</option>
  <option value="content">Content manager</option>
  </select>
  <input name="add" type="submit" />
</form>
</body>
</html>   