<!-- this is the php to support bookappointment page on homepage -->
<?php
  $id = $_POST['id'];
  $name = $_POST['name'];
  $date = $_POST['date'];
  $time = $_POST['time'];
 
//   database connection
$conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
if(mysqli_connect_error()){
    die('connection failed(' .mysqli_connect_error(). ')' . mysqli_Connect_error());
}
else{
    $stmt = $conn->prepare('insert into tbl_appointment(userid,doctorname, appointment_date,  appointment_time)
    values(?,?,?,?)');
    $stmt->bind_param('isss', $id,$name,$date,$time );
    $stmt->execute();
    echo '<script>confirm("are you sure you want to book the appointment?")
    window.location.href = "bookappointment.php";
    </script>';
    $stmt->close();
    $conn->close();
}
?>