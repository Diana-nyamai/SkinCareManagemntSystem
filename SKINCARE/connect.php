<?php
 $fname = $_POST['fname'];
 $lname = $_POST['lname'];
 $phone = $_POST['phone'];
 $email = $_POST['email'];
 $gender = $_POST['gender'];
 $user = $_POST['user'];
 $password = $_POST['password'];

//  database connection
$conn = new mysqli('localhost', 'root', '', 'skincare');
if(mysqli_connect_error()){
    die('connection failed(' .mysqli_connect_error().')' . mysqli_connect_error());
}
else{
    $stmt = $conn->prepare('insert into tbl_users(user_first_name, user_last_name, user_phone_no, user_email,user_gender, user_role, user_password) 
    values(?,?,?,?,?,?,?)');
    $stmt->bind_param('ssissss', $fname, $lname,$phone,$email, $gender, $user, $password);
    $stmt->execute();
    echo 'registration sucessful...';
    $stmt->close();
    $conn->close();
}
?>