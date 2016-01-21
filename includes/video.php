<html>

<head>


    <link href="http://vjs.zencdn.net/4.11/video-js.css" rel="stylesheet">
    <script src="http://vjs.zencdn.net/4.11/video.js"></script>

    <script src="Base64.js"></script>
    <script src="jquery-2.1.4.js"></script>
    <script src="getvideo.js"></script>


</head>

<body>






<?php






// connect
$m = new Mongo("db");

// select a database
$db = $m->videos;

// select a collection (analogous to a relational database's table)
$collection = $db->videos;



// find everything in the collection
$cursor = $collection->find();

// iterate through the results
foreach ($cursor as $document) {
    $title =  $document["title"];
    $link = "rtmp://mymongotest.cloudapp.net:1935/vod2/" .  $document["rtmp"];
    $image = "http://mymongotest.cloudapp.net:8080/" .  $document["pic"];

    echo $image;
    
    ?><h3><?php echo $title;?></h3>
    <div id="instructions"><?php
    echo '<video class="video-js vjs-default-skin" poster=$image>';
    echo "<source src=\"$link\"   type=\"rtmp/mp4\" />";
    ?></video><?php
    ?></div><?php

   echo nl2br( "Category: " .  $document["category"]  .  "\n" );
   echo nl2br( "Description: " . $document["description"] . "\n" );
   echo "Year: " . $document["year"];
   echo '<hr>';

}

?>

</body>


</html>
