<!-- this page will display the number of users and a report on users in admin -->
<?php
   session_start();
  $conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
  $data = mysqli_query($conn, 'SELECT * FROM tbl_product');
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
   .form-container input{
       margin-top: 10px;
       width: 100%;
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
             <!-- this page will display the number of users and a report on users -->
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
                        <div class="card-name">Products</div>
                       </div> 
                       <div class="icon-box"><i class="fa fa-shopping-basket"></i></div>
                </div>
            </div><!-- end of cards -->

            <!-- tables -->

          <div class="tables">
              <div class="last-appointments">
                  <div class="heading">
                      <h2>Add products</h2>
                </div>
                <div class="form-container">
                <form name="product" action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                <input type="text" id="sname" name="sname" placeholder="shop name..">
                <input type="text" id="sowner" name="sowner" placeholder="shop owner..">
                <input type="text" id="sphone" name="sphone" placeholder="shop phone number..">
                <input type="text" placeholder="shop email.." name="semail" id="semail">
                <input type="text" name="pname" id="pname" placeholder=" product name..">
                <input type="text" id="skintype" name="skintype" placeholder="for skin type..">
                <input type="text" id="pdescription" name="pdescription" placeholder="product description..">
                <input type="text" id="pprice" name="pprice" placeholder="product price..">
                <input type="file" id="pimage" name="pimage" placeholder="product price..">
                <input class="btn" type="submit" name="submit" value="upload">
               </form>

               <?php
       $conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
      $v1 = rand(1111, 9999);
      $v2 = rand(1111, 9999);

      $v3 = $v1.$v2;
      $v3 = md5($v3);

      if(isset($_POST["submit"])){
        $fnm = $_FILES["pimage"]["name"];
        $dst = "./product_image/".$v3.$fnm;
        $dst1 = "product_image/".$v3.$fnm;
        move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);
     

      mysqli_query($conn, "INSERT INTO tbl_product (sname,sowner,phone_no,email,pname,skin_type,pdescription,price,pimage) VALUES ('$_POST[sname]','$_POST[sowner]','$_POST[sphone]', '$_POST[semail]', '$_POST[pname]', '$_POST[skintype]', '$_POST[pdescription]', '$_POST[pprice]','$dst1')");
       }
       ?>
                 </div>   
                </table>
              </div>
             
          </div>
        </div>
    </div>

          <!-- javascript section -->
<script>
  // validating the main form
 function validateForm(){
   sname = document.product.sname.value;
   sowner = document.product.sowner.value;
   sphone = document.product.sphone.value;
   semail = document.product.semail.value;
   pname = document.product.pname.value;
   ptype = document.product.ptype.value;
   pbrand = document.product.pbrand.value;
   pdescription = document.product.pdescription.value;
   pprice = document.product.pprice.value;


   if(sname == ""){
     alert('please enter shop name');
     document.getElementById('fname').focus();
     return false;
   }
   if(sowner == ""){
     alert('please enter shop owner')
     document.getElementById('sowner').focus();
     return false;
   }
   if(sphone == ""){
     alert('please enter shop phone number')
     document.getElementById('sphone').focus();
     return false;
   }
   if(semail == ""){
     alert('please enter shop email')
     document.getElementById('semail').focus();
     return false;
   }
   if(pname == ""){
     alert('please enter product name')
     document.getElementById('pname').focus();
     return false;
   }
   if(ptype == ""){
     alert('please enter product type')
     document.getElementById('ptype').focus();
     return false;
   }
   if(pbrand == ""){
     alert('please enter brand')
     document.getElementById('pbrand').focus();
     return false;
   }
   if(pdescription == ""){
     alert('please enter shop description')
     document.getElementById('pdescription').focus();
     return false;
   }
   if(pprice == ""){
     alert('please enter price')
     document.getElementById('pprice').focus();
     return false;
   }
   
 }

</script>
</body>
</html>