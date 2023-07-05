<?php
require './config.php';
// function that starts a session 
  session_start();
  // get variable obtains data that was sent through form with method get
  $id = $_GET['id'];
  // new keyword creates an object from class
  $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
  // performs a query against a database
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
    // checks whether a file exists
      if(!file_exists('deletelog.txt')){
        // function used to write a string to a file.checks for the file and if it doesnt exist it creates one
          file_put_contents('deletelog.txt', '');
      }
      //  server holds info about headers, paths and scrpt location
      // ip address from which the user is viewing the current page
      $ipaddress = $_SERVER['REMOTE_ADDR'];
      // sets default timezone used by all date/time function
      date_default_timezone_set('Africa/Nairobi');
      // date formats the local date and time and returns the formatted date strings
      // h-12hr format of an hour, i-minutes with 2 zeros, A - uppercase am or pm
      $time = date('d/m/Y h:i A');
 
      // reads a file into a string. del is the path
      $fileContent = file_get_contents('deletelog.txt');
    //   appending the contents to the file
      $fileContent .= "$ipaddress\t$time\t$log\n";

      // function used to write a string to a file
      file_put_contents('deletelog.txt', $fileContent);
  }
?>