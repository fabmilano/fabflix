<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="includes/style.css">
<title>Registration</title>
<!-- <link rel="stylesheet" href="css/style.css" /> -->
</head>
<body>
<?php
 require('connect_to_database.php');
 // If form submitted, insert values into the database.
 if (isset($_POST['username'])){
 $username = $_POST['username'];
 $email = $_POST['email'];
 $password = $_POST['password'];



 $sql = "SELECT * FROM users.users_tbl WHERE email='$email'";
 $res = mysql_query($sql);
 if(mysql_num_rows($res)==0) {
 	

 	mysql_query("INSERT INTO users.users_tbl (username, password, email) VALUES ('$username', '$password', '$email')");
 	echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";

 	
 	
 }else{
 	echo "Email address already in use";

 }


 // $query = "INSERT into users_tbl (username, password, email) VALUES ('$username', '$password', '$email')";
 // $result = mysql_query($query);
 // if($result){
 // echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
 // }
 }else{
?>
<center>
	<div class="form">
	<h1>Registration</h1>
	<form name="registration" action="" method="post">
	<input type="text" name="username" placeholder="Username" required /><br /><br />
	<input type="email" name="email" placeholder="E-mail" required /><br /><br />
	<input type="password" name="password" placeholder="Password" required /><br /><br />
	<input type="submit" name="submit" value="Register" />
	</form>
	</div>
</center>
<?php } ?>
</body>
</html>