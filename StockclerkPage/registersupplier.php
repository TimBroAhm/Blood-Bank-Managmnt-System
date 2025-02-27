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
<title>register supplier</title>
<link rel="stylesheet" type="text/css" href="../css/emloyeestyle.css">
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script src="../js/jquery-3.3.1.js" type="text/javascript"></script>
<script type="text/JavaScript" src="../js/employeeregister.js"> </script>
<meta charset="utf-8">
</head>
<body bgcolor="white">
<div class="header">
<h1>Bid Winner Registratiom form </h1>
</div>
<div id="wrapper">

<form method="POST"action="registersupplier.php"onsubmit="return validate()"name="vfrom" id="cform">

<div>
		<label>Suppier ID<label></br>
<input type="text" name="id"class="textInput" id="id"required>
<span><i id="fname_error"class="val_error"></i></span>
			</div>
			
<div>
		<label>Organization Name<label></br>
<input type="text" name="sn"class="textInput" id="sn"required>
<span><i id="fname_error"class="val_error"></i></span>
			</div>
			
			
			<div>
		<label>Total Price<label></br>
<input type="text" name="price"class="textInput" id="price"required>
<span><i id="fname_error"class="val_error"></i></span>
			</div>
			
<div>
		<label>Country<label></br>
<input type="text" name="co"class="textInput" id="co"required>
<span><i id="fname_error"class="val_error"></i></span>
			</div>
			
			<div>
		<label>City<label></br>
<input type="text" name="city"class="textInput" id="city" required>
<span><i id="fname_error"class="val_error"></i></span>
			</div>
			
			
			<div>
		<label>Phone Number<label></br>
<input type="text" name="phone"class="textInput" id="phone" value="+251"required>
<span><i id="fname_error"class="val_error"></i></span>
			</div>
			
<div>
		<label>Tin Number<label></br>
<input type="text" name="tno"class="textInput" id="tno"required>
<span><i id="fname_error"class="val_error"></i></span>
			</div>
			
			<div>
		<label>DateOfRegistration<label></br>
<input type="date" name="date"class="textInput" id="date" value="<?php echo date('Y-m-d');?>" required>
<span><i id="fname_error"class="val_error"></i></span>
			</div>
				
				<div>
			<input type="submit" value="submit" class="btn"name="register">
			<input type="reset" value="reset" class="btn"name="register">
		</div>
	</form>
	
	</div>


</body>
</html>


<?php
if(isset($_POST["register"]))
{
	$id=$_POST["id"];
	$sn=$_POST["sn"];
	$pr=$_POST["price"];
	$co=$_POST["co"];
	$ci=$_POST["city"];
	$ph=$_POST["phone"];
	$tn=$_POST["tno"];
//	$date=$_POST["date"];
	

	if($con)
	{
		$sql="select * from supplier where supplier_id='$id'";
		$userexist=mysqli_query($con,$sql);
		if(mysqli_affected_rows($con))
			echo "supplier already exist!";
		else
		{
		
			$sql="insert into supplier values('$id','$sn','$co','$ci','$ph','$tn',Now(),'$pr','Winner')";
			$inserted=mysqli_query($con,$sql);
			if(mysqli_affected_rows($con))
				echo "Supplier registered successfully!".mysqli_error($con);
		//header("location:admin.php");
			else	
				echo "Unable to register the supplier";
	
		}
		}
	else
		echo "Connection Failed";
}
?>