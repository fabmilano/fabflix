<?php





include 'connect_to_database.php'; //connect the connection page
if(empty($_SESSION)) // if the session not yet started
   session_start();


if(isset($_SESSION['username'])) { // if already login
   header("Location: index.php"); // send to home page
   exit; 
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Welcome, please Log In</title>
</head>

<h1>FabFlix Login</h1>
<form action = "login_proccess.php" method = "post">
E-mail: <input type="text" name="username" /><br />
Password: <input type="password" name="password" /><br />
<input type = "submit" name="submit" value="login" />
</form>
</body>
</html>