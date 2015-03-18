
<html>
<head>
	<title>hii</title>
</head>
<body>

<?php
	$dbhost = 'localhost:3036';
	$dbuser = 'root';
	$dbpass = '123456';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn ){
  		die('Could not connect: ' . mysql_error());
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
    <table border="2px black" cellspacing="3px" cellpadding="3px">
    <tr>
    	<th>Taxonomy Name</th>
    	<th>Action</th>
    	<th>Action</th>
    </tr>
   <?php
   	foreach ($all_results as $key => $value) { ?>
   		<tr>
   		 
   		<td><?php echo($all_results[$key]['name']); ?></td>
   		<td><a href="editTaxonomy.php?tid=<?php echo($all_results[$key]['tid']); ?>">edit</a></td>
      <td><a href="deleteTaxonomy.php?tid=<?php echo($all_results[$key]['tid']); ?>">delete</a></td>   		
   		</tr>
   <?php	} ?>

   </table> 
    
<?php
	mysql_close($conn);?>
  
  <a href="addTaxonomy.php"><button>Add Taxonomy</button></a>
  <?php




?>

</body>
</html>