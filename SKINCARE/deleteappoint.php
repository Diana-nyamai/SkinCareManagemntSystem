<?php
// function that starts a session 
  session_start();
  // get variable obtains data that was sent through form with method get
  $id = $_GET['id'];
  // new keyword creates an object from class
  $conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
  $data = mysqli_query($conn, "DELETE FROM tbl_doctoravailable WHERE id='$id'");
  
  // checks whether the condition is true and executes the statement
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