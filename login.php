<?php





include 'connect_to_database.php'; //connect the connection page
if(empty($_SESSION)) // if the session not yet started
   session_start();


if(isset($_SESSION['username'])) { // if already login
   header("Location: index.php"); // send to home page
   exit; 
}

?>
<html>
<head></head>
<body>
<h1>FabFlix Login</h1>
<form action = "login_proccess.php" method = "post">
E-mail: <input type="text" name="username" /><br />
Password: <input type="password" name="password" /><br />
<input type = "submit" name="submit" value="login" />
</form>
</body>
</html>