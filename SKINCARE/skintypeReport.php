<!DOCTYPE html>
<html lang="en">
<body>
    <h2 style="text-align: center;">shop report</h2>
<!-- <a href="#" onclick="window.print();">print</a>  -->

<?php
$connection = new mysqli('localhost', 'root', '', 'skincare');
$productq = mysqli_query($connection, 'SELECT * FROM tbl_product WHERE ptype="for acne & "');
$count = mysqli_num_rows($productq);
echo  $count, ' records found <br/>';

// main table
echo "<table border= '1' align= 'center'>";

// header of the table
echo "<tr>";
echo "<th>shop_id</th>";
echo "<th>sname</th>";
echo "<th>owner</th>";
echo "<th>phone number</th>";
echo "<th>email</th>";
echo "<th>pname</th>";
echo "<th>ptype</th>";
echo "<th>brand</th>";
echo "<th>description</th>";
echo "<th>price</th>";
echo "</tr>";

// the table data
while($row = mysqli_fetch_array($productq)){
    echo "<tr>";
    echo "<td>{$row['shop_id']}</td>";
    echo "<td>{$row['sname']}</td>";
    echo "<td>{$row['owner']}</td>";
    echo "<td>{$row['phone_no']}</td>";
    echo "<td>{$row['email']}</td>";
    echo "<td>{$row['pname']}</td>";
    echo "<td>{$row['ptype']}</td>";
    echo "<td>{$row['brand']}</td>";
    echo "<td>{$row['description']}</td>";
    echo "<td>{$row['price']}</td>";
    echo "</tr>";
}

echo "</table>"
?>
</body>
</html>