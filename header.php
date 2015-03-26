

<div id="header">
<?php
if($role_session=='admin'){
  ?>
    <span style="padding-left:162px;color:white;font-size:22px;font-family:Droid Sans"><a href="viewUser.php"><b>EVENT.COM</b></a></span>
    <?php } 
    else{
    ?>
    <span style="padding-left:162px;color:white;font-size:22px;font-family:Droid Sans"><a href="viewEvent.php"><b>EVENT.COM</b></a></span>
    <?php } ?>
    <span style="padding-left:245px;color:#4C4C4C;font-family:arial;font-size:14px;font-weight:800"><?php echo($pagename);?>&nbsp</span>
    
    <span style="padding-left:258px">
      <img src="img/fb.png" height="20px" width="25px">&nbsp;&nbsp;&nbsp;
      <img src="img/twitter-logo.png" height="20px" width="25px">&nbsp;&nbsp;&nbsp;
      <img src="img/twitter-logo.png" height="20px" width="25px">&nbsp;&nbsp;&nbsp;
      <img src="img/fb.png" height="20px" width="25px">&nbsp;&nbsp;&nbsp;
    </span>
  </div>
