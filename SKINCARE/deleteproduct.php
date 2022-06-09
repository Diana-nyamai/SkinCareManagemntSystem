<!-- php opening tag -->
<?php
// function that starts a session
   session_start();
  //  obtain data from form submitted with method get
  $id = $_GET['id'];
  $conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
  $data = mysqli_query($conn, "DELETE FROM tbl_product WHERE id='$id'");
  
  if($data){
    $log = "The admin deleted a product ";
    deleteLog($log);
    echo "
    <script>
    confirm('are you sure you want to delete product record?');
    window.location.href = 'productRadmin.php';
    </script>";
  }
  else{
    deleteLog($log);
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