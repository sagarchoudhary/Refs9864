
<?php
  $name=$_POST["name"];
  $email=$_POST["email"];
  $password=$_POST["password"];
  $sex=$_POST["sex"];
  if(isset($_POST["add"]))
  {
  $dbhost = 'localhost:3036';
  $dbuser = 'root';
  $dbpass = '123456';
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
	{
  die('Could not connect: ' . mysql_error());
	}

	$sql = 'insert into user (name,email,password,role,sex) values ("'.$name.'","'.$email.'",md5("'.$password.'"),"user","'.$sex.'")';

	mysql_select_db('events');
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
  	die('Could not enter data: ' . mysql_error());
	}
	header('location:sign_in.html');
	mysql_close($conn);
}
  	
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/register-js.js"></script>
<noscript>
   <div style="color:white">
      You don't have javascript enabled.  Good luck with that.
   </div>
</noscript>
<title>Registration</title>
<link rel="stylesheet" type="text/css" href="css/register-css.css">
</head>
<body>

  <div id="header">
    <span style="padding-left:162px;color:white;font-size:22px;font-family:Droid Sans"><b>INNORAFT</b></span>
    <span style="padding-left:164px;color:black"><a href="sign_in.html"><img src="img/2.png" height="15px" width="15px"></a></span>
    <span style="padding-left:58px;color:#4C4C4C;font-family:arial;font-size:14px;font-weight:800">Registration Form &nbsp<img src="img/triangle3.png"  height="9px"></span>
    <span style="padding-left:69px;color:black"><a href="sign_in.html"><img src="img/1.png" height="15px" width="15px"></a></span>
    <span style="padding-left:120px">
      <img src="img/fb.png" height="20px" width="25px">&nbsp;&nbsp;&nbsp;
      <img src="img/twitter-logo.png" height="20px" width="25px">&nbsp;&nbsp;&nbsp;
      <img src="img/twitter-logo.png" height="20px" width="25px">&nbsp;&nbsp;&nbsp;
      <img src="img/fb.png" height="20px" width="25px">&nbsp;&nbsp;&nbsp;
    </span>
  </div>
  <div id="main">
    <div style="background: -moz-linear-gradient(#db705a, #d45944);background:linear-gradient(#db705a, #d45944);box-shadow: 0 0 3px -1px #000000;border-radius:3px;margin-left:489px;width:232px;padding:10px;color:white;text-align:center">Welcome</div><br>
     <div id="inner">
      <div id="switch">
        <span id="female" class="female" >Female</span>
        <span id="male" class="male-old">Male</span>
      </div>
      <br>
      <form action="<?php $_PHP_SELF ?>" method="post">
        <input id="rfemale" type="radio" name="sex" value="female" style="display:none">
        <input id="rmale" type="radio" name="sex" value="male" style="display:none">
        <input type="text" class="input" name="name"  style="width:225px;height:25px;"placeholder="Name" ><br><br>
        <input type="text" class="input" name="email" id="username" style="width:225px;height:25px;"placeholder="Email address" ><br><br>
        <input type="password" name="password" class="input "id="password" style="width:225px;height:25px;" placeholder="Password" ><br><br>
        <input type="checkbox" name="tc" value="yes" id="checkbox"> <span style="font-size:11px;color:#666666">I have read all terms and condition</span>
        <br><br>
        <div id="captcha">        
        <span id="c1"></span><span>+</span><span id="c2"></span>=<span><input type="text" id="ctext" style="width:90px;background-color:  #FFA3D1"></span>  
        </div>
        <br>
        <input type="submit" name ="add" id="sub" style="border:solid 2px #e5e5e5;width:190px; height:40px;background-color:#f4f4f4"value="Create Account"><br><br>
      </form>
     </div>
     

  </div>
  <?php include('footer.php');?>
</body>
</html>
