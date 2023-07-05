<!-- php open tag -->
<?php
// function that starts a session
session_start();
// php super global variable that collects form data submitted from form with method post
 $fname = $_POST['fname'];
 $lname = $_POST['lname'];
 $phone = $_POST['phone'];
 $email = $_POST['email'];
 $gender = $_POST['gender'];
 $user = $_POST['user'];
 $password = $_POST['password'];
// function contains 2 params the password being hashed and the algorithm to be used to hash the pass. BCRYPT algorithm
 $password_hash = password_hash($password, PASSWORD_DEFAULT);

//  prevents xss attack
// htmlspecialchars converts predefined characters eg <,>,&, to html entities
 $fname = htmlspecialchars($fname);
 $lname = htmlspecialchars($lname);

//  database connection
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
// function produces a description about the error incase the connection failure
if(mysqli_connect_error()){
    // die prints the message and exits the current php script
    die('connection failed(' .mysqli_connect_error().')' . mysqli_connect_error());
}
else{
    // prepared statement prev sql injection
    // prepare sql query with empty values as placeholders with ? .bind the var to
    // placeholders by stating var with types. execute the query
    $stmt = $conn->prepare('insert into tbl_users(first_name, last_name, phone_number, email,gender, user_type, password) 
    values(?,?,?,?,?,?,?)');
    $stmt->bind_param('ssissss', $fname, $lname,$phone,$email, $gender, $user, $password_hash);
    $stmt->execute();

    // returns domain name
    // alert is a method that displays message in a pop up box.gives a warning message
    // script defines client side script
    // window.location.href object gets the address of the current page and redirects the browser to a new page or url specified
    
    echo "
        <script>
        alert('you have are now registered. Please login');
        window.location.href = 'authentication.php'; </script>   
    ";
    
    $stmt->close();
    $conn->close();
     // closes the prev database connection. save computer's resources
}
?>