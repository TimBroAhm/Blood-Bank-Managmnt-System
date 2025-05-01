<?php
include"../connection/connection.php";
$id=$_GET['id'];
$sql="update Request set APPROVED='Approved' where REQUAST_ID='$id'";
if(mysqli_query($con,$sql))
{
	echo " Approved successfully";
	include('Viewtorequesttoapprove.php');
}
else
{
	echo "problem".mysqli_error();
}
?>