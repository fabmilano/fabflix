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

    ?><h3><?php echo $title;?></h3>
    <div id="instructions"><?php
    echo '<video class="video-js vjs-default-skin" width="640px" height="267px" controls preload="none" data-setup=\'{ "aspectRatio":"640:267", "playbackRates": [1, 1.5, 2] }\'>';
    echo "<source src=\"rtmp://fabflix.cloudapp.net:1935/vod2/big_buck_bunny.mp4\"   type=\"rtmp/mp4\" />";
    ?></video><?php
    ?></div><?php




// connect
$m = new Mongo("videocat");

// select a database
$db = $m->videos;

// select a collection (analogous to a relational database's table)
$collection = $db->videos;



// find everything in the collection
$cursor = $collection->find();

// iterate through the results
foreach ($cursor as $document) {
    $title =  $document["title"];
    $link = "rtmp://fabflix.cloudapp.net:1935/vod2/" .  $document["rtmp"];
    ?><h3><?php echo $title;?></h3>
    <div id="instructions"><?php
    echo '<video class="video-js vjs-default-skin" width="640px" height="267px" controls preload="none" data-setup=\'{ "aspectRatio":"640:267", "playbackRates": [1, 1.5, 2] }\'>';
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
