<?php
$pass = 'josephnyamai';
echo $pass;
echo "<br/>";
echo password_hash($pass, PASSWORD_DEFAULT);
?>