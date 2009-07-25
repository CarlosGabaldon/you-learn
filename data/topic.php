<?php

	class Topic{
		
		var $name;
		var $desc;
		var $resources;
		
		public static function create($topic_name, $topic_desc, $resource_name, 
								$resource_desc, $resource_uri, $resource_type){
			
			require_once('data.php');
			
			$sql = "INSERT INTO resources (name, description, source_type_id, uri)
					VALUES ('". $resource_name ."','" . $resource_desc . "',". $resource_type . ", '" . $resource_uri . "');";
			
			put_data($sql);
		
			$sql = "INSERT INTO topics (name, description) 
					VALUES ('". $topic_name ."','" . $topic_desc. "');";

			put_data($sql);
			
			$sql = "INSERT INTO topic_resource (topic_id, resource_id)
					VALUES ((SELECT id from topics where name = '". $topic_name . "'), (SELECT id from resources where name = '" . $resource_name . "'))";

			put_data($sql);
			#echo($sql);
			
		}
		
		
		public static function find_by_name($name){
			
			require_once('data.php');
			require_once('resource.php');
			
			#$sql = "select * from topics where name= ?;";
			#$results = execute_query($sql, array($name));
			
			$sql = "select * from topics where name = '" . $name . "';";
			$results = get_data($sql);
			
			$row = $results[0];
			$topic = new Topic();
			$topic->name = $row["name"];
			$topic->desc = $row["description"];
			$topic->resources = Resource::find_all_by_topic_id($row["id"]);
			return $topic;
		}
		
		public static function find_all(){
			
			include('data.php');
			
			$sql = "select * from topics;";
			$results = get_data($sql);

			foreach($results as $row ){
				$topic = new Topic();
				$topic->name = $row["name"];
				$topic->desc = $row["description"];
				$topics[] = $topic;
			}
			
			
			return $topics;
		}
		
	}



?>