<?php
   session_start();
  $conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
//   for the cards
  $data = mysqli_query($conn, 'SELECT * FROM tbl_appointment');
//   returns number of rows
  $number = mysqli_num_rows($data);
  $users = mysqli_query($conn, 'SELECT * FROM tbl_users');
  $usernum = mysqli_num_rows($users);
  $derm = mysqli_query($conn, 'SELECT * FROM tbl_users WHERE user_type="dermatologist"');
  $dermnum = mysqli_num_rows($derm);

//   num
    $t18 = mysqli_query($conn, 'SELECT appointment_date FROM tbl_appointment WHERE YEAR(appointment_date) ="2018"');
    $t18n = mysqli_num_rows($t18);
    $t19 = mysqli_query($conn, 'SELECT appointment_date FROM tbl_appointment  WHERE YEAR(appointment_date) ="2019"');
    $t19n = mysqli_num_rows($t19);
    $t20 = mysqli_query($conn, 'SELECT appointment_date FROM tbl_appointment  WHERE YEAR(appointment_date) ="2020"');
    $t20n = mysqli_num_rows($t20);
    $t21 = mysqli_query($conn, 'SELECT appointment_date FROM tbl_appointment  WHERE YEAR(appointment_date) ="2021"');
    $t21n = mysqli_num_rows($t21);
    $t22 = mysqli_query($conn, 'SELECT appointment_date FROM tbl_appointment  WHERE YEAR(appointment_date) ="2022"');
    $t22n = mysqli_num_rows($t22);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=0">
    <title>Admin panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            overflow-x: hidden;
            background: #f7f7f7;
        }
        .container{
            position: relative;
            width: 100%;
        }
        .sidebar{
            position: fixed;
            width: 300px;
            height: 100%;
            background-image: linear-gradient(45deg,#1e1f31, #f09053);
            overflow-x: hidden;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            z-index: 2;
        }
        .sidebar ul li{
            width: 100%;
            list-style-type: none;
        }
        .sidebar ul li:not(:first-child):hover{
            background: #1e1f31;
        }
        .sidebar ul li:first-child{
            border-bottom: 1px solid #fff;
            font-family: 'Monoton', cursive;
            font-size: 30px;
        }
        .sidebar ul li a{
            width: 100%;
            text-decoration: none;
            color: #fff;
            height: 60px;
            display: flex;
            align-items: center;
        }
        .sidebar ul li a i{
            min-width: 60px;
            font-size: 24px;
            text-align: center;
        }
        .sidebar .title{
            font-size: 18px;
            padding: 0 10px;
        }

        /* main */
        .main{
            position: absolute;
            width: calc(100% - 300px);
            min-height: 100vh;
            left: 300px;
        }
        .top-bar{
            position: fixed;
            height: 60px;
            width: calc(100% - 300px);
            background: #fff;
            display: grid;
            grid-template-columns: 10fr 0.3fr;
            grid-gap: 5px;
            /* justify-content: space-between; */
            padding: 0 20px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            z-index: 1;;
        }
        .admin{
            font-size: 20px;
        }
        .user{
            position: relative;
            width: 50px;
            height: 50px;
        }
        .user img{
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            object-fit: cover;
        }
        .cards{
            margin-top: 60px;
            width: 100%;
            padding: 35px 20px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
        }
        .cards .card{
            background-image: linear-gradient(45deg,#1e1f31, #f09053);
            /* color: #ffff; */
            padding: 20px;
            display: flex;
            justify-content: space-between;
            box-shadow: rgba(0,0,0,0.24);
            border-radius: 20px;
        }
        .number{
            font-size: 35px;
            font-weight: 500;
            color: #ffff;
        }
        .card-name{
            font-weight: 600;
            color: #f09053;
        }
        .icon-box{
            font-size: 45px;
        }
        .tables{
            width: 100%;
            display: grid;
            grid-template-columns: 1fr;
            grid-gap: 20px;
            align-items: self-start;
            padding: 0 20px 20px 20px ;
        }
        .img-box-small img{
            position: relative;
            
            border-radius: 50%;
        }
        .last-appointments, 
        .doctor-visiting{
            min-height: 350px;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }
        .heading{
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #1e1f31;
        }
        .btn{
            padding: 5px 10px;
            background-image: linear-gradient(45deg,#1e1f31, #f09053);
            color: #fff;
            border-radius: 10px;
            text-decoration: none;
        }
        .options select{
            padding: 5px;
            width: 120px
        }
        .options select option{
            outline: none;
        }
        .options input{
            padding: 5px 10px;
            width: 100px;
            background-image: linear-gradient(45deg,#1e1f31, #f09053);
            color: #fff;
            border-radius: 10px;
            text-decoration: none;
            border:none;
            cursor: pointer;
            /* outline: none; */
        }
        table{
            margin-top: 10px;
            width: 100%;
            border-collapse: collapse;
        }
       
    </style> 

</head>
<body>
    <div class="container">
        <div class="sidebar">
            <ul>
                <li><a href=""><i class="fa fa-clinic medical"></i>
                <div class="title">HEAVENLY SKIN</div>
                </a></li>
                <li><a href="./admin.php"><i class="fa fa-dashboard"></i>
                    <div class="title">dashboard</div>
                </a></li>
                <li><a href="./appointments.php"><i class="fa fa-stethoscope"></i>
                        <div class="title">appointments</div>
                </a></li>
                <li><a href="./users.php"><i class="fa fa-user"></i>
                    <div class="title">users</div>
                 </a></li>
                <li><a href="./customers.php"><i class="fa fa-user"></i>
                    <div class="title">customers</div>
                </a></li>
                <li><a href="./orders.php"><i class="fa fa-money"></i>
                    <div class="title">orders</div>
                </a></li>
                <li><a href="./productadmin.php"><i class="fa fa-shopping-basket"></i>
                    <div class="title">Add Products</div>
                </a></li>
                <li><a href="./productRadmin.php"><i class="fa fa-shopping-basket"></i>
                    <div class="title">Product Report</div>
                </a></li>
                <li><a href="./stmanagement.php"><i class="fa fa-tint"></i>
                <div class="title">skin management</div>
                </a></li>
                <li><a href="./logout.php"><i class="fa fa-sign-out"></i>
                    <div class="title">logout</div>
                </a></li>
            </ul>
    </div>

        <!-- main content -->
    <div class="main">
        <div class="top-bar">
            <div class="admin"><p>Welcome Admin</p></div>
                <div class="user">
                    <img src="./images/avatar.png" alt="">
                </div>
            </div>

            <div class="cards">
                <div class="card">
                    <div class="card-content">
                        <div class="number"><?php echo $number; ?></div>
                        <div class="card-name">appointments</div>                       
                    </div>
                    <div class="icon-box"><i class="fa fa-calendar"></i></div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number"><?php echo $usernum; ?></div>
                        <div class="card-name">users</div>
                       </div> 
                       <div class="icon-box"><i class="fa fa-user"></i></div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number"><?php echo $dermnum; ?></div>
                        <div class="card-name">dermatologists</div>                     
                    </div>
                     <div class="icon-box"><i class="fa fa-stethoscope"></i></div>
                </div>
        </div><!-- end of cards -->

            <!-- tables -->
          <div class="tables">
              <div class="last-appointments">
              <div><p><a href="./admin.php"> < Back</a></p></div>
                  <div class="heading">
                      <h2>System Deletion logs</h2>
                      <button onclick="window.print();" class="btn">Print</button>
                  </div>
                  
                        <?php
        $MyfileName = "deletelog.txt";

        if(file_exists($MyfileName)){
            ?>
            <?php echo file_get_contents($MyfileName); ?> </br>
           <?php
            }
            ?>
              </div>
          </div>
        </div>
    </div>
   
</body>
</html>