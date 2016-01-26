<?php
	$id = intval($_POST['id']);  //retreiving the value sent by javascript

	// connect
	$m = new Mongo("db");

	// select a database
	$db = $m->videos;

	// select a collection (analogous to a relational database's table)
	$collection = $db->videos;      
	
	$collection['_id'] = $collection['_id'] + 1;
	$collection->save( $document );
?>