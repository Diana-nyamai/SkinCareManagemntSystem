<?php
$fname = $_POST['fname'];
$email = $_POST['email'];
$item = $_POST['item'];
$tamount = $_POST['total'];
$payment = $_POST['payment'];
$shop_name = $_POST['shop_name'];
$product_id = $_POST['product_id'];

// connecting to the database
$conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
if(mysqli_connect_error()){
    die('connection failed: (' .mysqli_connect_error(). ')' .mysqli_connect_error());
}
else{
    $stmt = $conn->prepare('insert into tbl_orders(first_name, email, product_name, tamount, payment,shop_name,product_id )
    values(?,?,?,?,?,?,?)');
    $stmt->bind_param('sssissi', $fname, $email, $item, $tamount, $payment, $shop_name, $product_id);
    $stmt->execute();
    echo "
    <script>
    alert('order is successful!');
    window.location.href = 'makeOrder.php';
    </script>
    ";
    $to = "dnyamai.dn@gmail.com";
    $subject = "order received";
    $message = "<p>this is a test</p>";

    $headers = "From:abc@somedomain.com \r\n";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    mail($to, $subject, $message, $headers);
    $stmt->close();
    $conn->close();

}
?>