<!-- this page will display the number of users and a report on users -->
<?php
require './config.php';
   session_start();
   $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
   $users = mysqli_query($conn, 'SELECT * FROM tbl_users');
   $usernum = mysqli_num_rows($users);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=0">
    <title>users| panel</title>
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
       grid-template-columns: 1fr;
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

   /* table styling */
   .tables{
      width: 100%;
      display: grid;
      grid-template-columns:1fr;
      grid-gap: 20px;
      align-items: self-start;
      padding: 0 20px 20px 20px ;
   }
   .img-box-small img{
       position: relative;
      
       border-radius: 50%;
   }
   .last-appointments{
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
   .search{
       margin: 10px 0;
   }
   .search input{
       padding: 5px 0;
       width: 300px;
       outline: none;
       text-align: center;
       color: #000;
   }
   .search .sbtn{
       padding: 5px 10px;
       width: 100px;
       background-image: linear-gradient(45deg, #1e1f31, #f09053);
       color: #fff;
       border-radius: 10px;
       text-decoration: none;
       border:none;
       cursor: pointer;
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
       .last-appointments{
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
                <div class="user">
                    <img src="./images/avatar.png" alt="">
                </div>
            </div>

            <div class="cards">
                
                <div class="card">
                    <div class="card-content">
                        <div class="number"></div>
                        <div class="number"><?php echo $usernum; ?></div>
                        <div class="card-name">users</div>
                       </div> 
                       <div class="icon-box"><i class="fa fa-user"></i></div>
                </div>
            </div><!-- end of cards -->

            <!-- tables -->

          <div class="tables">
              <div class="last-appointments">
                  <div class="heading">
                      <h2>users</h2>
                      <button onclick="window.print();" class="btn">Print</button>
                </div>
                 
                <form action="#" method="post">
                <div class="options">
                <select name="month">
                    <option selected="selected">select month</option>
                    <option value ='01'> JANUARY </option>
                    <option value ='02'> FEBRUARY </option>
                    <option value ='03'> MARCH </option>
                    <option value ='04'> APRIL </option>
                    <option value ='05'> MAY </option>
                    <option value ='06'> JUNE </option>
                    <option value ='07'> JULY </option>
                    <option value ='08'> AUGUST </option>
                    <option value ='09'> SEPTEMBER </option>
                    <option value ='10'> OCTOBER </option>
                    <option value ='11'> NOVEMBER </option>
                    <option value ='12'> DECEMBER </option>
                </select>
                <select name="year" id="year">
                    <option select="selected">select year</option>
                    <?php 
                    for($i = 2018 ; $i <= date('Y'); $i++){
                        echo "<option>$i</option>";
                    //given that variable i which has the year 2000
                    //if i variable is less and equal to the current Year
                    //echo the number with option output
                    //++ is an increment operator and the loop will end at the current year
                        }
                    ?>
            </select>
            <select name="gender" id="gender">
                <option select="selected">gender</option>
                <option value="male">male</option>
                <option value="female">female</option>
            </select>

                 <input type="submit" value="filter" name="filterbtn" class="bton">
                 <input type="submit" value="reset" name="reset" class="bton"> 
                </div>
            </form>

                <!-- start of the table -->
                <table class="appointments">
                    <thead>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Phone Number</td>
                        <td>Email</td> 
                        <td>User type</td>                      
                        <td>Gender</td>
                        <td>sign up date</td>
                        <td>Actions</td>
                    </thead>
                    <?php
                   if(!isset($_POST['filterbtn'])){
                       $query = "SELECT * FROM tbl_users";
                       Data($query);
                   }
                   elseif(isset($_POST['filterbtn'])){
                       $month = $_POST['month'];
                       $year = $_POST['year'];
                       $gender = $_POST['gender'];

                       $sql = "SELECT * FROM tbl_users WHERE YEAR(signup_date)='$year' AND MONTH(signup_date)='$month' AND gender='$gender'";
                       Data($sql);
                   }
                   elseif(isset($_POST['reset'])){
                       $query = "SELECT * FROM tbl_users";
                       Data($query);
                   }
                ?>
    <?php 
        function Data($sql){
            $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
           $data = mysqli_query($conn, $sql) ;
        if(mysqli_num_rows($data) > 0){
           while($row = mysqli_fetch_array($data)){
               $firstName = $row['first_name'];
               $lastName = $row['last_name'];
               $phoneNumber = $row['phone_number'];
               $email = $row['email'];
               $usertype = $row['user_type'];
               $gender = $row['gender'];
               $regday = $row['signup_date'];
               $regday = strtotime($regday);
               $signUp = date("d/m/y", $regday);
               ?>
    
                <tr>
                        <td><?php echo $firstName;?></td>
                        <td><?php echo $lastName;?></td>
                        <td><?php echo $phoneNumber;?></td>
                        <td><?php echo $email;?></td>
                        <td><?php echo $usertype;?></td>
                        <td><?php echo $gender;?></td>
                        <td><?php echo $signUp;?></td>
                        <td>
                            <i class='fa fa-edit'></i>
                            <i class='fa fa-trash'></i>
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