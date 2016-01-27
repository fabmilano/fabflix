<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	echo $_POST["title"]; 
	// $title = $_POST['value'];                      //retreiving the value sent by javascript
	
	// $connection = new Mongo("db"); //connecting to the database
	// $db = $connection->videos;                    //the name of my database
	// $collection = $db->videos;                       //the name of my collection
	
	// $criteria = array("title"=>$title);                   //find the document with the specific id
	// $newdata = array('$inc'=>array("likes"=>1));     //and increase the value of the "like" property by 1
	
	// $collection->update(
	//             $criteria,
	//             $newdata,
	//             array('multiple'=>true, 'safe'=>true)
	//           );
	
	?>