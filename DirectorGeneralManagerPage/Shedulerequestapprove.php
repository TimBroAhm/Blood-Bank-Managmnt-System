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
$result_set = mysqli_query($con,"SELECT *FROM shedule_request where PERMISSION = 'Yes' &&  PREPARED = 'Ok'");
if(!$result_set)
	{
die("query is failed".mysql_error());
}
if(mysqli_num_rows($result_set)>0)
{
echo "<table id='vtable' style='width:800px;border:1px solid #336699;border-radius:10px;' align='center'><font color=white>
<tr>
<th bgcolor='#336699'><font color='white' size='2'>Operator ID</th>
<th bgcolor='#336699'><font color='white' size='2'>Request For</th>
<th bgcolor='#336699'><font color='white' size='2'>Association Name</th>
<th bgcolor='#336699'><font color='white' size='2'>From</th>
<th bgcolor='#336699'><font color='white' size='2'>To</th>
<th bgcolor='#336699'><font color=white size='2'>Permission</th>
<th bgcolor='#336699'><font color=white size='2'>Prepared</th>
<th bgcolor='#336699'><font color=white size='2'>Option</th>
</tr>";
while($row=mysqli_fetch_array($result_set))
{
$status=$row['PREPARED'];	
echo"<tr>";
echo"<td>";echo $row["OPERATOR_ID"]; echo"</td>";
echo"<td>";echo $row["REQUEST_FOR"]; echo"</td>";
echo"<td>";echo $row["ASSOCATION_NAME"]; echo"</td>";
echo"<td>";echo $row["FROM"]; echo"</td>";
echo"<td>";echo $row["TO"]; echo"</td>";
echo"<td>";echo $row["PERMISSION"]; echo"</td>";
echo"<td>";echo $row["PREPARED"]; echo"</td>";
?>
<td><?php
if(($status)=='Ok')
{
?>
<a href="Done.php?id=<?php echo $row['OPERATOR_ID'];?>" 
 class="act" onclick="return confirm('Are sure to accept user request')"> Done?</a>
<?php
}
?>
</td>
<?php
echo"</tr>";
}
echo "</table>";

}
else{
echo '<script type="text/javascript">alert("No New Request!! ");</script>';
}	
?>
</body>
</html>