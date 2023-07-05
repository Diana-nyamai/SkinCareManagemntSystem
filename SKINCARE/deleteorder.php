<?php
require './config.php';
// function that starts a session
  session_start();
// obtains data from a form submitted with method post
  $id = $_GET['id'];
  // new creates an object for a class 
  $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
  $data = mysqli_query($conn, "DELETE FROM tbl_orders WHERE order_id='$id'");
  
  if($data){
    $log = "The admin deleted an order";
    deleteLog($log);
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

<?php
  function deleteLog($log){
      if(!file_exists('deletelog.txt')){
          file_put_contents('deletelog.txt', '');
      }

      $ipaddress = $_SERVER['REMOTE_ADDR'];
      date_default_timezone_set('Africa/Nairobi');
      $time = date('d/m/Y h:iA', time());

      $fileContent = file_get_contents('deletelog.txt');
    //   appending the contents
      $fileContent .= "$ipaddress\t$time\t$log\n";

      file_put_contents('deletelog.txt', $fileContent);
  }
?>