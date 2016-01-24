<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
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
 // $username = stripslashes($username);
 // $username = mysql_real_escape_string($username);
 // $email = stripslashes($email);
 // $email = mysql_real_escape_string($email);
 // $password = stripslashes($password);
 // $password = mysql_real_escape_string($password);

 $query = "INSERT into users_tbl (username, password, email) VALUES ('$username', '$password', '$email')";
 $result = mysql_query($query);
 if($result){
 echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
 }
 }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</body>
</html>