<?php
session_start(); 
//  database connection
$conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');

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
        session_unset();
        session_destroy();
        header('location: authentication.php');
    }

    
}
?>