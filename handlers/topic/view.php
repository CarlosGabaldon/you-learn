<?php
	// define our application directory
	define('APP_PATH', $_SERVER['DOCUMENT_ROOT']);
	
	require(APP_PATH ."/data/topic.php");

	function handle_request() {
	
		# GET params
		$topic = $_GET['topic'];
		
		# PROCESS request
		$topic = Topic::find_by_name($topic);
	
		# HANDLE response
		$params = array('topic' => $topic);
	
		
		include($_SERVER['DOCUMENT_ROOT']."/templates/topic_view.php");
	
	
		return write_response($params);
	}


	try { 
	
		echo handle_request();

	} catch (Exception $e) {
		echo "Sorry, there was an error: ".$e->getMessage().".";
	}





	




?>