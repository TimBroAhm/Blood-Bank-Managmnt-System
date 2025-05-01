
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

    $result_set = mysqli_query($con,"SELECT *FROM Request where  	ACCEPTED = 'accepted' && APPROVED = 'Not' ");
if(!$result_set)
	{
die("query is failed".mysqli_error());
}
if(mysqli_num_rows($result_set)>0)
{
echo "<table id='vtable' style='width:1200px;border:1px solid #336699;border-radius:10px;' align='center'><font color=white>
<tr>
<th bgcolor='#336699'><font color='white' size='2'>First Name</th>
<th bgcolor='#336699'><font color='white' size='2'>Middle Name</th>
<th bgcolor='#336699'><font color='white' size='2'>Last Name</th>
<th bgcolor='#336699'><font color='white' size='2'>Phone No</th>
<th bgcolor='#336699'><font color=white size='2'>Kebele</th>
<th bgcolor='#336699'><font color=white size='2'>Request to</th>
<th bgcolor='#336699'><font color='white' size='2'>Level</th>
<th bgcolor='#336699'><font color=white size='2'>Bord No</th>
<th bgcolor='#336699'><font color=white size='2'>Operator Licence</th>
<th bgcolor='#336699'><font color=white size='2'>Business Licence</th>
<th bgcolor='#336699'><font color=white size='2'>Insurance Licence</th>
<th bgcolor='#336699'><font color=white size='2'>Requasted Date</th>
<th bgcolor='#336699'><font color=white size='2'>Request Id</th>
<th bgcolor='#336699'><font color=white size='2'>Accept</th>
<th bgcolor='#336699'><font color=white size='2'>Approved</th>
<th bgcolor='#336699'><font color=white size='2' colspan='2'>Options</th>
</tr>";
while($row=mysqli_fetch_array($result_set))
{
$status=$row['APPROVED'];	
echo"<tr>";
echo"<td>";echo $row["FIRST_NAME"]; echo"</td>";
echo"<td>";echo $row["MIDDLE_NAME"]; echo"</td>";
echo"<td>";echo $row["LAST_NAME"]; echo"</td>";
echo"<td>";echo $row["PHONE_NO"]; echo"</td>";
echo"<td>";echo $row["KEBELE"]; echo"</td>";
echo"<td>";echo $row["REQUEST_TO"]; echo"</td>";

echo"<td>";echo $row["LEVEL"]; echo"</td>";
echo"<td>";echo $row["BORD_NO"]; echo"</td>";
echo"<td>";echo "<img src='../images/".$row['OPERATOR_LICENCE']."' width='100' height='50' />" ; echo"</td>";
echo"<td>";echo "<img src='../images/".$row['BUSINESS_LICENCE']."' width='100' height='50' />" ; echo"</td>";
echo"<td>";echo "<img src='../images/".$row['INSURANCE_MEMBER']."' width='100' height='50' />" ; echo"</td>";
echo"<td>";echo $row["REQUASTED_DATE"]; echo"</td>";
echo"<td>";echo $row["REQUAST_ID"]; echo"</td>";
echo"<td>";echo $row["ACCEPTED"]; echo"</td>";
echo"<td>";echo $row["APPROVED"]; echo"</td>";
?>
<td><?php
if(($status)=='Not')
{
?>
<a href="ApproveRequest.php?id=<?php echo $row['REQUAST_ID'];?>" 
 class="act" onclick="return confirm('Are sure to Approved user request')"> Approved?</a>
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
</body>
</html>