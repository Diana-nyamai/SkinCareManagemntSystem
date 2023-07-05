<?php
require './config.php';
$user_id = $_POST['id'];
$item = $_POST['item'];
$quantity = $_POST['qty'];
$tamount = $_POST['total'];
$payment = $_POST['payment'];
$shop_name = $_POST['shop_name'];
$product_id = $_POST['product_id'];

// connecting to the database
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

if(mysqli_connect_error()){
    die('connection failed: (' .mysqli_connect_error(). ')' .mysqli_connect_error());
}
else{
    $stmt = $conn->prepare('insert into tbl_orders(user_id, product_name,quantity, tamount, payment,shop_name,product_id )
    values(?,?,?,?,?,?,?)');
    $stmt->bind_param('isiissi', $user_id, $item, $quantity, $tamount, $payment, $shop_name, $product_id);
    $stmt->execute();
    echo "
    <script>
    alert('order is successful!');
    window.location.href = 'makeOrder.php';
    </script>
    ";
    $stmt->close();
    $conn->close();

}
?>