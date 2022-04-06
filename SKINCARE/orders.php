<!-- this page will display the number of users and a report on orders in admin-->
<?php
   session_start();
  $conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
  $data = mysqli_query($conn, 'SELECT * FROM tbl_orders');
  $number = mysqli_num_rows($data)
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
                        <div class="number"><?php echo $number; ?></div>
                        <div class="card-name">orders</div>
                       </div> 
                       <div class="icon-box"><i class="fa fa-user"></i></div>
                </div>
            </div><!-- end of cards -->

            <!-- tables -->

          <div class="tables">
              <div class="last-appointments">
                  <div class="heading">
                      <h2>orders</h2>
                      <button onclick="window.print();" class="btn">Print</button>
                </div>
                <form action="#" method="post">
                <div class="options">
                    <select name="filterChoice">
                        <option value="0" selected="selected">All time</option>
                        <option value="1">Last 7 days</option>
                        <option value="2">Last month</option>
                        <option value="3">This year</option>
                        <option value="4">Last year</option>
                        <option value="5">not delivered</option>

                    </select>
                 <input type="submit" value="filter" name="choice" class="bton">
                </div></form>
                <table class="appointments">
                    <thead>
                        <td>order date</td>
                        <td>email</td>
                        <td>product name</td>                       
                        <td>total amount</td>
                        <td>payment</td>
                        <td>shop name</td>
                        <td>product id</td>
                        <td>status</td>
                        <td>Actions</td>
                    </thead>

                    <?php
                   if(!isset($_POST['choice'])){
                       $query = "SELECT * FROM tbl_orders";
                       getData($query);
                   }
                   elseif(isset($_POST['choice'])){
                    switch($_POST['filterChoice']){
                        case "0":
                            $sql = "SELECT * FROM tbl_orders ORDER BY YEAR(Order_date) asc, MONTH(Order_date) ASC, DAY(Order_date) ASC";
                            getdata($sql);
                            break;
                            // IN THE LAST 7 DAYS
                        case "1":
                            $sql = "SELECT * FROM tbl_orders WHERE Order_date > DATE_SUB(NOW(), INTERVAL 7 DAY) ORDER BY DAY(Order_date) ASC";
                            getData($sql);
                            break;
                            // IN THE LAST MONTH
                        case "2":
                            $sql = "SELECT * FROM tbl_orders where MONTH(Order_date) = MONTH(DATE_ADD(Now(), INTERVAL -1 MONTH)) ORDER BY DAY(Order_date) ASC";
                            getData($sql);
                            break;
                            // IN THIS YEAR
                        case "3":
                            $sql = "SELECT * FROM tbl_orders WHERE YEAR(Order_date) = YEAR(CURDATE()) ORDER BY YEAR(Order_date) ASC, MONTH(Order_date) ASC, DAY(Order_date) asc";
                            getData($sql);
                            break;
                            // IN THE LAST YEAR
                        case "4":
                            $sql = "SELECT * FROM tbl_orders WHERE YEAR(Order_date) = YEAR(CURDATE()) -1 ORDER BY DAY(Order_date) ASC";
                            getData($sql);
                            break;
                            // products not delivered
                        case "5":
                            $sql = "SELECT * FROM tbl_orders WHERE statuses ='not delivered'";
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
               $id = $row['order_id'];
               $orderdate = $row['Order_date'];
               $orderdate = strtotime($orderdate);
               $Ordate = date("d/m/y", $orderdate);
               $email = $row['email'];
               $product_name = $row['product_name'];
               $tamount = $row['tamount'];
               $payment = $row['payment'];
               $sname = $row['shop_name'];
               $pid = $row['product_id'];
               $statuses = $row['statuses'];
              
               ?>
    
                <tr>
                        <td><?php echo $Ordate;?></td>
                        <td><?php echo $email;?></td>
                        <td><?php echo $product_name;?></td>
                        <td><?php echo $tamount;?></td>
                        <td><?php echo $payment;?></td>
                        <td><?php echo $sname;?></td>
                        <td><?php echo $pid;?></td>
                        <td><?php echo $statuses;?></td>
                        <td>
                        <?php echo "
                        <a title='edit/update' href='./updateorders.php?id=$id'>
                        <i class='fa fa-edit'></i></a>
                         <a title='delete' href='./deleteorder.php?id=$id'><input type='submit' class='btn' value='delete' /></a> 
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