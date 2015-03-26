	
<!-- <div>
<img src="img/banner.gif" style="width:300px;height:70px" ><br>
<br>
</div>
<div id='menu'>
<a href="addUser.php" >Add user</a>
<a href="addTaxonomy.php">Add Taxonomy</a>
  <a href="viewTaxonomy.php">ViewTaxonomy</a>
  <a href="viewEvent.php">View Events</a>
  <a href="addEvent.php">Add Events</a>
<a href="logOut.php">Sign Out</a>
</div> --> 
<?php
function menu($role){

	$menu_all= array(array('href' => 'addUser.php','lable'=>'Add user' ),
		array('href' => 'addTaxonomy.php','lable'=>"Add Taxonomy" ),
		array('href' => 'viewTaxonomy.php','lable'=>"View Taxonomy" ),
		array('href' => 'viewEventAdmin.php','lable'=>"View Eevent" ),
		array('href' => 'viewUser.php','lable'=>"View User" ),
		array('href' => 'addEvent.php','lable'=>"Add Eevent" ),
		array('href' => 'logOut.php','lable'=>"Sign out" ));
	if ($role=='admin') {
		$menu=$menu_all;
	}
	elseif ($role=='content') {
		
		$menu[]=$menu_all[3];
		$menu[]=$menu_all[5];
		$menu[]=$menu_all[6];
	}
	else{
	$menu[]=$menu_all[6];	
	}
return($menu);

}
$menu=menu($role_session); 
$page=$_SERVER['REQUEST_URI'];

	

?>
<span id="name"><?php echo("Hey  ".$username);?></span>
<div id='menu'>
  <?php  foreach ($menu as $key => $value) {
  $page1='/'.$value['href'];
if($page == $page1){
  	?>
    
    <a  href=<?php echo $value['href']; ?> style="background-color:#555"><?php echo $value['lable']; ?></a>
  <?php 
}
else{

	?>
<a href=<?php echo $value['href']; ?>><?php echo $value['lable']; ?></a>
  <?php }
  } ?>
</div>