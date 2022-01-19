<!-- this is the php to support appointment page on homepage -->
<?php
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $date = $_POST['date'];
  $time = $_POST['time'];
 
//   database connection
$conn = new mysqli('localhost', 'root', '', 'skincare');
if(mysqli_connect_error()){
    die('connection failed(' .mysqli_connect_error(). ')' . mysqli_Connect_error());
}
else{
    $stmt = $conn->prepare('insert into tbl_appointment(first_name, last_name, phone_no, email, date, time)
    values(?,?,?,?,?,?)');
    $stmt->bind_param('ssisss', $fname, $lname,$phone, $email, $date,$time );
    $stmt->execute();
    echo 'appointment booked...';
    $stmt->close();
    $conn->close();
}
?>