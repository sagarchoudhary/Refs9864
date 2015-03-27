
<html>
<head>
	<title>taxonomy</title>
  <?php include('layout.php') ?>
</head>
<body>
<?php include('header.php'); ?>
<div id="container">

  <?php
  include("session.php");
  include("menu.php");
  if($role_session!='admin'){
    header('location:sign_in.html'); 
  }
  include('addDatabase.php');
  $tname=$_POST["tname"];

if(isset($_POST["add"]))
{
  include('addDatabase.php');

  $sql = 'insert into taxonomy (name) values ("'.$tname.'")';

  mysql_select_db('events');
  $retval = mysql_query( $sql, $conn );
  if(! $retval )
  {
    die('Could not enter data: ' . mysql_error());
  }
  else{
    header('location:viewTaxonomy.php');
  }
  

} 


  $sql = 'select * from taxonomy';
  mysql_select_db('events');
  $retval = mysql_query( $sql, $conn );
  if(! $retval ){
    die('Could not enter data: ' . mysql_error());
  }
  $all_results = array();
  while ($result = mysql_fetch_assoc($retval)){
    $all_results[] = $result;
  } ?>
  <br>
  <h1>Type</h1>
  <br>
  <table >
    <tr>
    	<th>Type Name</th>
    	<th>Action</th>
    	<th>Action</th>
    </tr>
    <?php
    foreach ($all_results as $key => $value) { ?>
    <tr>

     <td style="text-transform: capitalize;"><?php echo($all_results[$key]['name']); ?></td>
     <td><a href="editTaxonomy.php?tid=<?php echo($all_results[$key]['tid']); ?>"><button>Edit</button></a></td>
     <td><a href="deleteTaxonomy.php?tid=<?php echo($all_results[$key]['tid']); ?>"><button>Delete</button></a></td>   		
   </tr>
    <?php	} ?>
  </table> 

  <?php
    mysql_close($conn);
  ?>
<br><br>
  <div id="form1">
  <form action="<?php $_PHP_SELF ?>" method="post" >
   <input type="text" name="tname" style="width:256px;" placeholder="Add Taxonomy" />
    <input name="add" type="submit" id='submit' value="Submit" style="width:83px;" /><br>
  </form>
  </div>

</div>
<?php include('footer.php');?>
</body>
</html>