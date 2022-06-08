<?php
session_start();
// destroys all the sessions in a website
session_destroy();
// sends raw http header to browser
header("location: authentication.php");
?>