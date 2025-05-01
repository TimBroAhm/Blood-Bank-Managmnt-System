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
<title>Register Office</title>

<link rel="stylesheet" type="text/css" href="../css/emloyeestyle.css">
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script src="../js/jquery-3.3.1.js" type="text/javascript"></script>
<script type="text/JavaScript" src="../js/employeeregister.js"> </script>
<meta charset="utf-8">

</head>
<body bgcolor="white">
<div class="header">
<h1>Office Registratiom form  </h1>
</div>
<div id="wrapper">

<form method="POST"action="registeroffice.php"onsubmit="return validate()"name="vfrom" id="cform">

<div>
		<label>Office ID<label></br>
<input type="text" name="oid"class="textInput" id="oid">
<span><i id="fname_error"class="val_error"></i></span>
			</div>
			
<div>
		<label>Office Name<label></br>
<input type="text" name="oname"class="textInput" id="oname">
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
	$oid=$_POST["oid"];
	$ocm=$_POST["oname"];
  
	
$server="localhost";
$dbuser="root";
$dbpass="";
$dbname="tms";
$con=mysqli_connect($server,$dbuser,$dbpass,$dbname) or mysqli_error($con);
	if($con)
	{
		$sql="select * from office where office_id='$oid'";
		$userexist=mysqli_query($con,$sql);
		if(mysqli_affected_rows($con))
			echo "office id already exist!";
		else
		{
			
			$sql="insert into office values('$oid','$ocm','Active')";
			$inserted=mysqli_query($con,$sql);
			if(mysqli_affected_rows($con))
				echo "Office registered successfully!";
		//header("location:admin.php");
			else	
				echo "Unable to register the office";
	
		}
		}
	else
		echo "Connection Failed";
}
?>