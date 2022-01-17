<?php
 $fname = $_POST['fname'];
 $lname = $_POST['lname'];
 $phone = $_POST['phone'];
 $email = $_POST['email'];
 $gender = $_POST['gender'];
 $user = $_POST['user'];
 $password = $_POST['password'];

//  database connection
$conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
if(mysqli_connect_error()){
    die('connection failed(' .mysqli_connect_error().')' . mysqli_connect_error());
}
else{
    $stmt = $conn->prepare('insert into tbl_users(first_name, last_name, phone_number, email,gender, user_type, password) 
    values(?,?,?,?,?,?,?)');
    $stmt->bind_param('ssissss', $fname, $lname,$phone,$email, $gender, $user, $password);
    $stmt->execute();
    echo header('location:authentication.php');
    $stmt->close();
    $conn->close();
}
?>