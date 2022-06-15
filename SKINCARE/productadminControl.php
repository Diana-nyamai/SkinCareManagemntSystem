<!-- this is the php to support bookappointment page on homepage -->
<?php
  $sname = $_POST['sname'];
  $sowner = $_POST['sowner'];
  $sphone =$_POST['sphone'];
  $semail =$_POST['semail'];
  $pname =$_POST['pname'];
  $skintype =$_POST['skintype'];
  $pdescription =$_POST['pdescription'];
  $pprice =$_POST['pprice'];

  $v1 = rand(1111, 9999);
  $v2 = rand(1111, 9999);
  
  //   concatination
  $v3 = $v1.$v2;
  //   calculates md5 hash of v3
  $v3 = md5($v3);
  //   ouput the name of the image
  $fnm = $_FILES["pimage"]["name"];
  $dst = "./product_image/".$v3.$fnm;
  // appear in database. product destination path, name of image, hashed random number
  $dst1 = "product_image/".$v3.$fnm;
  // moves uploaded files to a new destination
  // the uploaded file in the temporary directory on the web server.
  move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);
 
//   database connection
$conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
if(mysqli_connect_error()){
    die('connection failed(' .mysqli_connect_error(). ')' . mysqli_Connect_error());
}
else{
    $stmt = $conn->prepare('insert into tbl_product(sname,sowner,phone_no,email,pname,skin_type,pdescription,price,pimage)
    values(?,?,?,?,?,?,?,?,?)');
    $stmt->bind_param('ssissssss', $sname,$sowner,$sphone,$semail,$pname,$skintype,$pdescription,$pprice,$pimage );
    $stmt->execute();
    echo '<script>alert("product has been posted")
    window.location.href = "productadmin.php";
    </script>';
    $stmt->close();
    $conn->close();
}
?>