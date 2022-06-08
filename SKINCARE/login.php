<!-- handles the login page -->
<?php
session_start(); 
//  database connection
$conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');

// server super global var holds info about headers, paths n script locations
// used to check form submission. alt is to use isset. returns request method used to access that page
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // post obtains data from form submitted with method post
    $fname =  $_POST['fname'];
    $password = $_POST['lpassword'];

    // protecting login from sql injection
    // the function escapes special characters in a string for use in sql query
    // used procedural style(with 2 params. connection, escape string) instead of object oriented style
    $fname = mysqli_real_escape_string($conn, $fname);
    $password = mysqli_real_escape_string($conn, $password);
   
    $s = "select * from tbl_users where first_name ='".$fname."'";
    //   performs a query against a database. two params(connection, query)
    $result = mysqli_query($conn, $s);
    //   function that fetches rows from the db and stores them in an array.either numeric or associative
    $row = mysqli_fetch_array($result);
    $hashed_pass = $row['password'];
    $id = $row['user_id'];

    // returns number of rows in a result set
  if(mysqli_num_rows($result) == 1)  {
    //   password verify function verifies whether the given password matches the hashed one
    if($row['user_type'] == 'customer' && password_verify($password, $hashed_pass)){
        // setting the session value
        $_SESSION['username'] = $fname;
        $_SESSION['userid'] = $id;
        // php function sends raw http header to browser
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
    // echo displays output to the screen
    else{
        echo "wrong credentials";
    }
}
else{
    echo "please register! or Use a different username!";
}
 }

?>