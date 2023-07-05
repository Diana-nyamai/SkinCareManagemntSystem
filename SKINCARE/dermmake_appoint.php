<!-- this page will display the making appoint availability on the doctors side-->
<?php
require './config.php';
   session_start();
   $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
  $data = mysqli_query($conn, 'SELECT * FROM tbl_appointment');
  $number = mysqli_num_rows($data);
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
       cursor: pointer;
   }
   .form-container input{
       margin-top: 10px;
       width: 100%;
       padding: 10px 10px;
       outline: none;

   }
   .form-container textarea{
       margin-top: 10px;
       width: 100%;
       height: 300px;
       padding: 10px 10px;
       outline: none;
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
                        <div class="card-name">Make appointments availability</div>
                       </div> 
                       <div class="icon-box"><i class="fa fa-tint"></i></div>
                </div>
            </div><!-- end of cards -->

            <!-- tables -->

          <div class="tables">
              <div class="last-appointments">
                  <div class="heading">
                      <h2>Make appointment availability</h2>
                      <?php $id = $_SESSION['userid']?>
                </div>
                <div class="form-container">
                <form name="product" action="dermappoint.php" method="post" onsubmit="return validateForm(event)">
                <input type="hidden" id="id" name="id" value="<?php echo $id; ?>"/>
                <input type="text" id="davailable" name="davailable" placeholder="date available..">
                <input type="text" id="tavailable" name="tavailable" placeholder="time available..">
                <input class="btn" type="submit" name="submit" value="post availabilty">
               </form>

               
                 </div>   
                </table>
              </div>
             
          </div>

          
        </div>
    </div>

          <!-- javascript section -->
<script>
  // validating the main form
 function validateForm(event){
    date  = document.product.davailable.value;
    time  = document.product.tavailable.value;
     
    if(date.indexOf('-') == -1){
        event.preventDefault();
         alert('date should be in the form yyyy-mm-dd.  example 2022-05-12');
         document.getElementById('date').focus();
         return false;
       }
    //    is a method that splits a string into an array of substrings
       comps = date.split('-');
       if(comps[0].length< 4 || comps[1].length < 1 || comps[2].length<1){
        event.preventDefault();
         alert('date should be in the form yyyy-mm-dd.  example 2022-05-12');
         document.getElementById('date').focus();
         return false;
       }
       if(isNaN(comps[0]) || isNaN(comps[1]) || isNaN(comps[2])){
        event.preventDefault();
         alert('date must be a number and in the format yyyy-mm-dd.  example 2022-05-12');
         document.getElementById('date').focus();
         return false;
       }
   if(time == ""){
    event.preventDefault();
     alert('please enter the appointment time')
     document.getElementById('time').focus();
     return false;
   }
 }
 

</script>
</body>
</html>