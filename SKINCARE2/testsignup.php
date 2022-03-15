<?php
 $fname = $_POST['name'];
 $uname = $_POST['username'];
 $lname = $_POST['age'];
 $fname = htmlspecialchars($fname);
//  database connection
$conn = new mysqli('localhost', 'nyamai', 'nyamai', 'skincare');
if(mysqli_connect_error()){
    die('connection failed(' .mysqli_connect_error().')' . mysqli_connect_error());
}
else{
    $stmt = $conn->prepare('insert into test(fname, user_name, age) 
    values(?,?,?)');
    $stmt->bind_param('sss', $fname, $uname, $lname);
    $stmt->execute();
    // echo header('location:authentication.php');
    echo "
        <script>alert('you have are now registered. Please login');
        window.location.href = 'testvulanarability.php'</script>
        
    ";
    
    $stmt->close();
    $conn->close();
}
?>