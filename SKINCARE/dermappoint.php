<!-- this is the php to support bookappointment page on homepage -->
<?php
  $dname = $_POST['dname'];
  $davailable = $_POST['davailable'];
  $tavailable =$_POST['tavailable'];
 
//   database connection
$conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
if(mysqli_connect_error()){
    die('connection failed(' .mysqli_connect_error(). ')' . mysqli_Connect_error());
}
else{
    $stmt = $conn->prepare('insert into tbl_doctoravailable(doctorname, davailable,tavailable)
    values(?,?,?)');
    $stmt->bind_param('sss', $dname,$davailable,$tavailable );
    $stmt->execute();
    echo '<script>alert("availability posted")
    window.location.href = "dermmake_appoint.php";
    </script>';
    $stmt->close();
    $conn->close();
}
?>