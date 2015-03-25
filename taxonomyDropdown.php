 
 <?php
 $sql_tax = 'select * from taxonomy';
    mysql_select_db('events');
    $retval = mysql_query( $sql_tax, $conn );
    if(! $retval ){
      die('Could not enter data: ' . mysql_error());
    }
    $all_results_tax = array();
    while ($result = mysql_fetch_assoc($retval)){     //all_result_tax having taxonomy name and value for dropdown
      $all_results_tax[] = $result;
    }
    ?>