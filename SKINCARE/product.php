
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=0 ">
    <title>Product form</title>
 <style>
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
h1{
    text-align: center;
    padding: 20px;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #673ab7;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #673ab7;
}

.container {
  border-radius: 5px;
  background-color: #e1e2e1;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* to Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/*adding  Responsivess to the forms when the screen is less than 600px wide */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
    </style>
</head>
<body>
  <!-- body section -->
<h1>product form</h1>
<div class="container">
      <!-- start of the form -->
        <form name="product" action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div class="row">
          <div class="col-25"><label for="sname">Shop name</label></div>
          <div class="col-75"><input type="text" id="sname" name="sname" placeholder="shop name.."></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="sowner">Shop owner</label></div>
          <div class="col-75"><input type="text" id="sowner" name="sowner" placeholder="shop owner.."></div>
          </div>
        <div class="row">
            <div class="col-25"><label for="sphone">Shop Phone Number</label></div>
            <div class="col-75"><input type="text" id="sphone" name="sphone" placeholder="shop phone number.."></div>
        </div>
        <div class="row">
            <div class="col-25"><label for="email">Email</label></div>
            <div class="col-75"><input type="text" placeholder="shop email.." name="semail" id="semail"></div>
        </div>
        <div class="row">
            <div class="col-25"><label for="pname">Product name</label></div>
            <div class="col-75"><input type="text" name="pname" id="pname" placeholder=" product name.."></div>
        </div>
        <div class="row">
            <div class="col-25"><label for="pbrand">Brand</label></div>
            <div class="col-75"><input type="text" id="pbrand" name="pbrand" placeholder="product brand.."></div>
        </div>
        <div class="row">
            <div class="col-25"><label for="pdescription">Description</label></div>
            <div class="col-75"><input type="text" id="pdescription" name="pdescription" placeholder="product description.."></div>
        </div>
        <div class="row">
            <div class="col-25"><label for="pprice">Price</label></div>
            <div class="col-75"><input type="text" id="pprice" name="pprice" placeholder="product price.."></div>
        </div>
        <div class="row">
            <div class="col-25"><label for="product_image">Product image</label></div>
            <div class="col-75"><input type="file" id="pimage" name="pimage" placeholder="product price.."></div>
        </div>
       
        <br>
        <div class="row">
          <input type="submit" name="submit" value="upload">
        </div>
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
     

      mysqli_query($conn, "insert into tbl_product (sname,sowner,phone_no,email,pname,brand,pdescription,price,pimage) values('$_POST[sname]','$_POST[sowner]','$_POST[sphone]', '$_POST[semail]', '$_POST[pname]','$_POST[pbrand]','$_POST[pdescription]','$_POST[pprice]','$dst1')");
       }
       ?>
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