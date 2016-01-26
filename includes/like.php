<?php
	$id = intval($_POST['id']);  //retreiving the value sent by javascript

	// connect
	$m = new Mongo("db");

	// select a database
	$db = $m->videos;

	// select a collection (analogous to a relational database's table)
	$collection = $db->videos;      
	

	$criteria = array("_id"=>$id);                   //find the document with the specific id
	$newdata = array('$inc'=>array("like"=>1));     //and increase the value of the "like" property by 1
	
	$collection->update(
	            $criteria,
	            $newdata,
	            array('multiple'=>true, 'safe'=>true)
	            );
?>