<?php
   session_start();
  $id = $_GET['id'];
  $conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
  $data = mysqli_query($conn, "DELETE FROM tbl_product WHERE id='$id'");
  
  if($data){
    echo "
    <script>
    confirm('are you sure you want to delete product record?');
    window.location.href = 'productRadmin.php';
    </script>";
  }
  else{
      echo "failed to delete";
  }
?>