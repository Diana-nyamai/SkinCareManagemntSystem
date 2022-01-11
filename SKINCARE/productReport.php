<!DOCTYPE html>
<html lang="en">
<body>
    <h2 style="text-align: center;">Product report</h2>
<!-- <a href="#" onclick="window.print();">print</a>  -->

<?php
$connection = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
$productq = mysqli_query($connection, 'SELECT * FROM tbl_product');
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
    echo "<td>{$row['sowner']}</td>";
    echo "<td>{$row['phone_no']}</td>";
    echo "<td>{$row['email']}</td>";
    echo "<td>{$row['pname']}</td>";
    echo "<td>{$row['ptype']}</td>";
    echo "<td>{$row['brand']}</td>";
    echo "<td>{$row['pdescription']}</td>";
    echo "<td>{$row['price']}</td>";
    echo "</tr>";
}

echo "</table>"
?>
</body>
</html>

<?php 
$res = mysqli_query($conn, "select * from tbl_product");
while($row = mysqli_fetch_array($res)){
    ?>
   <div class="gallery">
       <div class="g-content">
           <img src="<?php echo $row["pimage"]; ?>" alt="" >
           <h3><?php echo $row["pname"];?></h3>
           <p><?php echo $row["pdescription"]; ?></p>
           <h6>ksh.<?php echo $row["price"]; ?></h6>
           <h6>for dry skin</h6>
           <button class="add-1">Add to Cart</button>
       </div> 
   </div>
    <?php

}
?>