<html>

<head>

    <link rel="stylesheet" type="text/css" href="includes/style.css">


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


// Sort on date ascending and age descending
$cursor->sort(array('year' => 1, 'title' => 1));

// iterate through the results
foreach ($cursor as $document) {
    $title =  $document["title"];

    //This calculates the sites ranking and then outputs it - rounded to 1 decimal
    if($document['votes']){
      $current = $document['tot'] / $document['votes'];
      echo "Current rating: " . round($current, 1) . "<br>";
    }else{
      echo "Current rating: undefined" . "<br>";
    }


     $mode = $_GET['mode'];
     $voted = $_GET['voted'];
     $id = $_GET['id'];
     //$id=$document["_id"];




      //We only run this code if the user has just clicked a voting link
     if ( $mode=="vote") 
     { 
     
     //If the user has already voted on the particular thing, we do not allow them to vote again  $cookie = "Mysite$id"; 
      if(isset($_COOKIE[$cookie])) 
        { 
        Echo "Sorry You have already ranked that film <p>"; 
        } 
     
     //Otherwise, we set a cooking telling us they have now voted 
      else 
        { 
        $month = 2592000 + time(); 
        setcookie(Mysite.$id, Voted, $month); 
         //Then we update the voting information by adding 1 to the total votes and adding their vote (1,2,3,etc) to the total rating 

        $document["votes"] = $document["votes"] + 1;
        $document["tot"] = $document["tot"] + $voted;
        $collection->save( $document );
     // mysql_query ("UPDATE vote SET total = total+$voted, votes = votes+1 WHERE id = $id"); 
        Echo "Your vote has been cast <p>"; 
        } 
     } 
    


      //This creates 5 links to vote a 1, 2, 3, 4, or 5 rating for each particular item 
     Echo "Rank the film: "; 
     Echo "<a href=".$_SERVER['PHP_SELF']."?mode=vote&voted=1&id=".$document[_id].">1</a> | "; 
     Echo "<a href=".$_SERVER['PHP_SELF']."?mode=vote&voted=2&id=".$document[_id].">2</a> | "; 
     Echo "<a href=".$_SERVER['PHP_SELF']."?mode=vote&voted=3&id=".$document[_id].">3</a> | "; 
     Echo "<a href=".$_SERVER['PHP_SELF']."?mode=vote&voted=4&id=".$document[_id].">4</a> | "; 
     Echo "<a href=".$_SERVER['PHP_SELF']."?mode=vote&voted=5&id=".$document[_id].">5</a><p>"; 








    $link = "rtmp://mymongotest.cloudapp.net:1935/vod2/" .  $document["rtmp"];
    $image = "http://mymongotest.cloudapp.net:8080/" .  $document["pic"];

    
    ?><h3><?php echo $title;?></h3>
    <div id="instructions">
      <video class="video-js vjs-default-skin" width="640px" height="267px" 
      controls poster="<?php echo $image ?>" preload="none" data-setup='{ "aspectRatio":"640:267", "playbackRates": [1, 1.5, 2] }'>
      <source src="<?php echo $link ?>"   type="rtmp/mp4" />
      </video>
    </div><?php

   echo nl2br( "Genre: " .  $document["genre"]  .  "\n" );
   echo nl2br( "Director: " . $document["director"] . "\n" );
   echo "Year: " . $document["year"];
   // echo '<hr>';

}

?>

</body>


</html>
