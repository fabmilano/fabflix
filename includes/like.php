<?php
	$title = strval($_POST['title']);                      
	$connection = new Mongo("db"); 
	$db = $connection->videos;                   
	$collection = $db->videos;                       
	$product_array = array("title"=>$title);
	$document = $collection->findOne( $product_array );
	$document['likes'] = $document['likes'] + 1;
    $collection->save( $document );
?>