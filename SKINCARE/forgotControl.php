<?php
session_start(); 
//  database connection
$conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');

if(isset($_POST['forgot'])){
    $email = $_POST['email'];
    
    $query = "SELECT * FROM tbl_users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){ 
            header('location: newPassword.php');
        }
        else{
            echo "
            <script>
            alert('email not found!');
            window.location.href = 'forgot.php';
            </script>
            ";
        }
}
?>