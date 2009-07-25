<?php function write_response($params) { 
	
	$topic = $params['topic'];
	
	if(!is_null($topic->resources)){
		foreach ($topic->resources as $resource) {
			
			if($resource->type == 4){
				$clip_id = $resource->uri; // "212645";
			}
			else{
    			$resources = $resources . "<li><a href='" . $resource->uri . "'>". $resource->name . "</a></li>";
			}
		}
	
	 
	}

$html = <<<TEMPLATE
<html>
	<head>
		<title>LMS Video</title>
		<script type="text/javascript" src="http://video.nbcuni.com/framework/FrameworkManager.js?1 <http://video.nbcuni.com/framework/FrameworkManager.js?1> "></script>

		                <script type="text/javascript">

		                doAfterLoad(function(){

		                embeddedPlayerManager.setAttribute("targetDivID","videoplayer");

		                embeddedPlayerManager.setAttribute("companionContainerID","companiondiv");

		                embeddedPlayerManager.setAttribute("clipPlaylist","{$clip_id}");  // SET THE DIFFERENT CLIPS HERE  SEPORATED BY A COMMA

		                //embeddedPlayerManager.setAttribute("width",320);   // SET THE WIDTH

		                //embeddedPlayerManager.setAttribute("height",270);  // SET THE HEIGHT

		                embeddedPlayerManager.setAttribute("configID","18006");

		                embeddedPlayerManager.setAttribute("videoControls","controls/controls_ah.swf");

		                embeddedPlayerManager.setAttribute("overrideomniture","{'prop48':'UPX Video Player','pageName':'','prop8':'iCue','prop10':'','prop11':'','prop20':'nbcuicuebu'}");

		                embeddedPlayerManager.embedVideoPlayer();

		                });

		 </script>
	</head>
	<body>
		<h2>{$topic->name}</h2>
		<h3>Description</h3>
		<p>{$topic->desc}</p>
		<h3>Learning Resources</h3>
		<ul>
			{$resources}
		</ul>
		<div id="videoplayer" class="videoplayer"></div>
		<a href="/topics"><< Back to Topics</a>
	</body>
</html>
TEMPLATE;

return $html;

} ?>