<?php
include"../connection/connection.php";
$id=$_REQUEST['id'];
$sql="update shedule_request set PERMISSION='No' where OPERATOR_ID='$id'";
if(mysqli_query($con,$sql))
{
	echo "you Reject Successfully";
	include('Schedulepermissionview.php');
}
else
{
	echo "problem".mysqli_error();
}
?>