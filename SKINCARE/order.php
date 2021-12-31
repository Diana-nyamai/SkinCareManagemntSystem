<?php
$date =$_POST['date'];
$tamount = $_POST['tamount'];
$damount = $_POST['damount'];
$tad = $_POST['tad'];
$quantity = $_POST['quantity'];
$payment = $_POST['payment'];

// connecting to the database
$conn = new mysqli('localhost', 'root', '', 'skincare');
if(mysqli_connect_error()){
    die('connection failed: (' .mysqli_connect_error(). ')' .mysqli_connect_error());
}
else{
    $stmt = $conn->prepare('insert into tbl_orders(date, tamount, damount, tad, quantity, payment)
    values(?,?,?,?,?,?)');
    $stmt->bind_param('siiiis', $date, $tamount, $damount, $tad, $quantity, $payment);
    $stmt->execute();
    echo 'order is completed';
    $stmt->close();
    $conn->close();

}
?>