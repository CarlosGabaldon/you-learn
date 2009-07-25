<?php

	class Resource{
		
		var $name;
		var $desc;
		var $uri;
		var $type;
		
		public static function find_all_by_topic_id($id){
			
			require_once('data.php');
			
			$sql = "select * from resources inner join topic_resource on 
					resources.id = topic_resource.resource_id where topic_resource.topic_id =" . $id . ";";
							
			$results = get_data($sql);
			
			
			foreach($results as $row){
				$resource = new Resource();
				$resource->name = $row['name'];
				$resource->desc = $row['description'];
				$resource->uri = $row['uri'];
				$resource->type = $row['source_type_id'];
				$resources[] = $resource;
				
			}
			
			return $resources;
		}
		
	}



?>