<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=0">
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
    <title>Heavenly Skin | landing</title>
    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: #1e1f31;
            overflow-x: hidden;
        }
        .main{
            position: relative;
            height: 100%;
            overflow: hidden;
        }
        header{
            padding: 50px 100px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .logo a{
            color: #fff;
            text-decoration: none;
            font-size: 30px;
            font-family: 'Monoton', cursive;
        }
        .logo a:hover{
            color:#f09053;
        }
        header ul li{
            list-style-type: none;
            display: inline-block;
            text-align: center;
            margin: 0 15px;
        }
        header ul li a{
            color: #fff;
            text-decoration: none;
            letter-spacing: 1;
            transition: all ease-out 0.5s;
        }
        header ul li a:hover{
            color: #f09053;
        }
        header ul li a.btn{
            display: inline-block;
            width: 180px;
            height: 40px;
            line-height: 40px;
            background-color: #f09053;
            color: #fff;
            text-align: center;
            font-size: 15px;
            border-radius: 50px;
            transition: all ease-out 0.5s;
            
        }
        header ul li a.btn:hover{
            color: #1e1f31;
        } /* end of header css */
        .content{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 50px 100px 0;
        }
        .text{
            width: 50%;
            padding-right: 150px;
        }
        .text p{
            font-size: 28px;
            line-height: 46px;
            color: #fff;
        }
        .text p span{
            color: #f09053;
        }
        .text a{
            position: relative;
            display: inline-block;
            font-size: 18px;
            color: #fff;
            text-decoration: none;
            padding: 18px 30px;
            font-weight: 500;
            margin-top:40px ;
            background-color: #f09053;
            border-radius: 50px;
            transition: all ease-out 1s;
        }
        .text a:hover{
            color:#1e1f31;
        }/* end of text section */
        .img{
            position: relative;
            width: 500px;
            height: 500px;
            background: radial-gradient(520px, #f09053, transparent 50%);
            margin-top: -50px;
        }
        .center-image{
            position:  absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
        .skin-type{
            height: 100%;
            animation: rotation 60s linear infinite;
        }
        @keyframes rotation {
            100%{
                transform: rotate(360deg);
            }
        }
        .skin-type img{
            position: absolute;
        }
        .skin-type img:nth-child(1){
             top: 0;
             left: 42%;
        }
        .skin-type img:nth-child(2){
            top: 25%;
            right: 0;
        }
        .skin-type img:nth-child(3){
            top: 75%;
            left: 80%;
        }
        .skin-type img:nth-child(4){
            top: 25%;
            left: 0;
        }
        .skin-type img:nth-child(5){
            top: 75%;
            left: 10%;
        }
        @media all and (max-width: 1197px){
            .content{
                justify-content: center;
            }
            .text{
                width: 100%;
                padding-right: 0;
                padding-bottom: 100px;
            }
            .img{
                margin-top: 40px;
            }
        }
        @media all and (max-width: 700px){
            .img{
                display: none;
            }
        }
        @media all and (max-width: 600px){
            header ul li a.btn:nth-child(1){
                margin-top: 20px;
            }
            header{
                justify-content: center;
            }
            .content{
                padding: 10px;
                text-align: center;
            }
        }

        /* wave styling */
        .wave{
            /* position: absolute; */
            bottom: 0;
            left: 0;
        }

        /* products section */
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

        /* get started */
        .v-products{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 30px 0;
        }
        .v-products p{
            color:#fff;
            text-align: center;
            font-size: 20px;
        }
        .v-products a{
            position: relative;
            display: inline-block;
            font-size: 18px;
            color: #fff;
            text-decoration: none;
            padding: 18px 30px;
            font-weight: 500;
            margin-top:40px ;
            background-color: #f09053;
            border-radius: 50px;
            transition: all ease-out 1s;
        }
    </style>
</head>
<body>
    <div class="main">
        <!-- navigation -->
        <header>
            <div class="logo"><a href="#">HEAVENLY skin</a> </div>
            <nav>
                <ul>
                    <li><a class="btn" href="authentication.php">LOGIN</a></li>
                    <li><a class="btn" href="authentication.php">SIGN UP</a></li>
                </ul>
            </nav>
        </header>
        <!-- end of navigation -->

    <!-- content section -->
    <div class="content">
        <div class="text">
            <p>Welcome to <span> Healthy skin.</span> Healthy skin will cater for all worries related to your skin. Do you know what type of skin you have?</p>
             <a href="authentication.php" class="btn">KNOW YOUR SKIN</a>
        </div><!-- content text on the left -->

        <div class="img">
            <div class="skin-type">
                <img src="./images/normal.png" alt="normal skin" width="60" title="normal skin" />
                <img src="./images/dry.png" alt="dry skin" width="60" title="dry skin"/>
                <img src="./images/combination.png" alt="combination skin" width="60" title="combination skin"/>
                <img src="./images/sensitive.png" alt="sensitive skin" width="60" title="sensitive skin"/>
                <img src="./images/oily.png" alt="oily skin" width="60" title="oily skin"/>
            </div> <!-- skin type images -->
            <img class="center-image" src="./images/center.png" alt="center image" width="300"/>
        </div>
    </div><!-- end of content section -->
  
    <!-- bottom wave -->
    <div class="wave">
        <img src="./images/waves.svg" alt="wave">
    </div>
    </div>

    <!-- our products section -->
    <div class="header">
        <h1 style="text-align:center; padding: 100px 0; color: #fff;">OUR PRODUCTS</h1>
    </div>
    <div class="gallery">
      
      <?php 
      $conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
      $res = mysqli_query($conn, "select * from tbl_product  limit 10");
      while($row = mysqli_fetch_array($res)){
          ?>
     
          <div class="g-content"> 
              <form action="./cart_manager.php?action=add&id=<?php echo $row["id"];?>" method="post">
              <img src="<?php echo $row["pimage"]; ?>" alt="" >
              <h3><?php echo $row["pname"];?></h3>
              <p><?php echo $row["pdescription"]; ?></p>
              <h6>ksh.<?php echo $row["price"]; ?></h6>
              <h6><?php echo $row["skin_type"] ?> skin</h6>
              <input type="submit" name="addtocart" class="addtocart" value="Add to cart"/>
              <input type="hidden" name="item_name" value="<?php echo $row["pname"];?>"/>
              <input type="hidden" name="price" value="<?php echo $row["price"]; ?>"/>
          </form>
       </div>
          <?php
      }
      ?>
      </div>

      <div class="v-products">
          <p>Would you like to see more products?</p>
          <a href="authentication.php" class="btn">Get Started</a>
      </div>
</body>
</html>