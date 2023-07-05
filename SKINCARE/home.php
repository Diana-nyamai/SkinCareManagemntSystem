<!-- this page will display the homepage where all the products will be available skin test is available   -->
<!-- opening tag for php -->
<?php
require './config.php';
  session_start();
  $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
  if(!isset($_SESSION["username"])){
    //   sends raw http header to browser
      header("location: authentication.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- specifies the character encoding of the document  -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=0">
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
    <title>Home | page</title>
    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        /* transparency */
        opacity: .8;
      }
      header ul {
          position: relative;
          display: flex;
      }
      header ul li{
          position: relative;
          /* specifies list type marker */
          list-style-type: none;
          padding: 10px;
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
      header.sticky ul li:hover .dropdown-menu{
          background: #f09053;
      }
      .dropdown-menu{
            display: none;
        }
        header ul li:hover .dropdown-menu {
            display: block;
            /* positioned relative to the nearest parent/ancestor */
            position: absolute;
            left: 0;
            top: 100%;
            background: rgba(0,0,0,0.5)
        }
        header ul li:hover .dropdown-menu ul{
            display: block;
            padding: 10px;
        }
        header ul li:hover .dropdown-menu ul li{
            width: 150px;
            padding: 10px;
        }
        
      /* end of navbar */
      .banner{
           /* position: relative; */
           width: 100%;
           height: 100vh;
           /* sets background image for an element. url to image */
           background-image:url('./images/skincare.jpg');
           background-size: cover;
           border-bottom: 5px solid #f09053;
      }
      .overlay{
          position: absolute;
          height: 100%;
          width: 100%;
          /* css function specifies the coor */
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
        /* specifies the radius on an element's corner */
        border-radius: 20px;
        padding-top: 10px;
         /* v-offset h-offset, blur, color */
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25);
        transition: .4s;
        background: #f2f2f2;
    }
    .g-content:hover{
         /* attaches a shadow v-offset(LR) h-offset (TB), blur, color */
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
        transform: translate(2px, 8px);
    }
    .g-content img{
      width: 200px;
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
  /* specifies styling for specific device width */
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
        <h1><a href="./home.php" class="logo">HEAVENLY skin</a></h1>
        <ul>
            <!-- creates a hyperlink that links one page to another -->
            <li><a href="./home.php">HOME</a></li>
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
            <a href="./cart.php">CART (<?php echo $count; ?>)</a></li>
            <li><a href="./logout.php">LOGOUT <i class="fa fa-sign-out"></i></a></li>
            
        </ul>
</header>
<!-- THE BACKGROUND IMAGE -->
    <section class="banner"><div class="overlay">
        <div class="banner-content">
            <div class="text">
                <div class="text-inner">
                    <h1>WELCOME <span class="username"><?php
                        echo $_SESSION['username'];?></span></h1>
            <P><a href="./skinTest.php">Take skin test</a></P>
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
//    fetches data from a result to an array. either associative or numeric array
   while($row = mysqli_fetch_array($res)){
       ?>
  
       <div class="g-content"> 
           <form action="./cart_manager.php" method="post">
           <img src="<?php echo $row["pimage"]; ?>" alt="product" >
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
        // addeventlistener method attaches an event handler to a document
        window.addEventListener("scroll", function(){
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        });
    </script>
</body>
</html>