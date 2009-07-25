<?php

	require_once("MDB2.php");

	function connect() {
		
		$url = "mysql://root:@127.0.0.1/you_learn_dev";
	    $con = MDB2::factory($url);
	    if(PEAR::isError($con)) {
	        die("Error while connecting : " . $con->getMessage());
	    }
	    return $con;
	}


	function get_data($sql, $values=array()) {
		
		#Get data from cache..
		
	    $con = connect();
	    
	    $results = array();
	    if(sizeof($values) > 0) {
	        $statement = $con->prepare($sql, TRUE, MDB2_PREPARE_RESULT);
	        $resultset = $statement->execute($values);
	        $statement->free();
	    }
	    else {
	        $resultset = $con->query($sql);
	    }
	    if(PEAR::isError($resultset)) {
	        die('DB Error... ' . $resultset->getMessage());
	    }
		
	    while($row = $resultset->fetchRow(MDB2_FETCHMODE_ASSOC)) {
			$results[] = $row;
	    }
	   
	    return $results;
	}
	
	
	function put_data($sql){
		
		$con = connect();
		
		$result = $con->query($sql);
		
		if(PEAR::isError($result)) {
	        die('DB Error... ' . $result->getMessage());
	    }
		
		
	}




?>