<!-- book appointment page page -->
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
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
    <title>book appointment</title>
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
        .form-container{
            margin: 30px;
        }
        .form-container input{
       margin-top: 10px;
       width: 100%;
       padding: 10px 10px;
       outline: none;

       }
      .btn{
       padding: 5px 10px;
       background-image: linear-gradient(45deg,#1e1f31, #f09053);
       color: #fff;
       border-radius: 10px;
       text-decoration: none;
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
        .submitbtn{
            background: #1e1f31;
            color: white;
            padding: 10px 20px;
            outline: none;
            border: none;
            cursor: pointer;
        }
       
 </style>
    </head>
     <body>
       <header>
        <h1><a href="../home.php" class="logo">HEAVENLY skin</a></h1>
        <ul>
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
            <a href="./cart.php">CART (<?php echo $count ; ?>)</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
            
        </ul>
    </header>
    <div class="main-body">
    <h2>Book appointment</h2>
    
    <table id="customers">
  <tr>
    <th>Doctor Name</th>
    <th>Date Availabe</th>
    <th>Time Available</th>
    <th>Book appointment</th>
  </tr>
  <?php $id = $_SESSION['userid']?>
             <?php
          $sm = mysqli_query($conn, "SELECT tbl_users.first_name, tbl_doctoravailable.davailable, tbl_doctoravailable.tavailable FROM tbl_doctoravailable INNER JOIN tbl_users ON tbl_doctoravailable.user_id = tbl_users.user_id");
          while($row = mysqli_fetch_array($sm)){
                ?>
                 <tr>
                 <form action='order.php' method='post'>
                 <input type="hidden" id="id" name="id" value="<?php echo $id ?>"/>
                   
                <td>Dr. <?php echo $row["first_name"];?></td>
                <td><?php echo $row["davailable"]; ?></td>
                <td><?php echo $row["tavailable"]; ?></td>
                
                <td><input type='submit' value='Book appointment' class='submitbtn'></td>
                 </form>
                 </tr>

                 <?php
             }
      ?>
   
 
</table>
</form>  
              </div>

</body>
</html>