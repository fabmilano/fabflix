<?php
// All code was wrote by Tim Kipp @ TimKippTutorials.com - December 29, 2010

// Your MySQL database login information
$host = "172.17.0.22:3306"; // Your host address to your database on your server. Usually "localhost". Check with your hosting provider
$user = "root"; // Your username you set up for this database on your server
$pass = "admin"; // Your password you set up for this database on your server
$db = "users"; // The database name that you will be connecting to

// Connecting to the MySQL database
$link = mysql_connect($host, $user, $pass);

if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';



?>