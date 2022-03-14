<!-- handles the login page -->
<?php
session_start(); 
//  database connection
$conn = new mysqli('localhost', 'nyamai', 'nyamai', 'skincare');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fname = $_POST['fname'];
    // $lname = $_POST['lname'];
    $password = $_POST['lpassword'];

    $s = "select * from tbl_users where first_name ='".$fname."'";
    $result = mysqli_query($conn, $s);
    $row = mysqli_fetch_array($result);
    $hashed_pass = $row['password'];
    
    if($row['user_type'] == 'customer' && password_verify($password, $hashed_pass)){
        $_SESSION['username'] = $fname;
        header('location:home.php');
    }
    elseif($row['user_type'] == 'dermatologist' && password_verify($password, $hashed_pass)){
        $_SESSION['username'] = $fname;
        header('location:derm_page.php');
    }
    elseif($row['user_type'] == 'admin' && password_verify($password, $hashed_pass)){
        $_SESSION['username'] = $fname;
        header('location:admin.php');
    }
    else{
        echo "wrong credentials";
    }
}
 

?>