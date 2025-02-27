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
<td width="700" height="300" rowspan=4 align="center"valign="top" bgcolor="#FFFFFF" class="one"><br><br>
<form action="aview.php" method="post">


<?php
    $result_set = mysqli_query($con,"SELECT *FROM Account where STATUS='1'");
if(!$result_set)
	{
die("query is failed".mysqli_error());
}
if(mysqli_num_rows($result_set)>0)
{
echo "<table id='vtable' style='width:600px;border:1px solid #336699;border-radius:10px;' align='center'><font color=white>
<tr>
<th bgcolor='#336699'><font color='white' size='2'>User ID</th>
<th bgcolor='#336699'><font color='white' size='2'>User Name</th>
<th bgcolor='#336699'><font color='white' size='2'>Password</th>
<th bgcolor='#336699'><font color='white' size='2'>Role</th>
<th bgcolor='#336699'><font color=white size='2'>Email</th>
<th bgcolor='#336699'><font color=white size='2'>Status</th>
<th bgcolor='#336699'><font color=white size='2'>Edite</th>
</tr>";
while($row=mysqli_fetch_array($result_set))
{
$status=$row['STATUS'];	
echo"<tr>";
echo"<td>";echo $row["USER_ID"]; echo"</td>";
echo"<td>";echo $row["USER_NAME"]; echo"</td>";
echo"<td>";echo $row["PASSWORD"]; echo"</td>";
echo"<td>";echo $row["ROLE"]; echo"</td>";
echo"<td>";echo $row["EMAIL"]; echo"</td>";
echo"<td>";echo $row["STATUS"]; echo"</td>";
?>
<td>
<?php
if(($status)=='1')
{
?>
<a href="activateaction.php?status=<?php echo $row['USER_ID'];?>" 
 class="act" onclick="return confirm(' Are You Sure Activate This User')"> activate?</a>
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
   echo '<center>';
  echo '<font face="monotype corsiva" size="5"color="red">account not found !!</font>'; 
  
   echo '</center>';
   }

?>
</body>
</html>