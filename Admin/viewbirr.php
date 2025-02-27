
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
</head>
<body>
<table border="0"  width="710"height="450"  align="center">
<tr ><td width="210" align="center" valign="center" >
<td width="1200" height="300" rowspan=4 align="center"valign="top" bgcolor="#FFFFFF" class="one"><br><br>
<form action="viewactiveuser.php" method="post">
<?php
$result_set1 = mysqli_query($con,"SELECT *FROM adminbirr where UserName='amare'");
$row11= mysqli_fetch_array($result_set1);
echo "<font face='monotype corsiva' size='5'color='red'><center><b>Total Balance From Each Passenger &nbsp;=&nbsp;";
echo $row11['Birr'];echo"&nbsp;&nbsp;";
echo"</b></center></font>";
    $result_set = mysqli_query($con,"SELECT *FROM booking where Accepted = 'No'")or die("errr".mysqli_error($con));
if(!$result_set)
	{
die("query is failed".mysql_error());
}
if(mysqli_num_rows($result_set)>0)
{
echo "<table id='vtable' style='width:1200px;border:1px solid #336699;border-radius:10px;' align='center'><font color=white>
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
<th bgcolor='#336699'><font color=white size='2'>Accept</th>
</tr>";
while($row=mysqli_fetch_array($result_set))
{
$status=$row['Accepted'];	
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
<td><?php
if(($status)=='No')
{
?>
<a href="seenbirr.php?id=<?php echo $row['Accepted'];?>" 
 class="act" onclick="return confirm('Are sure to Approved user request')"> Appcepted?</a>
<?php
}
?>
</td>
<?php
echo"</tr>";
}
echo "</table>";

}

?>
<?php
    
?>
</body>
</html>