<?php

	
	
	$title = $_POST['title'];                      //retreiving the value sent by javascript
	
	$connection = new Mongo("db"); //connecting to the database
	$db = $connection->CATALOGUE;                    //the name of my database
	$collection = $db->movies;                       //the name of my collection
	
	$criteria = array("title"=>$title);                   //find the document with the specific id
	$newdata = array('$inc'=>array("likes"=>1));     //and increase the value of the "like" property by 1
	
	$collection->update(
	            $criteria,
	            $newdata,
	            array('multiple'=>true, 'safe'=>true)
	          );
	
	?>