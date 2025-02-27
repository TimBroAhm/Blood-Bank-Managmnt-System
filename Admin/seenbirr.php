<?php
include"../connection/connection.php";
$id=$_GET['id'];
$sql="update booking set Accepted='Yes' where Accepted='$id'";
if(mysqli_query($con,$sql))
{
	echo " Approved successfully";
	//include('Viewtorequesttoapprove.php');
}
else
{
	echo "problem".mysql_error();
}
?>