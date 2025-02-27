<?php 
session_start();
include("../connection/connection.php");
?>
<?php		
if(isset($_POST['Update']))
    {       
	$bordno = $_POST['bord'];
	$id=$_POST['id'];
	$workp= $_POST['intial'];
	$dest= $_POST['destination'];
	$le= $_POST['level'];
	$perepar=date('Y-m-d H:i:s', time());
	$distanc= $_POST['distance'];
	$tari=$_POST['tarif'];
	$status=$_POST['status'];
 $sql= mysqli_query($con,"UPDATE schedule SET BORD_NUMBER='$bordno', REQ_ID='$id' 
		 ,INITIAL_PLACE='$workp',DESTINATION_PLACE='$dest',PREPARED_DATE='$perepar',DISTANCE='$distanc',TARIFF='$tari',STATUS='$status' where REQ_ID='$id'");
			if($sql){
$ma=mysqli_query($con,"INSERT INTO schedule_backup values ('$bordno','$id','$workp','$dest',Now(),'$le','$distanc','$tari','$status')" )or die(mysql_error());
		if($ma){
echo '<script type="text/javascript">alert("Updated/Inserted Seccesfully !! ");window:location=\'ScheduleUpdatesearch.php\';</script>';
		}			
				
	else{
		echo"not inserted";
	}
	/*
	echo"Update seccesfully";
	header("Location: UpdateSchedulenew.php");		*/	
}}
mysqli_close($con);
?>
	