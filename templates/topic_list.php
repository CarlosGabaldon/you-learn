<?php function write_response($params) { 

	foreach ($params['topics'] as $topic) {
	    $topics = $topics . "<li><a href='/topic/". $topic->name . "'>". $topic->name . "</a></li>";
	}

$html = <<<TEMPLATE
<html>
	<head>
		<title>LMS Video</title>
	</head>
	<body>
		<h2>Topics</h2>
		<ul>
			{$topics}
		</ul>
		<br/>
		<form method="post" action="/topics/add">
			Topic Name:<br/>
			<input name="topic_name" type="text"/>
			<br/>
			Topic Description:<br/>
			<textarea name="topic_desc" rows="10" cols="80"></textarea>
			<br/>
			Resource Name:<br/>
			<input name="resource_name" type="text"/>
			<br/>
			Resource Description:<br/>
			<input name="resource_desc" type="text"/>
			<br/>
			Resource Type:<br/>
			<select name="resource_type">
				<option value="4">NBC</option>
			</select>
			<br/>
			Resource clip id:<br/>
			<input name="resource_uri" type="text"/>
			<br/>
			<br/>
			<input type="submit" value="Add" />
		</form>
	</body>
</html>
TEMPLATE;

return $html;

} ?>