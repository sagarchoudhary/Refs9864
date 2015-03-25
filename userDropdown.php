<?php
$sql_user = 'select * from user where role="user"';
    mysql_select_db('events');
    $retval = mysql_query( $sql_user, $conn );
    if(! $retval ){
    die('Could not enter data: ' . mysql_error());
    }
    $all_results_user = array();
    while ($result = mysql_fetch_assoc($retval)){
      $all_results_user[] = $result;
    } 
    ?>