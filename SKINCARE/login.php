<?php
session_start(); 
//  database connection
$conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['lpassword'];

    $s = "select * from tbl_users where first_name ='".$fname."'&& password = '".$password."'";
    $result = mysqli_query($conn, $s);
    $row = mysqli_fetch_array($result);

    if($row['user_type'] == 'customer'){
        $_SESSION['username'] = $fname;
        header('location:home.php');
    }
    elseif($row['user_type'] == 'dermatologist'){
        $_SESSION['username'] = $fname;
        header('location:derm_page.html');
    }
    elseif($row['user_type'] == 'admin'){
        $_SESSION['username'] = $fname;
        header('location:admin.html');
    }
    else{
        echo "wrong credentials";
    }
}
 

?>