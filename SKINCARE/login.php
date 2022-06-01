<!-- handles the login page -->
<?php
session_start(); 
//  database connection
$conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fname =  $_POST['fname'];
    $password = $_POST['lpassword'];

    // protecting login from sql injection
    // the function escapes special characters in a string for use in sql query
    $fname = mysqli_real_escape_string($conn, $fname);
    $password = mysqli_real_escape_string($conn, $password);
   
    $s = "select * from tbl_users where first_name ='".$fname."'";
    //   performs a query against a database.
    $result = mysqli_query($conn, $s);
    //   fetches an row as a numeric array and as an associative array(array with strings as an index)
    $row = mysqli_fetch_array($result);
    $hashed_pass = $row['password'];
    $id = $row['user_id'];

  if(mysqli_num_rows($result) == 1)  {
    if($row['user_type'] == 'customer' && password_verify($password, $hashed_pass)){
        $_SESSION['username'] = $fname;
        $_SESSION['userid'] = $id;
        header('location:home.php');
    }
    elseif($row['user_type'] == 'dermatologist' && password_verify($password, $hashed_pass)){
        $_SESSION['username'] = $fname;
        $_SESSION['userid'] = $id;
        header('location:derm_page.php');
    }
    elseif($row['user_type'] == 'admin' && password_verify($password, $hashed_pass)){
        $_SESSION['username'] = $fname;
        $_SESSION['userid'] = $id;
        header('location:admin.php');
    }
    else{
        echo "wrong credentials";
    }
}
else{
    echo "same name";
}
 }

?>