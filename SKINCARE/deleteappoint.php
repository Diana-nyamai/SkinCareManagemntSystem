<?php
   session_start();
  $id = $_GET['id'];
  $conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
  $data = mysqli_query($conn, "DELETE FROM tbl_doctoravailable WHERE id='$id'");
  
  if($data){
    echo "
    <script>
    confirm('are you sure you want to delete appointment availability?');
    window.location.href = 'dermViewA.php';
    </script>";
  }
  else{
      echo "failed to delete";
  }
?>