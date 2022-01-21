<?php
$date =$_POST['date'];
$tamount = $_POST['tamount'];
$payment = $_POST['payment'];

// connecting to the database
$conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
if(mysqli_connect_error()){
    die('connection failed: (' .mysqli_connect_error(). ')' .mysqli_connect_error());
}
else{
    $stmt = $conn->prepare('insert into tbl_orders(Order_date, tamount, payment)
    values(?,?,?)');
    $stmt->bind_param('sis', $date, $tamount, $payment);
    $stmt->execute();
    echo "
    <script>
    alert('order is completed');
    window.location.href = 'order.html';
    </script>
    ";
    $stmt->close();
    $conn->close();

}
?>