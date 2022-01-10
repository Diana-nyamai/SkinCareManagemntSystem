<?php
session_start(); 
 $fname = $_POST['fname'];
 $lname = $_POST['lname'];
 $password = $_POST['password'];

//  database connection
$conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
$s = "select * from tbl_users where first_name ='$fname'&& password = '$password'";
$result = mysqli_query($conn, $s);
$num = mysqli_num_rows($result);

if($num == 1){
    $_SESSION['username'] = $fname;
    header('location:home.php');
}
else{
    echo 'wrong credentials';
}
?>