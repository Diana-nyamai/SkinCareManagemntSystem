<!-- dry skin page -->
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
    <title>normal skin</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
             overflow-x: hidden;
             height: 100vh;
             background:#1e1f31;
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
        /* skin type management */
        .sm-container{
            display:grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            color: #fff;
            font-size: 20px;
            margin: 50px 10px;
        }
        .sm-image img{
            width:100%;
            display: block;
        }
        .sm-description p{
            float: left;
            padding:0 20px;
        }
        .sm-skintype p{
            text-align: center;
        }
        .sm-management p{
            padding: 0 20px;
        }

    /* products sections */
            .gallery{
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            justify-content: center;
            align-items: center;
            gap: 1em;
            /* margin: 50px 0; */
        }
        .g-content{
            width: 20%;
            margin: 15px;
            box-sizing: border-box;
            float: left;
            text-align: center;
            border-radius: 20px;
            padding-top: 10px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
            transition: .4s;
            background: #f2f2f2;
        }
        .g-content:hover{
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
            transform: translate(2px, 8px);
        }
        .g-content img{
        width: 200;
        height: 200px;
        text-align: center;
        margin: 0 auto;
        display: block;
        border-radius: 20px;
        }
        .g-content h3{
            text-align: center;
            font-size: 20px;
            margin: 0;
            padding-top: 10px;
        }
        .g-content p{
            text-align: center;
            padding: 0 8px;
        }
        .g-content h6{
            font-size: 16px;
            text-align: center;
            margin: 0;
        }
        .addtocart{
            text-align: center;
            font-size: 24px;
            color: #000;
            width: 100%;
            padding: 15px;
            border: 0;
            outline: none;
            cursor: pointer;
            margin-top: 5px;
            border-bottom-right-radius: 20px;
            border-bottom-left-radius: 20px;
            background: #f09053;
        }
        @media all and (max-width: 1350px){
            .g-content{
                width: 45%;
            }
            .sm-container{
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media all and (max-width: 750px){
            .g-content{
                width: 100%;
            }
            .sm-container{
                grid-template-columns: repeat(1, 1fr);
            }
            }
    </style>
</head>

<body>
<header>
        <h1><a href="./home.php" class="logo">HEAVENLY skin</a></h1>
        <ul>
            <li><a href="./home.php">HOME</a></li>
            <li><a href="dry.php">DRY </a></li>
            <li><a href="normal.php">NORMAL</a></li>
            <li><a href="sensitive.php">SENSITIVE</a></li>
            <li><a href="oily.php">OILY</a></li>
            <li><a href="combination.php">COMBINATION</a></li>
            <li><a href="traditional.php">TRADITIONAL</a></li>
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
            <a href="./cart.php">CART (<?php echo $count; ?>)</a></li>
            <li><a href="./logout.php">LOGOUT</a></li>
            
        </ul>
</header>

    <div class="main-body">
        <h2>normal skin page</h2>
     
        <!--SKIN TYPE MANAGEMENT  -->
        <?php 
         $sm = mysqli_query($conn, "select * from skin_type_management where product_type='normal'");
         while($row = mysqli_fetch_array($sm)){
             ?>

            <div class="sm-container"> 
           <div class="sm-image"><img src="<?php echo $row["image"]; ?>" alt=""></div>
           <div class="sm-skintype"><p>You have a <?php echo $row['product_type']; ?> skin</p></div>
           <div class="sm-description"><p><?php echo $row['descriptions']; ?></p></div>
           <div class="sm-management"><p><?php echo $row['skin_management']; ?></p></div>
       </div>
        <?php
         }
        ?> 
        
        <div style="text-align: center; color: #fff; padding: 30px 0;">
        <h1>NORMAL SKIN PRODUCTS</h1>
    </div>
        <!-- PRODUCTS SECTION -->
        <div class="gallery">
      <?php 
      $res = mysqli_query($conn, "select * from tbl_product where skin_type='dry'");
      while($row = mysqli_fetch_array($res)){
          ?>
     
          <div class="g-content"> 
              <form action="./normal_cart_manager.php?action=add&id=<?php echo $row["id"];?>" method="post">
              <img src="<?php echo $row["pimage"]; ?>" alt="dry" >
              <h3><?php echo $row["pname"]; ?></h3>
              <p><?php echo $row["pdescription"]; ?></p>
              <h6>ksh.<?php echo $row["price"]; ?></h6>
              <h6><?php echo $row["skin_type"]; ?> skin</h6>
              <input type="submit" name="addtocart" class="addtocart" value="Add to cart"/>
              <input type="hidden" name="product_id" value="<?php echo $row["id"];?>"/>
                <input type="hidden" name="shop_name" value="<?php echo $row["sname"];?>"/>
                <input type="hidden" name="product_image" value="<?php echo $row["pimage"];?>"/>
              <input type="hidden" name="item_name" value="<?php echo $row["pname"];?>"/>
              <input type="hidden" name="price" value="<?php echo $row["price"]; ?>"/>
          </form>
       </div>
          <?php
      }
      ?>
      </div>
    </div>


  <!-- javascript section -->
    <script>
        window.addEventListener("scroll", function(){
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        });
    </script>
</body>
</html>