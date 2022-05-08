<!-- shows products that have been added to the cart -->
<?php
 session_start();
 $conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=0">
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>order page</title>
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
             /* font-size: 20px; */
        }
        header{
          /* position: fixed; */
          top: 0;
          left: 0;
          height: 80px;
          width: 100%;
          display: flex;
          justify-content: space-between;
          align-items: center;
          transition: 0.6s;
          padding: 5px 30px;
          z-index: 1000;
        }
        header.sticky{
            padding: 5px 100px;
            background: #f09053;
        }
        header h1 a{
            color: #fff;
            text-decoration: none;
            font-size: 25px;
            letter-spacing: 2px;
            font-family: 'Monoton', cursive;
            opacity: .8;
        }
        header ul {
            position: relative;
            display: flex;
        }
        header ul li{
           padding: 10px;
           list-style-type: none;
           position: relative;
        }
        header ul li a{
            text-decoration: none;
            color: #fff;
            opacity: .7;
        }
        header ul li a:hover{
            color: #f09053;
        }
        header.sticky .logo,
        header.sticky ul li a{
            color: #000;

        }
        .dropdown-menu{
            display: none;
        }
        header ul li:hover .dropdown-menu {
            display: block;
            position: absolute;
            left: 0;
            top: 100%;
            background: #1e1f31;
        }
        header ul li:hover .dropdown-menu ul{
            display: block;
            padding: 10px;
        }
        header ul li:hover .dropdown-menu ul li{
            width: 150px;
            padding: 10px;
        }
        h2{
            text-align: center;
            padding: 30px 0;
            font-size: 30px;
            color:#fff;
            border-bottom: 1px solid #fff;
        }
        #customers {
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border-bottom: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        #t{
            border: 1px solid green;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;

        }
        .input{
            padding:10px;
            border: none;
            background: transparent;
            text-align: center;
            outline:none;
            color: #fff;
        }
        .submitbtn{
            background: #1e1f31;
            color: white;
            padding: 10px 20px;
            outline: none;
            border: none;
            cursor: pointer;
        }
        .main{
            border:1px solid black;
            width: 50% ;
            margin: 50px auto;
            display:flex;
            flex-direction: column;
            justify-content:center;
            align-items: center;
            height:300px;
        }
        .checkout{
            width:70%;
            margin: 30px auto;
        }
        .checkout input{
            padding: 20px;
            width:100%;
            border:none;
            outline: none;
            background-image: linear-gradient(45deg,#1e1f31, #f09053);
            color: #fff;
            font-size:20px;
        }
    </style>
</head>
<body>
<header>
        <h1><a href="home.php" class="logo">HEAVENLY skin</a></h1>
        <ul>
            <li><a href="home.php">HOME</a></li>
            <li><a href="#">SKIN TYPES <i class="fa fa-caret-down"></i></a>
               <div class="dropdown-menu">
                   <ul>
                        <li><a href="dry.php">DRY </a></li>
                        <li><a href="normal.php">NORMAL</a></li>
                        <li><a href="sensitive.php">SENSITIVE</a></li>
                        <li><a href="oily.php">OILY</a></li>
                        <li><a href="combination.php">COMBINATION</a></li>
                        <li><a href="traditional.php">TRADITIONAL</a></li> 
                   </ul>
               </div>
            </li>
            <li><a href="./bookappointment.php">APPOINTMENT</a></li>
            <li>
             <?php 
               if(isset($_SESSION['cart'])){
                   $count = count($_SESSION['cart']);
               }
               else{
                $count = 0;
            }
             ?>
            <a href="./cart.php">CART (<?php echo $count ; ?>)</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
            
        </ul>
    </header>
<div class="main-body">
    <h2>Make Order</h2>
    
    <table id="customers">
  <tr>
    <th>product name</th>
    <th>quantity</th>
    <th>total amount</th>
    <th>payment</th>
    <th>make order</th>
  </tr>
  <?php $id = $_SESSION['userid']?>
  <?php
         $total=0;
         $query = "select * from tbl_users";
         $result = mysqli_query($conn, $query);
         if(isset($_SESSION['cart'])){
             foreach($_SESSION['cart'] as $key => $value){
                 $prid = $key + 1;
                 $total = $total + $value['price'];
                ?>
                 <tr>
                 <form action='order.php' method='post'>
                 <input type="hidden" id="id" name="id" value="<?php echo $id ?>"/>
                 <input type='hidden' name='product_id' value='<?php echo $value["product_id"]; ?>'/>
                 <input type='hidden' name='shop_name' value='<?php echo $value["shop_name"];?>'/>
                   
                <td><input type='text' value='<?php echo $value["item_name"]; ?>' name='item' class='input'/> </td>
                <td><input type='text' value='<?php echo $value["quantity"];?>' name='qty' class='input'/></td>
                <td><input type='text' value='<?php echo $value["price"] * $value["quantity"] ?>' name='total' class='input'/></td>
                <td> <input type='text' value='cash on delivery' name='payment' class='input'/></td>
                <td><input type='submit' value='order' class='submitbtn'></td>
                 </form>
                 </tr>

                 <?php
             }
         }
      ?>
   
 
</table>
</form>
</div>
</body>
</html>