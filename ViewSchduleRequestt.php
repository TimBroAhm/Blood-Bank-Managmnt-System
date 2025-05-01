<html>
<head>
<?php include"Language/lang.php";?>
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
<form action="ViewSchduleRequest.php" method="post">
<label><?php echo htmlspecialchars($lang['enteridd']);?>:</label></br>
<input type="text" name="serach" placeholder="" required="required"/>
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
$query = mysqli_query($con,"SELECT *FROM shedule_request WHERE OPERATOR_ID = '$searchq' ORDER BY REQUEST_DATE DESC Limit 1 ") 
or die("could not sea");
$count = mysqli_num_rows($query);
if($count==0){
 echo'<script type="text/javascript">alert("Terse is no such data in the database !! ");</script>';	
}
else{
		echo "<table id='vtable' style='width:700px;border:1px solid #336699;border-radius:10px;' align='center'><font color=white>
<tr>
<th bgcolor='#336699'><font color='white' size='2'>OPERATOR_ID</th>
<th bgcolor='#336699'><font color=white size='2'>Bord No</th>
<th bgcolor='#336699'><font color=white size='2'>Level</th>
<th bgcolor='#336699'><font color=white size='2'>Reusted Date</th>
<th bgcolor='#336699'><font color=white size='2'>From</th>
<th bgcolor='#336699'><font color=white size='2'>To</th>
<th bgcolor='#336699'><font color=white size='2'>Permission</th>
</tr>";
	while($row= mysqli_fetch_array($query)){
	echo"<tr>";
echo"<td>";echo $row["OPERATOR_ID"]; echo"</td>";
echo"<td>";echo $row["BORD_NO"]; echo"</td>";
echo"<td>";echo $row["LEVEL"]; echo"</td>";
echo"<td>";echo $row["REQUEST_DATE"]; echo"</td>";
echo"<td>";echo $row["FROM"]; echo"</td>";	
echo"<td>";echo $row["TO"]; echo"</td>";
echo"<td>";echo $row["PERMISSION"]; echo"</td>";	
	}
}
}
echo"</tr>";
	echo "</table>";
?>

