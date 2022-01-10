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
    </style>
</head>
<body>
    <header>
        <h1><a href="#" class="logo">HEAVENLY skin</a></h1>
        <ul>
            <li><a href="#">HOME</a></li>
            <li><a href="#">DRY </a></li>
            <li><a href="#">NORMAL</a></li>
            <li><a href="#">COMBINATION</a></li>
            <li><a href="#">SENSITIVE</a></li>
            <li><a href="#">OILY</a></li>
            <li><a href="#">CART</a></li>
            <li><a href="authentication.html">LOGOUT</a></li>
            
        </ul>
    </header>
<!-- THE BACKGROUND IMAGE -->
    <section class="banner"><div class="overlay">
        <div class="banner-content">
            <div class="text">
                <div class="text-inner">
                    <h1>WELCOME <?php
                        echo $_SESSION['username']; ?></h1>
            <P><a href="#">Take skin test</a></P>
                </div>
            </div>
            
        </div>
    </div></section>
    
    <div style="text-align: center;">
        <h2 style="padding: 100px; text-align: center;"><h2>PRODUCTS</h2></h2>
    </div>

    <script>
        window.addEventListener("scroll", function(){
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        });
    </script>
</body>
</html>