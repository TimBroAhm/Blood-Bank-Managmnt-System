
<?php
session_start();
include"connection/connection.php";	
$sql = "SELECT * FROM notices";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
	echo "<table id='vtable' style='width:600px;border:1px solid #336699;border-radius:8px;' align='center'><font color=green>";
	echo "<div id= 'img_div'>";
	echo"<tr><td>"."<p>".'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['date']."</p>";echo"</td>";echo"</tr>";
	echo"<tr><td>"."<img src='images/b.jpeg"."'>";echo"<b><i>Notice Fore:&nbsp;</i></b>";echo $row['title'];echo"&nbsp;";
	echo"<u><b>All Whom Concerned To!!</b></u>";echo"</td>";echo"</tr>";
	echo"</br>";
	echo"<tr><td>";echo $row['content'];echo"</td></tr>";
	echo"<tr><td>";echo"Upload By:";echo $row['Nid'];echo"</td></tr>";
	echo "</div>";
echo"</table>";
}
?>