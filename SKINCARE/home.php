<!-- this page will display the homepage where all the products will be available skin test is available   -->
<?php
  session_start();
  $conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
  if(!isset($_SESSION["username"])){
      header("location: authentication.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=0">
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
    <title>Home | page</title>
    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">
<style>
      *{
          margin: 0;
          padding: 0;
          box-sizing: border-box;
      }
      body{
          overflow-x:hidden ;
          height: 100vh;
      }
      header{
          position: fixed;
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
      /* end of navbar */
      .banner{
           position: relative;
           width: 100%;
           height: 100vh;
           background-image:url('./images/skincare.jpg');
           background-size: cover;
           border-bottom: 5px solid #f09053;
      }
      .overlay{
          position: absolute;
          height: 100%;
          width: 100%;
          background: rgba(0,0,0,0.5);
      }
      .banner-content{
          height: 100vh;
          display: flex;
          justify-content: center;
          align-items: center;
      }
      .text{
          text-align: center;
      }
      .text h1{
          font-size: 50px;
          color: #fff;
          margin-bottom: 40px;
      }
      .text p a{
          font-size: 20px;
          text-decoration: none;
          color: #fff;
          padding: 20px;
          border:1px solid #fff;
      }
      .username{
          text-transform:uppercase;
      }
      /* know abbout skin section */
    .title h1{
        text-align: center;
        margin: 100px 0;
    }

    /* product section */
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
  }
  @media all and (max-width: 750px){
      .g-content{
          width: 100%;
      }
  }
    </style>
</head>
<body>
    <header>
        <h1><a href="home.php" class="logo">HEAVENLY skin</a></h1>
        <ul>
            <li><a href="home.php">HOME</a></li>
            <li><a href="dry.php">DRY </a></li>
            <li><a href="normal.php">NORMAL</a></li>
            <li><a href="sensitive.php">SENSITIVE</a></li>
            <li><a href="oily.php">OILY</a></li>
            <li><a href="combination.php">COMBINATION</a></li>
            <li><a href="traditional.php">TRADITIONAL</a></li>
            <li><a href="bookappointment.php">APPOINTMENT</a></li>
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
            <li><a href="logout.php">LOGOUT</a></li>
            
        </ul>
    </header>
<!-- THE BACKGROUND IMAGE -->
    <section class="banner"><div class="overlay">
        <div class="banner-content">
            <div class="text">
                <div class="text-inner">
                    <h1>WELCOME <span class="username"><?php
                        echo $_SESSION['username']; ?></span> </h1>
            <P><a href="./skinTest.html">Take skin test</a></P>
                </div>
            </div>
            
        </div>
    </div></section>

    
    <!--know more about your skin section  -->
   <div class="know-skin-container">
      <div class="title"><h1>OUR PRODUCTS</h1></div>
      <div class="skin-box">
           
      </div>
   </div>
 
   <!-- products section -->
   <div class="gallery">
      
   <?php 
   $res = mysqli_query($conn, "select * from tbl_product order by id");
   while($row = mysqli_fetch_array($res)){
       ?>
  
       <div class="g-content"> 
           <form action="./cart_manager.php?action=add&id=<?php echo $row["id"];?>" method="post">
           <img src="<?php echo $row["pimage"]; ?>" alt="" >
           <h3><?php echo $row["pname"];?></h3>
           <p><?php echo $row["pdescription"]; ?></p>
           <h6>ksh.<?php echo number_format($row["price"],2); ?></h6>
           <h6><?php echo $row["skin_type"] ?> skin</h6>
           <input style="text-align: center" type="text" value="1" name="qty"/>
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

   <!-- javascript section -->
    <script>
        window.addEventListener("scroll", function(){
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        });
    </script>
</body>
</html>