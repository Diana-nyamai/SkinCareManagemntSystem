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
    $log = "The dermatologist deleted an availability";
    deleteLog($log);
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