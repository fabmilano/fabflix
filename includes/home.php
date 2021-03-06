<html>

<head>

    <link rel="stylesheet" type="text/css" href="includes/style.css">


    <link href="http://vjs.zencdn.net/4.11/video-js.css" rel="stylesheet">
    <script src="http://vjs.zencdn.net/4.11/video.js"></script>

    <script src="Base64.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="getvideo.js"></script>

    <script type="text/javascript">
      function like(value) {
        $.post("http://mymongotest.cloudapp.net/fabflix/includes/like.php", {title:value});
        setTimeout("location.reload(true);", 500);
        return false; 
      }

    </script>

  

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


// Sort on date ascending and age descending
$cursor->sort(array('likes' => -1, 'year' => -1));

// iterate through the results
foreach ($cursor as $document) {
    $title =  $document["title"];
    $link = "rtmp://mymongotest.cloudapp.net:1935/vod2/" .  $document["rtmp"];
    $image = "http://mymongotest.cloudapp.net:8080/" .  $document["pic"];
    
    
    
    ?><h3><?php echo $title;?></h3>
    <div id="instructions">
      <video class="video-js vjs-default-skin" width="640px" height="267px" 
      controls poster="<?php echo $image ?>" preload="none" data-setup='{ "aspectRatio":"640:267", "playbackRates": [1, 1.5, 2] }'>
      <source src="<?php echo $link ?>"   type="rtmp/mp4" />
      </video>
    </div><?php

   ?><input type="image" id="likebutton" name="likebutton" style="position: absolute; left:608px" value="<?php echo $title ?>" src="includes/images/likebutton.png" onclick="like(this.value)" /><?php
   echo nl2br( "Genre: " .  $document["genre"]  .  "\n" );
   echo nl2br( "Director: " . $document["director"] . "\n" );
   echo nl2br( "Year: " . $document["year"] . "\n" );
   echo nl2br( "Likes: " . $document["likes"] . "\n"  . "\n"  . "\n" );

   

}

?>

</body>


</html>
