<?php
if(!isset($_SESSION['login'])){ //if login in session is not set
    header("Location: http://mymongotest.cloudapp.net/fabflix/login.php");
}
?>

<html>

<head>
        <title>FabFlix</title>
</head>


<body>

        <h1>FabFlix</h1>
        <?php 
        if(isset($_GET['msg'])) {
                $msg = urldecode($_GET['msg']);
                echo "<p class=\"info-msg\">$msg</p>";
        }
        ?>
        <hr>
        <hr>


        <a href="?page=home">Home</a> |
        <a href="?page=video">Videos</a> |


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
