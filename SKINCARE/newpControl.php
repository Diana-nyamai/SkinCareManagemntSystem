<?php
require './config.php';
session_start(); 
//  database connection
// new keyword creates an object from a class
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $password = $_POST['password'];
    $Cpassword = $_POST['Cpassword'];
    
    if($password != $Cpassword){
        echo "<script>
           alert('passwords dont match!');
           window.location.href = 'newPassword.php';
        </script>";
    }
    else{
        $postPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $email = $_SESSION['email'];
        $updatePassword = "UPDATE tbl_users SET password='$postPassword' WHERE email='$email'";
        $password_pass = mysqli_query($conn, $updatePassword) or die('query failed');

        // removes all the global variables in the current session
        session_unset();
        // destroys all the sessions of the website
        session_destroy();
        header('location: authentication.php');
    }

    
}
?>