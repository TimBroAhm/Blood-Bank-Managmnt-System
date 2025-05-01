<?php
session_start();
include"../connection/connection.php";

$query = mysqli_query($con,"SELECT *FROM Booking where Accepted='No'|| Accepted='Yes'") 
or die("could not sea");
$count = mysqli_num_rows($query);
if($count==0){
 echo'<script type="text/javascript">alert("Terse is no such data in the database !! ");</script>';	
}
else{
		echo "<table id='vtable' style='width:700px;border:1px solid #336699;border-radius:10px;' align='center'><font color=white>
<tr>
<th bgcolor='#336699'><font color='white' size='2'>No</th>
<th bgcolor='#336699'><font color='white' size='2'>UserName</th>
<th bgcolor='#336699'><font color=white size='2'>Board_No</th>
<th bgcolor='#336699'><font color=white size='2'>SeatNo</th>
</tr>";
$counter=0;
	while($row= mysqli_fetch_array($query)){
		$counter++;
	echo"<tr>";
echo"<td>";echo "$counter"; echo"</td>";
echo"<td>";echo $row["UserName"]; echo"</td>";
echo"<td>";echo $row["SideNo"]; echo"</td>";
echo"<td>";echo $row["SeatNo"]; echo"</td>";
	}
	
}

echo"</tr>";
	echo "</table>";
?>

