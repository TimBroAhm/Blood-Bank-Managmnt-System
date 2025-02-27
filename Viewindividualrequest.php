
<html>
<head>
<?php 
include"Language/lang.php";
?>
<meta charset="utf-8">
</head>
<style>
.ser form{
margin-left:558px;
padding:5px;
font-style:italic;
font-size:16px;
font-family:cambria;	
}
</style>
<body>
<div class="ser">
<form action="Viewindividualrequest.php" method="post">
<label>Enter Item Serial Number:</label></br>
<input type="text" name="serach" placeholder="Enter Item Serial Number..." required="required"/>
<input type="submit" value=">>"/>
</form>
</div>
</body>
</html>

<?php
session_start();
include"connection/connection.php";
if(isset($_POST['serach'])){  
$searchq = $_POST['serach'];
$searchq = preg_replace("#[^0-9a-z]#i","",$searchq); 


  $sql = "SELECT * FROM item WHERE serial_numbre LIKE '%" . mysqli_real_escape_string($con, $searchq) . "%'"; 
            $query = mysqli_query($con, $sql) or die("Could not search: " . mysqli_error($con));
            $count = mysqli_num_rows($query);


if($count==0){
 echo'<script type="text/javascript">alert("Terse is no such data in the database !! ");</script>';	
}
else{
		echo "<table id='vtable' style='width:700px;border:1px solid #336699;border-radius:10px;' align='center'><font color=white>
<tr>
<th bgcolor='#336699'><font color='white' size='2'>Item Register ID</th>
<th bgcolor='#336699'><font color='white' size='2'>Serial Number</th>
<th bgcolor='#336699'><font color='white' size='2'>Model</th>
<th bgcolor='#336699'><font color=white size='2'>Category</th>
<th bgcolor='#336699'><font color=white size='2'>Description</th>
<th bgcolor='#336699'><font color=white size='2'>Shelf Number</th>

<th bgcolor='#336699'><font color='white' size='2'>Request ID</th>
<th bgcolor='#336699'><font color=white size='2'>Supplier ID</th>
<th bgcolor='#336699'><font color=white size='2'>Stock Clerk ID</th>
<th bgcolor='#336699'><font color=white size='2'>Price</th>

<th bgcolor='#336699'><font color=white size='2'>Date of Register</th>
</tr>";
	while($row= mysqli_fetch_array($query)){
	echo"<tr>";
echo"<td>";echo $row['item_Register_ID']; echo"</td>";
echo"<td>";echo $row['serial_numbre']; echo"</td>";
echo"<td>";echo $row['item_model']; echo"</td>";
echo"<td>";echo $row['catagory']; echo"</td>";
echo"<td>";echo $row['description']; echo"</td>";
echo"<td>";echo $row['shelf_number']; echo"</td>";		
echo"<td>";echo $row['request_id']; echo"</td>";
echo"<td>";echo $row['supplier_id']; echo"</td>";
echo"<td>";echo $row['stockclerk_id']; echo"</td>";	
echo"<td>";echo $row['price']; echo"</td>";
echo"<td>";echo $row['date']; echo"</td>";	
	}
	
}
}
echo"</tr>";
	echo "</table>";
?>

