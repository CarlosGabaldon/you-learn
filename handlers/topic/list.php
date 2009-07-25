<?php

	# Mod_rewrite contains the URL dispatch routing rules(see: /etc/apache2/users/carlos.conf)
	# Apache document root: {/Library/WebServer/Documents}$ sudo apachectl restart
	
	require($_SERVER['DOCUMENT_ROOT']."/data/topic.php");

	function handle_request() {
	
		$topics = Topic::find_all();
		
		$params = array('topics' => $topics);
	
		include($_SERVER['DOCUMENT_ROOT']."/templates/topic_list.php");
	
		return write_response($params);
	}


	try { 
	
		echo handle_request();

	} catch (Exception $e) {
		echo "Sorry, there was an error: ".$e->getMessage().".";
	}


?>