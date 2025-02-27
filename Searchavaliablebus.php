	<?php
session_start();
include"connection/connection.php";

if(isset($_POST['search'])){  
$searchq = $_POST['cc'];
$desti = $_POST['ccc']; 
$lev = $_POST['level']; 
$query = mysqli_query($con,"SELECT * FROM Schedule WHERE INITIAL_PLACE LIKE '%{$searchq}%'  and DESTINATION_PLACE LIKE '%{$desti}%' and LEVEL LIKE '%{$lev}%' ") 
or die("could not sea");
//for count total number of bus start
$sql="select count('$lev') from Schedule where INITIAL_PLACE = '$searchq' and DESTINATION_PLACE = '$desti' and LEVEL = '$lev'";
$countt=mysqli_query($con,$sql);
$row1= mysqli_fetch_array($countt);
echo "<center><b><font face='monotype corsiva' size='5'color='green'>Total Buses Assign From Kombolcha To";echo"&nbsp;&nbsp;";
echo "$desti"; echo" By This Level is&nbsp;&nbsp;&nbsp;:&nbsp;";
echo $row1['0'];echo"</font></b></center>";
// count end
//count currently avaliable bus given line
$query2 = mysqli_query($con,"SELECT * FROM Schedule WHERE INITIAL_PLACE LIKE '%{$searchq}%'  and DESTINATION_PLACE LIKE '%{$desti}%' and LEVEL LIKE '%{$lev}%' ") 
or die("could not sea");
$sqla="select count('$lev') from Schedule where STATUS = 'InKocha' and INITIAL_PLACE = '$searchq' and DESTINATION_PLACE = '$desti' and LEVEL = '$lev'";
$countt=mysqli_query($con,$sqla);
$row1= mysqli_fetch_array($countt);
echo "<font face='monotype corsiva' size='5'color='red'><center><b>Currently Avaliable Buses From Kombolcha To&nbsp;&nbsp;";
echo "$desti"; echo" By This Level is &nbsp;&nbsp;&nbsp;:&nbsp;";
echo $row1['0'];echo"&nbsp;&nbsp;";
echo"</b></center></font>";
//end of avaliable bus count
echo"<br><br>";
$count = mysqli_num_rows($query);
if($count==0){
 echo'<script type="text/javascript">alert("Terse is no bus work in this line !! ");</script>';	
}
//
else{
		echo "<table id='vtable' style='width:700px;border:1px solid #336699;border-radius:5px;' align='center'><font color=white>
<tr>
<th bgcolor='#336699'><font color='white' size='2'>Bord Number</th>
<th bgcolor='#336699'><font color='white' size='2'>Intial Place</th>
<th bgcolor='#336699'><font color=white size='2'>Destination</th>
<th bgcolor='#336699'><font color=white size='2'>Level</th>
<th bgcolor='#336699'><font color=white size='2'>Distance</th>
<th bgcolor='#336699'><font color=white size='2'>Tariff</th>
<th bgcolor='#336699'><font color=white size='2'>Currently</th>
</tr>";
	while($row= mysqli_fetch_array($query)){
	echo"<tr>";
echo"<td>";echo $row["BORD_NUMBER"]; echo"</td>";
echo"<td>";echo $row["INITIAL_PLACE"]; echo"</td>";
echo"<td>";echo $row["DESTINATION_PLACE"]; echo"</td>";
echo"<td>";echo $row["LEVEL"]; echo"</td>";
echo"<td>";echo $row ["DISTANCE"]; echo"</td>";
echo"<td>";echo $row["TARIFF"]; echo"</td>";
echo"<td>";echo $row["STATUS"]; echo"</td>";		
	}
	echo"</tr>";
	echo "</table>";
}
}
?>