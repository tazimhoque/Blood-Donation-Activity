<?php
// http://frozenade.wordpress.com/2007/11/24/how-to-create-login-page-in-php-and-mysql-with-session/
// Inialize session
session_start();

// Include database connection settings
include 'db_connection.php';

if(isset($_POST['submit'])){
// Retrieve username and password from database according to user's input
    // Retrieve username and password from database according to user's input
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

 $sql_login = "SELECT count(email) as total from hospitalinfo where password='$password' and email='$email'";

            if($query_run=  mysqli_query($con,$sql_login))
                {
                $query_row=  mysqli_fetch_assoc($query_run);
                }
            
            $total_result = $query_row['total'];
            //echo 'total result found '.$total_result;
echo $total_result.' '.$email.' '.$password;
// Check username and password match
if ( $total_result == 1) {
// Set username session variable
$_SESSION['email'] = $_POST['email'];
// Jump to secured page
header('Location: HospitalPage.php');
}
else {
// Jump to login page
header('Location: homePage.php');
}
}
?>
