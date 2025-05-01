<?php
session_start();
include "../connection/connection.php";
$ctrl = $_REQUEST['key'];
	$query4 = mysqli_query($con,"SELECT * FROM Booking where SideNo='$ctrl'&&UserName='$_SESSION[USER_NAME]'");
	if($query4){
	while($ff=mysqli_fetch_array($query4)){
			$pricee=$ff['Price'];
		}
		$query5 = mysqli_query($con,"SELECT * FROM birrpassenger where UserName='$_SESSION[USER_NAME]' ");

		while($f=mysqli_fetch_array($query5)){
			$bb=$f['Birr'];
		}
		$query6 = mysqli_query($con,"SELECT * FROM adminbirr ");
        while($f=mysqli_fetch_array($query6)){
			$bbb=$f['Birr'];
		}
		$ccc=$bbb-$pricee;
		 $update="update adminbirr set Birr='$ccc' where AccountNo='1000224299722'";
		$a= mysqli_query($con,$update);
		 $cccc=$bb+$pricee;
		 $update1="update birrpassenger set Birr='$cccc' where UserName=UserName='$_SESSION[USER_NAME]' ";
		$b=mysqli_query($con,$update1);
		if($a&&$b){
			$SQL = "DELETE FROM Booking WHERE SideNo = '$ctrl'&&UserName='$_SESSION[USER_NAME]'";
 $aa=mysqli_query($con,$SQL)or die("errr".mysqli_error($con));
		}
		else{
			echo'<script type="text/javascript">alert("Terse is no executed !! ");</script>';
	}}
		else{
			echo'<script type="text/javascript">alert("Terse is no such data in the database !! ");</script>';
		}

mysqli_close($con);

//print "<script>location.href = 'booking.php'</script>";
?>