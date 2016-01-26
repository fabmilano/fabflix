<?php
	$id = intval($_POST['id']);  //retreiving the value sent by javascript

	// connect
	$m = new Mongo("db");

	// select a database
	$db = $m->videos;

	// select a collection (analogous to a relational database's table)
	$collection = $db->videos;

	$document = $collection->findOne((array('_id' => '$id')));      
	
	$document['like'] = $document['like'] + 1;
	$collection->save( $document );
?>