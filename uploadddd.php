
<?php
session_start();
include"connection/connection.php";	
$sql = "SELECT * FROM upload";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
	echo "<table id='vtable' style='width:600px;border:1px solid #336699;border-radius:8px;' align='center'><font color=green>";
	echo "<div id= 'img_div'>";
	echo"<tr><td>"."<p>".'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['DATE']."</p>";echo"</td>";echo"</tr>";
	echo"<tr><td>"."<img src='images/".$row['IMAGE']."'>";echo"<b><i>Notice Fore:&nbsp;</i></b>";echo $row['NOTICE_FOR'];echo"&nbsp;";
	echo"<u><b>All of  Members!!</b></u>";echo"</td>";echo"</tr>";
	echo"</br>";
	echo"<tr><td>";echo $row['TEXT'];echo"</td></tr>";
	echo"<tr><td>";echo"Upload By:";echo $row['EMPL_ID'];echo"</td></tr>";
	echo "</div>";
echo"</table>";
}
?>