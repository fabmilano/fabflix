<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	
	$title = $_POST['title'];                      //retreiving the value sent by javascript
	
	$connection = new Mongo("db"); //connecting to the database
	$db = $connection->videos;                    //the name of my database
	$collection = $db->videos;                       //the name of my collection
	$product_array = array("title"=>$title);
	$document = $collection->findOne( $product_array );
	
	// specify new values for likes
	$document['likes'] = $document['likes'] + 1;


	// save back to the database
    $collection->save( $document );
	?>