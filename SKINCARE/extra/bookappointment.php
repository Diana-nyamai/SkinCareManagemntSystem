<!-- book appointment page page -->
<?php
 session_start();
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
        <h2>book appointment page</h2>
        <?php $id = $_SESSION['userid']?>
        <div class="form-container">
                <form name="appointment" action="./Bappointment.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                <input type="hidden" id="id" name="id" value="<?php echo $id ?>">
                <input type="text" name="date" id="date" placeholder="Enter date..">
                <input type="text" name="time" id="time" placeholder="Enter time..">
                <input class="btn" type="submit" value="book appointment">
               </form>

               <!--  -->
       
                 </div>   
              </div>


     <!-- javascript section -->
<script>
  // validating the main form
 function validateForm(){
   fname = document.appointment.fname.value;
   lname = document.appointment.lname.value;
   phone = document.appointment.phone.value;
   email = document.appointment.email.value;
   date  = document.appointment.date.value;
   time  = document.appointment.time.value;

   if(fname == ""){
     alert('please enter first name');
     document.getElementById('fname').focus();
     return false;
   }
   if(lname == ""){
     alert('please enter second name')
     document.getElementById('lname').focus();
     return false;
   }
   if(phone.length == 0 || isNaN(phone)){
    alert('Enter a phone number');
    document.getElementById('phone').focus();
    return false;
  }
  if(email.length == 0 || email.indexOf('@') == -1 || email.indexOf('.') == -1){
    alert('enter a valid email.should contain @ and .');
    document.getElementById('email').focus();
    return false;
  }
  if(date.indexOf('-') == -1){
         alert('date should be in the form yyyy-mm-dd.  example 2022-05-12');
         document.getElementById('date').focus();
         return false;
       }
       comps = date.split('-');
       if(comps[0].length< 4 || comps[1].length < 1 || comps[2].length<1){
         alert('date should be in the form yyyy-mm-dd.  example 2022-05-12');
         document.getElementById('date').focus();
         return false;
       }
       if(isNaN(comps[0]) || isNaN(comps[1]) || isNaN(comps[2])){
         alert('date must be a number and in the format yyyy-mm-dd.  example 2022-05-12');
         document.getElementById('date').focus();
         return false;
       }
   if(time == ""){
     alert('please enter the appointment time')
     document.getElementById('time').focus();
     return false;
   }
   
   
   var returned = true;
   
  //  returned = validatePhone();
  //  if(returned == true)
   returned = validateEmail();
   if(returned == true)
   returned = validateDate();
   if(returned == true)
   
   return returned;
 }

</script>
</body>
</html>