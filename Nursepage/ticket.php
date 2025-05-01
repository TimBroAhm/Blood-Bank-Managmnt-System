<?php
include"../connection/connection.php";
session_start();
if (isset($_POST['Applay']))
	{
  $username=$_POST['asso'];
  $start=$_POST['start'];
  $level=$_POST['level'];
  $destination=$_POST['end'];
  $seatno=$_POST['seatno'];
  $date=$_POST['date'];
  $price=$_POST['price'];
  $sideno=$_POST['bord'];
  $accountno=$_POST['accountno'];
  $phone=$_POST['phone'];
  $prmission= 'No';
 
$query4 = mysqli_query($con,"SELECT * FROM Booking where SideNo='$sideno'&& UserName='$username'");
		if(mysqli_fetch_array($query4)>0)
	{	
echo '<script type="text/javascript">alert("No booking more than once same bus!! ");</script>';
	}
	else//if doesnot predefind account
	{
		$query5 = mysqli_query($con,"SELECT * FROM birrpassenger where UserName='$username' ");
		$query6 = mysqli_query($con,"SELECT * FROM adminbirr where UserName='amare' ");
		while($f=mysqli_fetch_array($query5)){
			$bb=$f['Birr'];
		}
		if($bb>0&&$bb>=$price){
        while($f=mysqli_fetch_array($query6)){
			$bbb=$f['Birr'];
		}
		$ccco=$bbb+$price;
		 $update="update adminbirr set Birr='$ccco' where UserName='amare'";
		 mysqli_query($con,$update);
		 $cccc=$bb-$price;
		 $update1="update birrpassenger set Birr='$cccc' where AccountNo='$accountno'&&UserName='$username' ";
		  mysqli_query($con,$update1);
  $sql="insert into Booking values('$username','$start','$destination','$seatno','$sideno','$price','$accountno','$date','$phone','$prmission')";
  $result  = mysqli_query($con,$sql)or die("errr".mysqli_error($con));
	if(!$result)
	{
	echo "not registerd".mysqli_error();
	}
	else
	{	
echo '<script type="text/javascript">alert("Booked Seccesfully !! ");window:locationa =\'ticket.php\';</script>';
	}}
	else{
			
echo '<script type="text/javascript">alert("Balance is Low !! ");window:locationa =\'ticket.php\';</script>';
	
	}}

       }
   mysqli_close($con);

 ?>