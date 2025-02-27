<?php
include("../connection/connection.php");  
 session_start();
if(isset($_SESSION['USER_ID']))
 {
  $mail=$_SESSION['USER_ID'];
 } else {
 ?>

<script>
  alert('You are not logged In !! Please Login to access this page');
  alert(window.location='../login.php');
 </script>
 <?php
 }
 ?>
<html>
<head>
<?php include"../Language/lang.php";?>
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
<form action="booking.php" method="post">
<label><?php echo htmlspecialchars($lang['enterid']);?>:</label></br>
<input type="text" name="serach" placeholder="" required="required"/>
<input type="submit" value=">>"/>
</form>
</div>
</body>
</html>
<?php

if(isset($_POST['serach'])){  
$searchq = $_POST['serach']; 
$UserName=$_SESSION['USER_NAME'];
$query = mysqli_query($con,"SELECT *FROM booking WHERE SideNo = '$searchq'&&UserName='$UserName'&&Accepted='Yes'") 
or die("could not sea");
$username= $_SESSION['USER_NAME'];
$count = mysqli_num_rows($query);
if($count==0){
 echo'<script type="text/javascript">alert("Terse is no such data in the database !! ");</script>';	
}
else{
		echo "<table id='vtable' style='width:700px;border:1px solid #336699;border-radius:10px;' align='center'><font color=white>
<tr>
<th bgcolor='#336699'><font color='white' size='2'>UserName</th>
<th bgcolor='#336699'><font color=white size='2'>Started</th>
<th bgcolor='#336699'><font color=white size='2'>Destination</th>
<th bgcolor='#336699'><font color=white size='2'>SeatNo</th>
<th bgcolor='#336699'><font color=white size='2'>SideNo</th>
<th bgcolor='#336699'><font color=white size='2'>Price</th>
<th bgcolor='#336699'><font color=white size='2'>AccountNo</th>
<th bgcolor='#336699'><font color=white size='2'>Date</th>
<th bgcolor='#336699'><font color=white size='2'>Phone</th>
<th bgcolor='#336699'><font color=white size='2'>Action</th>
</tr>";
$counter=0;
	while($row= mysqli_fetch_array($query)){
		$cc=$row["SideNo"];
		$counter=0;
	echo"<tr>";

echo"<td>";echo $row["UserName"]; echo"</td>";
echo"<td>";echo $row["Started"]; echo"</td>";
echo"<td>";echo $row["Destination"]; echo"</td>";
echo"<td>";echo $row["SeatNo"]; echo"</td>";	
echo"<td>";echo $row["SideNo"]; echo"</td>";
echo"<td>";echo $row["Price"]; echo"</td>";
echo"<td>";echo $row["AccountNo"]; echo"</td>";
echo"<td>";echo $row["Date"]; echo"</td>";
echo"<td>";echo $row["Phone"]; echo"</td>";

?>
<td align="center"><a href="a.php?key=<?php echo $cc;?>" onclick="return confirm('Are you sure you want to delete ');"><img src="../images/actions-delete.png" height='20' width='20'/></a></td>
	<?php
	}
	
}

echo"</tr>";
echo "</table>";}
?>

