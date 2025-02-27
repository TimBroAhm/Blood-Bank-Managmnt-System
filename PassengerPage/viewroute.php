
<?php
session_start();
include"../connection/connection.php";

$query = mysqli_query($con,"SELECT *FROM schedule") 
or die("could not sea");
$count = mysqli_num_rows($query);
if($count==0){
 echo'<script type="text/javascript">alert("Terse is no such data in the database !! ");</script>';	
}
else{
		echo "<table id='vtable' style='width:700px;border:1px solid #336699;border-radius:10px;' align='center'><font color=white>
<tr>
<th bgcolor='#336699'><font color='white' size='2'>NO</th>
<th bgcolor='#336699'><font color='white' size='2'>BORD_NUMNBER</th>
<th bgcolor='#336699'><font color=white size='2'>INITIAL_PLACE</th>
<th bgcolor='#336699'><font color=white size='2'>DESTINATION_PLACE</th>
<th bgcolor='#336699'><font color=white size='2'>LEVEL</th>
<th bgcolor='#336699'><font color=white size='2'>DISTANCE</th>
<th bgcolor='#336699'><font color=white size='2'>TARIF</th>
<th bgcolor='#336699'><font color=white size='2'>STATUS</th>
</tr>"; 
$counter=0;
	while($row= mysqli_fetch_array($query)){
		 $counter++;
	echo"<tr>";
	echo"<td>";echo  "$counter"; echo"</td>";
echo"<td>";echo $row["BORD_NUMBER"]; echo"</td>";
echo"<td>";echo $row["INITIAL_PLACE"]; echo"</td>";
echo"<td>";echo $row["DESTINATION_PLACE"]; echo"</td>";
echo"<td>";echo $row["LEVEL"]; echo"</td>";
echo"<td>";echo $row["DISTANCE"]; echo"</td>";	
echo"<td>";echo $row["TARIFF"]; echo"</td>";
echo"<td>";echo $row["STATUS"]; echo"</td>";

	}
	
}

echo"</tr>";
	echo "</table>";
?>


