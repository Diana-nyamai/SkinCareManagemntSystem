<?php
$fname = $_POST['fname'];
$email = $_POST['email'];
$item = $_POST['item'];
$tamount = $_POST['total'];
$payment = $_POST['payment'];

// connecting to the database
$conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
if(mysqli_connect_error()){
    die('connection failed: (' .mysqli_connect_error(). ')' .mysqli_connect_error());
}
else{
    $stmt = $conn->prepare('insert into tbl_orders(first_name, email, product_name, tamount, payment)
    values(?,?,?,?,?)');
    $stmt->bind_param('sssis', $fname, $email, $item, $tamount, $payment);
    $stmt->execute();
    echo "
    <script>
    alert('order is completed');
    window.location.href = 'home.php';
    </script>
    ";
    $stmt->close();
    $conn->close();

}
?>