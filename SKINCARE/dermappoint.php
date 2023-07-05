<!-- this is the php to support bookappointment page on homepage -->
<?php
require './config.php';
  $did = $_POST['id'];
  $davailable = $_POST['davailable'];
  $tavailable =$_POST['tavailable'];
 
//   database connection
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
if(mysqli_connect_error()){
    die('connection failed(' .mysqli_connect_error(). ')' . mysqli_Connect_error());
}
else{
    $stmt = $conn->prepare('insert into tbl_doctoravailable(userid, davailable,tavailable)
    values(?,?,?)');
    $stmt->bind_param('iss', $did,$davailable,$tavailable );
    $stmt->execute();
    echo '<script>alert("availability posted")
    window.location.href = "dermmake_appoint.php";
    </script>';
    $stmt->close();
    $conn->close();
}
?>