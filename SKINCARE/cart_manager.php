<?php
session_start();
$conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
if(isset($_POST["addtocart"])){
    // if($_SESSION[""])
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=0">
    <title>view cart</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
             overflow-x: hidden;
             height: 100vh;
             background-image: linear-gradient(180deg,#1e1f31, #f09053);
             color: #fff;
        }
        h2{
            text-align: center;
            padding: 30px 0;
            font-size: 30px;
            border-bottom: 1px solid #fff;
        }
    </style>
</head>
<body>
    <h2>Order Details</h2>
</body>
</html>