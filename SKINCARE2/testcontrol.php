<!-- handles the login page -->
<?php
session_start(); 
//  database connection
$conn = new mysqli('localhost', 'nyamai', 'nyamai', 'skincare');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fname = $_POST['name'];
    // $lname = $_POST['lname'];
    $password = $_POST['age'];

    $s = "select * from test where user_name ='$fname' and age='$password'";
    $result = mysqli_query($conn, $s);
    
    if(mysqli_num_rows($result) == 1){
        echo "welcome user!";
    }
   
    else{
        echo "wrong credentials";
    }
}
 

?>