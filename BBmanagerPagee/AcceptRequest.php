
<?php
include"../connection/connection.php";
$id=$_GET['id'];
$sql="update Request set ACCEPTED='accepted' where REQUAST_ID='$id'";
if(mysqli_query($con,$sql))
{
	echo '<script type="text/javascript">alert("Approve Seccesfully !! ");</script>';
	include('viewrequest.php');
}
else
{
	echo "problem".mysqli_error();
}
?>