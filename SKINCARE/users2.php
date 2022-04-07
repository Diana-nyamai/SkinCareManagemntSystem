<form action="" method = "post" >
SELECT MONTH
    <select name="Month" id="Month">
	<option selected="select month"></option>
    <option value ='01'> JANUARY </option>
    <option value ='02'> FEBRUARY </option>
    <option value ='03'> MARCH </option>
    <option value ='04'> APRIL </option>
    <option value ='05'> MAY </option>
    <option value ='06'> JUNE </option>
    <option value ='07'> JULY </option>
    <option value ='08'> AUGUST </option>
    <option value ='09'> SEPTEMBER </option>
    <option value ='10'> OCTOBER </option>
    <option value ='11'> NOVEMBER </option>
    <option value ='12'> DECEMBER </option>
            </select>
	YEAR:	
	<select name="Year" id="Year"> 
	<option></option>
		<?php 
   		for($i = 2018 ;
		    $i <= date('Y');
			 $i++){
      		echo "<option>$i</option>";
		//given that variable i which has the year 2000
		//if i variable is less and equal to the current Year
		//echo the number with option output
		//++ is an increment operator and the loop will end at the current year
   }
		?>
	</select>
	
    
	<button name="report" type="submit" class="btn">Generate</button>	

    </form>
<?php
	if(isset($_POST['report'])){
        $month = $_POST['Month'];
        $year = $_POST['Year'];
        $date = $month.'-'.$year;

        $conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
        $searchquery="SELECT * FROM tbl_users WHERE YEAR(signup_date)='$year' AND MONTH(signup_date)='$month'";
        $run_search = mysqli_query($conn, $searchquery);
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th colspan='3'>Monthly Report</th>";// table head name to to span 3 columns
        echo "</tr>";
        echo "<tr>";//table row
        echo "<th>first Name</th>";//table head for column
        echo "<th>last Date</th>";//table head for column
        echo "<th>date</th>";//table head for column 
        
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while($row = mysqli_fetch_assoc($run_search)){
            echo "<tr>";
            echo "<td>". $row['first_name']."</td>";
            echo "<td>". $row['last_name']."</td>";
            echo "<td>". $row['signup_date']."</td>";
        }
    echo "</tfooter>";
    echo "</tbody>";
    echo "</table>";
    }
?>