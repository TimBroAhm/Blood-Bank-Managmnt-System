<?php
include"../connection/connection.php";
session_start();
if (isset($_POST['creatt'])) {
    $uname = $_POST['username'];
    $password = $_POST['password'];
	$rpass=$_POST['rpassword'];
	$pass = base64_encode('$password');
    $emai = $_POST['email'];
 $sql= "UPDATE Account SET PASSWORD ='$pass',EMAIL='$emai'  WHERE USER_NAME='$uname'";
	$result  = mysqli_query($con,$sql);
	if(!$result)
	{
	echo "not be Create".mysql_error();
	}
	else
	{	
echo '<script type="text/javascript">alert("Applay Seccesfully !! ");window:location=\'../login.php\';</script>';
}			
}
?>