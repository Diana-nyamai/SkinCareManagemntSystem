<!-- this is the appointent page that contains the report on the appointments made..on dermatologist page -->
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
    <title>dermatologist panel</title>
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
                
                <li><a href="./derm_page.php"><i class="fa fa-stethoscope"></i>
                        <div class="title">appointments</div>
                </a></li>
                <li><a href="./dermmake_appoint.php"><i class="fa fa-dashboard"></i>
                    <div class="title">Make appointments</div>
                </a></li>
                <li><a href="./dermViewA.php"><i class="fa fa-dashboard"></i>
                    <div class="title">View availability</div>
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
                      <button onclick="window.print();" class="btn">Print</button>
                </div>

                
                <table class="appointments">
                    <thead>
                        <td>First Name</td>
                        <td>Date Available</td>
                        <td>Time Available</td>
                        <td>Actions</td>
                    </thead>
                    <?php $id = $_SESSION['userid']?>
                    <?php
                    $sql = "SELECT tbl_users.first_name, tbl_doctoravailable.id,tbl_doctoravailable.davailable, tbl_doctoravailable.tavailable FROM tbl_doctoravailable INNER JOIN tbl_users ON tbl_doctoravailable.userid = tbl_users.user_id where userid='$id'";
                    getData($sql);
                   
                ?>
                    <?php 
    function getData($sql){
           $conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
           $data = mysqli_query($conn, $sql) ;
        if(mysqli_num_rows($data) > 0){
           while($row = mysqli_fetch_array($data)){
               $id = $row['id'];
               $firstName = $row['first_name'];
               $dvailable = $row['davailable'];
               $tavailable = $row['tavailable'];
               ?>
    
                <tr>
                        <td><?php echo $firstName;?></td>
                        <td><?php echo $dvailable;?></td>
                        <td><?php echo $tavailable;?></td>
                        <td>
                            <?php echo "
                        <a title='delete' href='./deleteappoint.php?id=$id'><input type='submit' class='btn' value='delete'/></a> 
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