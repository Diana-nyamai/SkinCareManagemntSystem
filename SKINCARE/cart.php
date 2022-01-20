<!-- shows products that have been added to the cart -->
<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=0">
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">
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
             /* font-size: 20px; */
        }
        header{
          /* position: fixed; */
          top: 0;
          left: 0;
          width: 100%;
          display: flex;
          justify-content: space-between;
          align-items: center;
          transition: 0.6s;
          padding: 40px 60px;
          z-index: 1000;
      }
      header.sticky{
          padding: 5px 100px;
          background: #f09053;
      }
      header h1 a{
        color: #fff;
        text-decoration: none;
        font-size: 30px;
        letter-spacing: 2px;
        font-family: 'Monoton', cursive;
        opacity: .8;
      }
      header ul {
          position: relative;
          display: flex;
          justify-content: center;
          align-items: center;
      }
      header ul li{
          position: relative;
          list-style-type: none;
      }
      header ul li a{
          text-decoration: none;
          margin: 0 10px;
          color: #fff;
          opacity: .7;
      }
      header.sticky .logo,
      header.sticky ul li a{
          color: #000;

      } 
     .main-body{
         position: relative;
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
        .number{
            padding:10px;
            border: none;
            background: #f09053;
            text-align: center;
            outline:none;
        }
        .remove{
            padding:15px;
            border: none;
           
            background: #f09053;
            text-align: center;
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
            <li><a href="./skintypepages/dry.php">DRY </a></li>
            <li><a href="./skintypepages/normal.php">NORMAL</a></li>
            <li><a href="./skintypepages/combination.php">COMBINATION</a></li>
            <li><a href="./skintypepages/sensitive.php">SENSITIVE</a></li>
            <li><a href="./skintypepages/oily.php">OILY</a></li>
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
    <h2>Product Cart</h2>
    
    <table id="customers">
  <tr>
    <th>Id</th>
    <th>Product Name</th>
    <th>Product Price</th>
    <th>quantity</th>
    <th></th>
    <th>Total</th>
  </tr>
  <?php
         $total=0;
         if(isset($_SESSION['cart'])){
             foreach($_SESSION['cart'] as $key => $value){
                 $prid = $key + 1;
                 $total = $total + $value['price'];
                 echo"
                 <tr>
                   <td>$prid</td>
                   <td>$value[item_name]</td>
                   <td>$value[price]</td>
                   <td><input class='number' type='number' value='$value[quantity]' min='1' max='10'/></td>
                   <td><form action='cart_manager.php' method='post'>
                   <button class='remove' name='remove'>Remove</button>
                   <input type='hidden' name='item_name' value='$value[item_name]'/>
                   </form></td>
                 </tr>
                 ";
             }
         }
      ?>
   
  <tr id="total">
    <td id="total"></td>
    <td id="total"></td>
    <td id="total"></td>
    <td id="total"></td>
    <td id="total"></td>
    <td id="total">ksh. <?php echo $total  ?></td>
  </tr> 
</table>
<form>
    <div class="main">
        <div><input type="radio" name="cod" value="cod"> <span>cash on delivery</span> </div>
        <div class="checkout">
        <input type="submit" value="Proceed to checkout">
        </div>
</div>
</form>
</div>
</body>
</html>