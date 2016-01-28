<html>

<head>


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
$cursor = $collection->find(array('genre' => 'sci-fi'));


// Sort on date ascending and age descending
$cursor->sort(array('year' => 1, 'title' => 1));


// iterate through the results
foreach ($cursor as $document) {
    $title =  $document["title"];
    $link = "rtmp://mymongotest.cloudapp.net:1935/vod2/" .  $document["rtmp"];
    $image = "http://mymongotest.cloudapp.net:8080/" .  $document["pic"];
    $plot = $document["plot"];

    
    ?><h3><?php echo $title;?></h3>
    <div id="instructions">
      <video class="video-js vjs-default-skin" width="640px" height="267px" 
      controls poster="<?php echo $image ?>" preload="none" data-setup='{ "aspectRatio":"640:267", "playbackRates": [1, 1.5, 2] }'>
      <source src="<?php echo $link ?>"   type="rtmp/mp4" />
      </video>
    </div><?php


   ?><input type="image" id="likebutton" name="likebutton" style="position: absolute; left:608px" value="<?php echo $title ?>" src="includes/images/likebutton.png" onclick="like(this.value)" /><?php
   echo nl2br( "Director: " . $document["director"] . "\n" );
   echo "Year: " . $document["year"] . "\n" ;
   echo nl2br("\n" . "Likes: " . $document["likes"] . "\n" );
   ?><div style="font-style: italic; width:400px; overflow:auto;"> <?php echo "\n" . $document["plot"] . "\n"  . "\n"  . "\n"; ?> </div><?php
   // echo '<hr>';

}






?>

</body>


</html>