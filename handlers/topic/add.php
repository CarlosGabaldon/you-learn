<?php
	// define our application directory
	define('APP_PATH', $_SERVER['DOCUMENT_ROOT']);
	
	require(APP_PATH ."/data/topic.php");

	function handle_request() {
	
		# GET params
		$topic_name = $_POST['topic_name'];
		$topic_desc = $_POST['topic_desc'];
		$resource_name = $_POST['resource_name'];
		$resource_desc = $_POST['resource_desc'];
		$resource_uri = $_POST['resource_uri'];
		$resource_type = $_POST['resource_type'];
		
		#echo($topic_name);
		

		# PROCESS request
		Topic::create($topic_name, $topic_desc, $resource_name, 
								$resource_desc, $resource_uri, $resource_type);
	
		header("location: list.php");
	}


	try { 
	
		echo handle_request();

	} catch (Exception $e) {
		echo "Sorry, there was an error: ".$e->getMessage().".";
	}






?>