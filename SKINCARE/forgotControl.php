<?php
require './config.php';
session_start(); 
//  database connection
  // new keyword creates an object from class
  $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

// isset checks whether a variable is set
if(isset($_POST['forgot'])){
    $email = $_POST['email'];
    
    $query = "SELECT * FROM tbl_users WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    // fetches result as an associative array
    $row = mysqli_fetch_assoc($result);


    if(mysqli_num_rows($result) == 1){ 
         $_SESSION['email'] = $email;
           // php function sends raw http header to browser
            header('location: newPassword.php');
        }
        else{
         // window.location.href gets the address of the current page and redirects the browser to a new page or url
            echo "
            <script>
            alert('email not found!');
            window.location.href = 'forgot.php';
            </script>
            ";
        }
}
?>