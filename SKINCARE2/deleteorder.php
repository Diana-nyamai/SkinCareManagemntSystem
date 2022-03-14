<?php
  session_start();
  $id = $_GET['id'];
  $conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
  $data = mysqli_query($conn, "DELETE FROM tbl_orders WHERE order_id='$id'");
  
  if($data){
    echo "
    <script>
    confirm('are you sure you want to delete order record?');
    window.location.href = 'orders.php';
    </script>";
  }
  else{
      echo "failed to delete";
  }
?>