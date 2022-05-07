<!-- this is the php to support bookappointment page on homepage -->
<?php
  $id = $_POST['id'];
  $date = $_POST['date'];
  $time = $_POST['time'];
 
//   database connection
$conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
if(mysqli_connect_error()){
    die('connection failed(' .mysqli_connect_error(). ')' . mysqli_Connect_error());
}
else{
    $stmt = $conn->prepare('insert into tbl_appointment(user_id, appointment_date,  appointment_time)
    values(?,?,?)');
    $stmt->bind_param('iss', $id, $date,$time );
    $stmt->execute();
    echo '<script>alert("appointment booked")
    window.location.href = "bookappointment.php";
    </script>';
    $stmt->close();
    $conn->close();
}
?>