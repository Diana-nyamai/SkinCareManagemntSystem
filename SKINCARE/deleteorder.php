<?php
// function that starts a session
  session_start();
// obtains data from a form submitted with method post
  $id = $_GET['id'];
  // new creates an object for a class 
  $conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
  $data = mysqli_query($conn, "DELETE FROM tbl_orders WHERE order_id='$id'");
  
  if($data){
    // output info to the screen
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