<!-- testing xss attack-->
<?php
session_start(); 
//  database connection
$conn = new mysqli('localhost', 'nyamai', 'nyamai', 'skincare');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $uname = $_POST['username'];
    $password = $_POST['age'];

    $s = "select * from test where user_name ='$uname' and age='$password'";
    $result = mysqli_query($conn, $s);
    $data = mysqli_fetch_assoc($result);
    $name = $data['fname'];
    
    if(mysqli_num_rows($result) == 1){
        echo htmlspecialchars($name) ;
    }
    else{
        echo "wrong credentials";
    }
}
 ?>