<?php
session_start();

 $fname = $_POST['fname'];
 $lname = $_POST['lname'];
 $phone = $_POST['phone'];
 $email = $_POST['email'];
 $gender = $_POST['gender'];
 $user = $_POST['user'];
 $password = $_POST['password'];
 $password_hash = password_hash($password, PASSWORD_DEFAULT);

//  prevents xss attack
// htmlspecialchars converts predefined characters eg <,>,&, to html entities
 $fname = htmlspecialchars($fname);
 $lname = htmlspecialchars($lname);

//  database connection
$conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
if(mysqli_connect_error()){
    // same as exit.terminates the process
    die('connection failed(' .mysqli_connect_error().')' . mysqli_connect_error());
}
else{
    $stmt = $conn->prepare('insert into tbl_users(first_name, last_name, phone_number, email,gender, user_type, password) 
    values(?,?,?,?,?,?,?)');
    $stmt->bind_param('ssissss', $fname, $lname,$phone,$email, $gender, $user, $password_hash);
    $stmt->execute();

    // returns domain name
    echo "
        <script>
        alert('you have are now registered. Please login');
        window.location.href = 'authentication.php'; </script>   
    ";
    
    $stmt->close();
    $conn->close();
}
?>