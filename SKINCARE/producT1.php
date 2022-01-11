<?php
$sname = $_POST['sname'];
$sowner = $_POST['sowner'];
$sphone = $_POST['sphone'];
$semail = $_POST['semail'];
$pname = $_POST['pname'];
$ptype = $_POST['ptype'];
$pbrand = $_POST['pbrand'];
$pdescription = $_POST['pdescription'];
$pprice = $_POST['pprice'];

// database connetion
$conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
if(mysqli_connect_error()){
    die ('connection failed (' . mysqli_connect_error() . ')' . mysqli_connect_error());
}
else{
    $stmt = $conn->prepare('insert into tbl_product(sname, sowner, phone_no, email, pname, ptype,brand,pdescription,price)
    values(?,?,?,?,?,?,?,?,?)');
    $stmt->bind_param('ssisssssi', $sname, $sowner, $sphone, $semail, $pname, $ptype, $pbrand,$pdescription,$pprice);
    $stmt->execute();
    echo 'product added sucessfully...';
    $stmt->close();
    $conn->close();
}
?>