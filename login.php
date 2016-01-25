<?php





include 'connect_to_database.php'; //connect the connection page
if(empty($_SESSION)) // if the session not yet started
   session_start();


if(isset($_SESSION['email'])) { // if already login
   header("Location: index.php"); // send to home page
   exit; 
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="includes/style.css">
	<title>Welcome, please Log In</title>
</head>
<body>
<center>

<h1>FabFlix Login</h1>
<form action = "login_proccess.php" method = "post">
E-mail:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="email" name="email" /><br /><br />
Password:&nbsp; <input type="password" name="password" /><br /><br /><br />
<input type = "submit" name="submit" value="login" />
</form>

<p>Not registered yet? <a href='registration.php'style="color: #f2a223">Register Here</a></p>

</body>

</center>
</html>