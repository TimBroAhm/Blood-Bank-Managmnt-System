<?php
include"../connection/connection.php";
$id=$_REQUEST['id'];
$sql="update Shedule_request set PERMISSION='Yes' where OPERATOR_ID='$id'";
if(mysqli_query($con,$sql))
{
	echo '<script type="text/javascript">alert("Approve Seccesfully !! ");</script>';
	include('Schedulepermissionview.php');
}
else
{
	echo "problem".mysql_error();
}
?>