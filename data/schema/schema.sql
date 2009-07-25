#$ mysql -u root < schema.sql

drop database if exists you_learn_dev;
create database you_learn_dev;
use you_learn_dev;


CREATE TABLE topics (
	id				SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name    		VARCHAR(50),
    description   	TEXT
    );

create TABLE topic_resource (
	topic_id		INT,
	resource_id     INT
	);
	
create TABLE resources(
	id				SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name			VARCHAR(50),
	description		TEXT,
	source_type_id	INT,
	uri				TEXT
	);
	
create TABLE source_types(
	id			SMALLINT UNSIGNED NOT NULL PRIMARY KEY,
	name		VARCHAR(50),
	base_uri	TEXT
	);


# SOURCE TYPES #
INSERT INTO source_types (id, name, base_uri) 
VALUES (1,
		"Google",
		"http://www.google.com");
		
INSERT INTO source_types (id, name, base_uri) 
VALUES (2,
		"Wikipedia",
		"http://en.wikipedia.org");
		
INSERT INTO source_types (id, name, base_uri) 
VALUES (3,
	    "YouTube",
		"http://www.youtube.com/");
		
		
INSERT INTO source_types (id, name, base_uri) 
VALUES (4,
	    "NBC",
		"http://video.nbcuni.com/");

		
		
		
# LEARNING RESOURCES # - Step 1 add a video with clip id
INSERT INTO resources (name, description, source_type_id, uri)
VALUES ("wikipedia_article",
		"Wikipedia article on african american studies",
		2,
		"http://en.wikipedia.org/wiki/African_American");

INSERT INTO resources (name, description, source_type_id, uri)
VALUES ("youtube_video",
		"YouTube video on photography",
		3,
		"http://www.youtube.com/watch?v=Xnn5nzPvoIM&videos=tZHPzQ-T1KY&playnext_from=TL&playnext=1");

INSERT INTO resources (name, description, source_type_id, uri)
VALUES ("nbc_video_desegregation",
		"NBC video on African Studies",
		4,
		"212645");

INSERT INTO resources (name, description, source_type_id, uri)
VALUES ("nbc_video_fifteenth_amendment",
		"NBC video on Fifteenth Amendment",
		4,
		"957102"); 
		

INSERT INTO resources (name, description, source_type_id, uri)
VALUES ("nbc_video_rosa_parks",
		"NBC video on Rosa Parks",
		4,
		"213296"); 

INSERT INTO resources (name, description, source_type_id, uri)
VALUES ("nbc_video_baseball_color_line",
		"NBC video on baseball color line",
		4,
		"213955");
	
		
		
		


# TOPICS # - Step 2 add topic with description
INSERT INTO topics (name, description) 
VALUES ("Desegregation",
		"Desegregation is the process of ending racial segregation, most commonly used in reference to the United States. 
		Desegregation was long a focus of the American Civil Rights Movement, both before and after the United States Supreme 
		Court's decision in Brown v. Board of Education, particularly desegregation of the school systems and the military. 
		Racial integration of society was a closely related goal.");

INSERT INTO topics (name, description) 
VALUES ("Fifteenth-Amendment",
		"The Fifteenth Amendment (Amendment XV) to the United States Constitution prohibits each government in the United States 
		from denying a citizen the right to vote based on that citizen's 'race, color, or previous condition of servitude' (i.e., slavery). 
		It was ratified on February 3, 1870. The Fifteenth Amendment is one of the Reconstruction Amendments. The Fifteenth Amendment is 
		the third of the Reconstruction Amendments. This amendment prohibits the states and the federal government from using a citizen's
		race,[1] color or previous status as a slave as a voting qualification. Its basic purpose was to enfranchise former slaves. 
		While some states had permitted the vote to former slaves even before the ratification of the Constitution, this right was rare, 
		not always enforced and often under attack. The North Carolina Supreme Court upheld this right of free men of color to vote; in 
		response, amendments to the North Carolina Constitution removed the right in 1835.[2] Granting free men of color the right of to 
		vote could be seen as giving them the rights of citizens, an argument explicitly made by Justice Curtis's dissent in Dred Scott v. 
		Sandford:");
		

INSERT INTO topics (name, description)
VALUES ("Rosa-Parks",
		"On December 1, 1955 in Montgomery, Alabama, Parks, age 42, refused to obey bus driver James Blake's order that she give up 
		her seat to make room for a white passenger. Her action was not the first of its kind: Irene Morgan, in 1946, and Sarah Louise Keys, 
		in 1955, had won rulings before the U.S. Supreme Court and the Interstate Commerce Commission respectively in the area of interstate 
		bus travel. Nine months before Parks refused to give up her seat, 15-year-old Claudette Colvin refused to move from her seat on the 
		same bus system. But unlike these previous individual actions of civil disobedience, Parks's action sparked the Montgomery Bus Boycott.
		Parks's act of defiance became an important symbol of the modern Civil Rights Movement and Parks became an international icon of 
		resistance to racial segregation. She organized and collaborated with civil rights leaders, including boycott leader Martin 
		Luther King, Jr., helping to launch him to national prominence in the civil rights movement.");


INSERT INTO topics (name, description)
VALUES ("Baseball-color-line",
		"The baseball color line, sometimes called the 'Gentleman's Agreement', was the policy, unwritten for nearly its entire duration, which 
		excluded African American players and Latin players of African descent from organized baseball in the United States before 1947. 
		As a result, various Negro Leagues were formed, which featured those players not allowed to participate in the major or minor leagues.
		The separation's beginnings occurred in 1868, when the National Association of Base Ball Players decided to ban 'any club including one or more colored persons.' 
		As baseball made the transition toward becoming a professional sport over the next decade, and the NABBP dissolved into competing 
		organizations in 1871, professional players were no longer restricted by this rule and, for a short while – in 1878 and again in 
		1884 – African American players played professional baseball. Over time, they were slowly excluded more and more. As prominent 
		players such as Cap Anson steadfastly refused to take the field with or against teams with African Americans on the roster, it 
		became informally accepted that African Americans were not to participate in Major League Baseball.");


# TOPIC TO RESOURCE # - Step 3 map topic to resource
INSERT INTO topic_resource (topic_id, resource_id)
VALUES ((SELECT id from topics where name = 'Desegregation'), (SELECT id from resources where name = 'nbc_video_desegregation'));

INSERT INTO topic_resource (topic_id, resource_id)
VALUES ((SELECT id from topics where name = 'Fifteenth-Amendment'), (SELECT id from resources where name = 'nbc_video_fifteenth_amendment'));

INSERT INTO topic_resource (topic_id, resource_id)
VALUES ((SELECT id from topics where name = 'Rosa-Parks'), (SELECT id from resources where name = 'nbc_video_rosa_parks'));

INSERT INTO topic_resource (topic_id, resource_id)
VALUES ((SELECT id from topics where name = 'Baseball-color-line'), (SELECT id from resources where name = 'nbc_video_baseball_color_line'));






