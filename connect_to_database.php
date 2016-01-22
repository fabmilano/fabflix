<?php

// error_reporting(E_ALL);
// ini_set('display_errors', '1');

// Your MySQL database login information
$host = "172.17.0.22:3306"; // Your host address to your database on your server. Usually "localhost". Check with your hosting provider
$user = "root"; // Your username you set up for this database on your server
$pass = "admin"; // Your password you set up for this database on your server
$db = "users"; // The database name that you will be connecting to

// Connecting to the MySQL database
mysql_connect($host, $user, $pass);


// if (!$link) {
//     die('Could not connect: ' . mysql_error());
// }
// echo 'Connected successfully';

mysql_select_db($db);
?>