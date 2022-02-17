<!-- this is the appointent page that contains the report on the appointments made..on admin page -->
<?php
   session_start();
  $conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
  $data = mysqli_query($conn, 'SELECT * FROM tbl_appointment');
  $number = mysqli_num_rows($data);
  $users = mysqli_query($conn, 'SELECT * FROM tbl_users');
  $usernum = mysqli_num_rows($users);
  $derm = mysqli_query($conn, 'SELECT * FROM tbl_users WHERE user_type="dermatologist"');
  $dermnum = mysqli_num_rows($derm);
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
       justify-content: flex-end;
       padding: 0 20px;
       box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
       z-index: 1;
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
       color: #000;
       border-radius: 10px;
       text-decoration: none;
   }
   .options select{
       padding: 5px;
       width: 300px
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
   thead{
       font-weight: 600;
   }
   table tr{
       border-bottom: 1px solid rgba(0,0,0,0.1);
   }
   tbody tr:hover{
       background: #f09053;
   }
   td{
       padding: 9px 5px;
   }
   td i{
       padding: 7px;
       border-radius: 50px;
   }
   .last-appointments table tbody td:last-child{
       white-space: nowrap;
   }
   @media all and (max-width: 1090px){
      .sidebar{
          width: 60px;
      }
      .main{
          width: calc(100% - 80px);
          left: 60px;
      }
      .top-bar{
          width: calc(100% - 60px);
      }
   }
   @media all and (max-width: 860px){
        .cards{
            grid-template-columns: 2 1fr;
        }
        .tables{
            grid-template-columns: 1fr;
        }
   }
   @media all and (max-width: 530px){
       .cards{
           grid-template-columns: 1fr;
       }
   }
   @media all and (max-width: 420px){
       .last-appointments,
       .doctor-visiting{
           font-size: 70%;
           padding: 10px;
           min-height: 200px;
       }
       .cards,
       .tables{
           padding: 10px;
       }
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
                <div class="title">Products</div>
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
                  <div class="heading">
                      <h2>Appointment report</h2>
                      <a href="" class="btn">View all</a>
                </div>

                <form action="#" method="post">
                <div class="options">
                    <select name="filterChoice">
                        <option value="0" selected="selected">All time</option>
                        <option value="1">Last 7 days</option>
                        <option value="2">Last month</option>
                        <option value="3">This year</option>
                        <option value="4">Last year</option>
                        <option value="5">next month</option>
                        <option value="6">not seen</option>

                    </select>
                 <input type="submit" value="filter" name="choice" class="bton">
                </div></form>

                <table class="appointments">
                    <thead>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Phone Number</td>
                        <td>Email</td>
                        <td>date</td>
                        <td>time</td>
                        <td>status</td>
                        <td>Actions</td>
                    </thead>
                    <?php
                   if(!isset($_POST['choice'])){
                       $query = "SELECT * FROM tbl_appointment";
                       getData($query);
                   }
                   elseif(isset($_POST['choice'])){
                    switch($_POST['filterChoice']){
                        case "0":
                            $sql = "SELECT * FROM tbl_appointment ORDER BY YEAR(appointment_date) asc, MONTH(appointment_date) ASC, DAY(appointment_date) ASC";
                            getdata($sql);
                            break;
                            // IN THE LAST 7 DAYS
                        case "1":
                            $sql = "SELECT * FROM tbl_appointment WHERE appointment_date > DATE_SUB(NOW(), INTERVAL 7 DAY) ORDER BY DAY(appointment_date) ASC";
                            getData($sql);
                            break;
                            // IN THE LAST MONTH
                        case "2":
                            $sql = "SELECT * FROM tbl_appointment where MONTH(appointment_date) = MONTH(DATE_ADD(Now(), INTERVAL -1 MONTH)) ORDER BY DAY(appointment_date) ASC";
                            getData($sql);
                            break;
                            // IN THIS YEAR
                        case "3":
                            $sql = "SELECT * FROM tbl_appointment WHERE YEAR(appointment_date) = YEAR(CURDATE()) ORDER BY YEAR(appointment_date) ASC, MONTH(appointment_date) ASC, DAY(appointment_date) asc";
                            getData($sql);
                            break;
                            // IN THE LAST MONTH
                        case "4":
                            $sql = "SELECT * FROM tbl_appointment WHERE YEAR(appointment_date) = YEAR(CURDATE()) -1 ORDER BY DAY(appointment_date) ASC";
                            getData($sql);
                            break;
                            // NEXT MONTH
                        case "5":
                            $sql = "SELECT * FROM tbl_appointment where MONTH(appointment_date) = MONTH(DATE_ADD(Now(), INTERVAL +1 MONTH)) ORDER BY DAY(appointment_date) ASC";
                            getData($sql);
                            break;
                        case "6":
                            $sql = "SELECT * FROM tbl_appointment WHERE statuses='not seen'";
                            getData($sql);
                            break;
                    }
                   }
                ?>
                    <?php 
    function getData($sql){
           $conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
           $data = mysqli_query($conn, $sql) ;
        if(mysqli_num_rows($data) > 0){
           while($row = mysqli_fetch_array($data)){
               $id = $row['appointment_id'];
               $firstName = $row['first_name'];
               $lastName = $row['last_name'];
               $phoneNumber = $row['phone_no'];
               $email = $row['email'];
               $appointdate = $row['appointment_date'];
               $appointdate = strtotime($appointdate);
               $appdate = date("d/m/y", $appointdate);
               $appointime = $row['appointment_time'];
               $cstatus = $row['statuses'];
               ?>
    
                <tr>
                        <td><?php echo $firstName;?></td>
                        <td><?php echo $lastName;?></td>
                        <td><?php echo $phoneNumber;?></td>
                        <td><?php echo $email;?></td>
                        <td><?php echo $appdate;?></td>
                        <td><?php echo $appointime;?></td>
                        <td><?php echo $cstatus;?></td>
                        <td>
                            <?php echo "
                        <a title='edit/update' href='./updateappoint.php?id=$id'>
                        <i class='fa fa-edit'> Edit</i></a>
                        ";?>
                        </td>
                    </tr>
          <?php     
           }
           }
           else { ?>

              <tr><td>No data found!</td></tr>
              <?php
           }
          
       }  ?>
    <!-- closes the function -->
                   
                </table>
              </div>
              
          </div>
        </div>
    </div>
</body>
</html>