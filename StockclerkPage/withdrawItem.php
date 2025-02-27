<?php
include("../connection/connection.php");  
 session_start();
if(isset($_SESSION['USER_ID']))
 {
  $mail=$_SESSION['USER_ID'];
 } else {
 ?>

<script>
  alert('You are not logged In !! Please Login to access this page');
  alert(window.location='../login.php');
 </script>
 <?php
 }
 ?>


<html>

<head>
<title>Register item withdraw</title>
<link rel="stylesheet" type="text/css" href="../css/emloyeestyle.css">
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script src="../js/jquery-3.3.1.js" type="text/javascript"></script>
<script type="text/JavaScript" src="../js/employeeregister.js"> </script>
<meta charset="utf-8">
</head>

<body bgcolor="white">
<div class="header">
<h1>Item withdraw Registratiom Form</h1>
</div>

<div id="wrapper">

<form method="POST"action="withdrawItem.php"onsubmit="return validate()"name="vfrom" id="cform">

<div>
		<label>Wthdraw ID<label></br>
<input type="text" name="wit"class="textInput" id="wit">
<span><i id="fname_error"class="val_error"></i></span>
			</div>
			
			<div>
		<label>Item Register ID</label></br>
			<input type="text" name="id"class="textInput" id="id" >
			<span><i id="fathername_error"class="val_error"></i></span>
                </div><div>
				<label>Reciver Employe ID</label></br>
			<input type="text" name="re"class="textInput" id="re" >
			<span><i id="fathername_error"class="val_error"></i></span>
                </div>
				
				<div>
		<label> DateOf_Register</label></br>
			<input type="date" name="date"class="textInput" id="date" value="<?php echo date('Y-m-d')?>">
			<span><i id="grandfather_error"class="val_error"></i></span>
                </div>

			
				<div>
			<input type="submit" value="submit" class="btn"name="register">
			<input type="reset" value="reset" class="btn"name="register">
		</div>
	</form>
	
	</div>		        <?php
if(isset($_POST["register"]))
{
	$id=$_POST["wit"];
	$fn=$_POST["id"];
	//$mn=$_POST["st"];
	$ln=$_POST["re"];
	//$date=$_POST["date"];
	$sql = mysqli_query($con,"SELECT * FROM employee where Employee_id='$ln' && Employe_status='onduty'");
if(mysqli_affected_rows($con))
{

	if($con)
	{
		$sql1="select * from item_withdraw where withdraw_id='$id' or item_Register_ID='$fn'";
		$userexist=mysqli_query($con,$sql1);
		if(mysqli_affected_rows($con))
			echo "Item already exist".mysqli_error($con) ;
			
		else
		{
			
			$sql1="insert into item_withdraw values('$id','$fn','100','$ln',Now())";
			$inserted=mysqli_query($con,$sql1);
			if(mysqli_affected_rows($con))
			{					
      $sql2="update item  set  status='Block' where item_Register_ID='$fn'";
			$inserted1=mysqli_query($con,$sql2);
			 $sql2="update allowedemployee  set  status='Block' where Employee_id='$ln'";
			$inserted1=mysqli_query($con,$sql2);
			if($inserted1)	
			
				echo "Item registered successfully!";
				
			}
		//header("location:admin.php");
			else	
				echo "Unable to register the item";
		}
		}
	else
		echo "Connection Failed";
}
	else
		echo "Employee is not onduty or not an employee!";
}
?>

</body>
</html>
