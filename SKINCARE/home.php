<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <p><a href="login.html">logout</a></p>
    <h1>WELCOME <?php
    echo $_SESSION['username']; ?> </h1>
</body>
</html>