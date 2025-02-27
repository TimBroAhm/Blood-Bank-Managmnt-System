<?php
include"../connection/connection.php";
$id=$_GET['id'];
$sql="update Request set ACCEPTED='Rejected' where REQUAST_ID='$id'";
if(mysqli_query($con,$sql))
{
	echo "you Rejected successfully";
	include('viewrequest.php');
}
else
{
	echo "problem".mysql_error();
}
?>