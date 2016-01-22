<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');



include 'connect_to_database.php'; //connect the connection page
if(empty($_SESSION)) // if the session not yet started
   session_start();


if(isset($_SESSION['username'])) { // if already login
   header("location: index.php"); // send to home page
   exit; 
}

?>
<html>
<head></head>
<body>
<form action = "login_proccess.php" method = "post">
Username: <input type="text" name="username" /><br />
Password: <input type="password" name="password" /><br />
<input type = "submit" name="submit" value="login" />
</form>
</body>
</html>