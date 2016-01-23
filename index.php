

<?php
include 'connect_to_database.php'; //connect the connection page

if(empty($_SESSION)) // if the session not yet started
   session_start();

if(!isset($_SESSION['username'])) { //if not yet logged in
   header("Location: login.php");// send to login page
   exit;
}
?>



<html>

<head>
        <title>FabFlix</title>
</head>


<body>

        <h1>FabFlix</h1>

        <?php $name = strtok($_SESSION['username'], '@'); ?>

        Welcome <?php echo $name; ?>,
        <a href="logout.php">logout</a> 



        <hr>


        <a href="?page=home">Home</a> ||
        <a href="?page=comedy">Comedy</a> |
        <a href="?page=drama">Drama</a> |
        <a href="?page=horror">Horror</a> |
        <a href="?page=scifi">Sci-Fi</a>


        <hr>



        <?php

        if(isset($_GET['page'])) {

                $page = $_GET["page"];
                $filename = "includes/" . $page . '.php';

                if(file_exists($filename)) {
                        include $filename;
                }else{
                        include 'includes/home.php';
                }

        }else{
                include 'includes/home.php';
        }




        ?>








</body>


</html>
