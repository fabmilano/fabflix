<html>

<head>
        <title>FabFlix</title>
</head>


<body>

        <h1>FabFlix</h1>
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
