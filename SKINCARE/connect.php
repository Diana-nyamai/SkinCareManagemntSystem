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
<<<<<<< HEAD
    $stmt = $conn->prepare('insert into tbl_users(user_first_name, user_last_name, user_phone_no, user_email,user_gender, user_role, user_password) 
=======
    $stmt = $conn->prepare('insert into tbl_users(user_first
    _name, user_last_name, user_phone_no, user_email, user_role, user_password, user_gender) 
>>>>>>> 4731ae6a817de11fec2d78fa70829a245c5d2777
    values(?,?,?,?,?,?,?)');
    $stmt->bind_param('ssissss', $fname, $lname,$phone,$email, $gender, $user, $password);
    $stmt->execute();
    echo 'registration sucessful...';
    $stmt->close();
    $conn->close();
}
?>