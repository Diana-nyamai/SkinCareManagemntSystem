<!-- N:B  for trial purposes -->


<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            table{
                border-collapse: collapse;
            }
        </style>
    </head>
<body>
    <h2 style="text-align: center;">Product report</h2>
<!-- <a href="#" onclick="window.print();">print</a>  -->

<?php
require './config.php';
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
$productq = mysqli_query($conn, 'SELECT * FROM tbl_product');
$count = mysqli_num_rows($productq);
echo  $count, ' records found <br/>';

// main table
echo "<table border= '1' align= 'center' background: '#000'; color: 'white';>";

// header of the table
echo "<tr>";
echo "<th>shop_id</th>";
echo "<th>sname</th>";
echo "<th>owner</th>";
echo "<th>phone number</th>";
echo "<th>email</th>";
echo "<th>pname</th>";
echo "<th>description</th>";
echo "<th>price</th>";
echo "</tr>";

// the table data
while($row = mysqli_fetch_array($productq)){
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['sname']}</td>";
    echo "<td>{$row['sowner']}</td>";
    echo "<td>{$row['phone_no']}</td>";
    echo "<td>{$row['email']}</td>";
    echo "<td>{$row['pname']}</td>";
    echo "<td>{$row['pdescription']}</td>";
    echo "<td>{$row['price']}</td>";
    echo "</tr>";
}

echo "</table>"
?>
</body>
</html>
