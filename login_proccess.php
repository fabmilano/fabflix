<?php




include 'connect_to_database.php'; //connect the connection page
 
if(empty($_SESSION)) // if the session not yet started
   session_start();
if(!isset($_POST['submit'])) { // if the form not yet submitted
   header("Location: login.php");
   exit;
}
//check if the email entered is in the database.
$test_query = "SELECT * FROM users_tbl WHERE email = '".$_POST['email']."'";
$query_result = mysql_query($test_query);
//conditions
if(mysql_num_rows($query_result)==0) {
//if email entered not yet exists
    echo "The email you entered is invalid.";
}else {
//if exists, then extract the password.
    while($row_query = mysql_fetch_array($query_result)) {
        // check if password are equal
        if($row_query['password']==$_POST['password']){
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['username'] = $row_query['username'];
            header("Location: index.php");
            exit;
        } else{ // if not
            echo "Invalid Password";
        }
    }
}
?>