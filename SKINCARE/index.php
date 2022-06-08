<!-- <!DOCTYPE html> is a declaration that informs a browser the type of document to expect which is html5 -->
<!DOCTYPE html>
<!-- attribute lang shows the language that will be used in the web application
html is used to structure a webpage and its content -->
<!-- head is the container for metadata -->
<html lang="en">
<head>
    <!-- meta tag defines metadata(information about other data) about an html doc.used by browsers
  charset specifies the character encoding of the doc  -->
    <meta charset="UTF-8">
    <!--  http-equiv used by servers to gather info about that page.
     content specifies the value associated with http-equiv-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- name specifies the name for the metadata 
    -viewport is users visible area of the webpage
    - this tag gives the browser instructions on how to control the page dimensions
    - width=device-width follows the screen width depending on the device
    - initial-scale controls the intial zoom level. user-scalable disables zoom in and out in mobile view
    -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=0">
    <!-- link specifies relationship between current doc and external resource -->
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
    <!-- title specifies the titltle of the document -->
    <title>Heavenly Skin | landing</title>
    <!-- href specifies the location of the linked document. 
    - rel specifies the rship between the current doc and the linked one -->
    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">
    <!-- style used to define the style information(css) for a document -->
    <style>
        /* an * is a universal selector and all the elements in the document will be affected by th styling inside it */
        *{
            /* margin is the space around an elements border */
            margin: 0;
            /* padding is the space around an elements content*/
            padding: 0;
            /* sets how the total width and height of an element is calculated*/
            box-sizing: border-box;
        }
        html{
            scroll-behavior: smooth;
        }
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: #1e1f31;
            /* sets what shows when content overflows the elements left and right angles*/
            overflow-x: hidden;
        }
        .main{
            /* element is positioned relative to its normal position */
            position: relative;
            height: 100%;
            overflow: hidden;
        }
        header{
            padding: 50px 100px;
            /* property of flex container to use flexbox. activavting flexbox */
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
        /* hover is a pseudo class which defines a special state of an element*/
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
            /* allows an element to change smoothly over a given time */
            transition: all ease-out 0.5s;
        }
        header ul li a:hover{
            color: #f09053;
        }
        /* pixels are relative to vieing device */
        header ul li a.btn{
            display: inline-block;
            width: 180px;
            height: 40px;
            /* line height specifies the height of a line */
            line-height: 40px;
            background-color: #f09053;
            color: #fff;
            text-align: center;
            font-size: 15px;
            /* specifies the radius on an element's corner */
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
            /* absolute is positioned relative to the nearest positoned ancestor */
            position:  absolute;
            top: 50%;
            left: 50%;
            /* it centers the element at the center of its parent */
            transform: translate(-50%,-50%);
        }
        .skin-type{
            height: 100%;
            /* allows an element to change from one style to another */
            animation: rotation 60s linear infinite;
        }
        /* holds what styles the element will have at certain times */
        @keyframes rotation {
            100%{
                /* transform lets you rotate, translate etc an element */
                transform: rotate(360deg);
            }
        }
        .skin-type img{
            position: absolute;
        }
        /* :nth-child() selector mactches every element that is the nth child of its parent */
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
        /* used to apply different styles to different screen widths or devices */
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

        /* products section */
        .gallery{
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            justify-content: center;
            align-items: center;
            gap: 1em;
        }
        .g-content{
            width: 20%;
            margin: 15px;
            box-sizing: border-box;
            /* used to position content */
            float: left;
            text-align: center;
            border-radius: 20px;
            padding-top: 10px;
            /* adds shadow to an element */
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
            transition: .4s;
            background: #f2f2f2;
        }
        .g-content:hover{
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
            /* transform lets you rotate, translate etc an element 
            translate repositions elements in the horizntal and vertical directions*/
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
<!-- contains all the contents of an html doc -->
<body>
    <!-- defines division of or section in html.
    class specifies class name of an element to be used in css -->
    <div class="main">
        <!-- navigation -->
        <!-- defines the heading of an html -->
        <header>
            <!-- a creates a hyperlink to web pages, files,  -->
            <div class="logo"><a href="#">HEAVENLY skin</a> </div>
            <!-- sectiont that provides navigation links -->
            <nav>
                <!-- element that represents unordered list -->
                <ul>
                    <!-- represents an item in a list -->
                    <li><a class="btn" href="authentication.php">LOGIN</a></li>
                    <li><a class="btn" href="authentication.php">SIGN UP</a></li>
                </ul>
            </nav>
        </header>
        <!-- end of navigation -->

    <!-- content section -->
    <div class="content">
        <div class="text">
            <!-- represents a paragraph
             span inline container that marks part of a text -->
            <p>Welcome to <span> Healthy skin.</span> Healthy skin will provide food for all stresses connected with your skin. Do you have any idea about what kind of skin you have?</p>
             <a href="#products" class="btn">click to view our products</a>
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
    </div>

    <!-- our products section 
    id specifies unique id for an element-->
    <div class="header" id="products">
        <h1 style="text-align:center; padding: 100px 0; color: #fff;">OUR PRODUCTS</h1>
    </div>
    <div class="gallery">
    
    <!-- open tag for php -->
      <?php 
    //   hostname, username, password, dbname
    // opens a new connection to mysql server
      $conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
    //   performs a query against a database. selects all the data in tbl product with limit of 10 products
      $res = mysqli_query($conn, "select * from tbl_product limit 10");
    //   fetches an row as a numeric array and as an associative array(array with strings as an index)
      while($row = mysqli_fetch_array($res)){
          ?>
     
          <div class="g-content"> 
              <!-- form is element container for diff input elements -->
              <!-- action specifies where to send data when form is submitted -->
              <form action="#" method="post">
            <!-- echo output data to the screen -->
            <!-- alt is an provide alternate info incase the user cant see the image -->
              <img src="<?php echo $row["pimage"]; ?>" alt="product image">
              <!-- third level of heading -->
              <h3><?php echo $row["pname"];?></h3>
              <p><?php echo $row["pdescription"]; ?></p>
              <h6>ksh.<?php echo $row["price"]; ?></h6>
              <h6>for <?php echo $row["skin_type"] ?> skin</h6>
          </form>
       </div>
          <?php
      }
      ?>
      </div>
<!-- defines a division or section in hmtl -->
      <div class="v-products">
          <p>Would you like to see more products?</p>
          <a href="authentication.php" class="btn">Sign up</a>
      </div>
</body>
</html>