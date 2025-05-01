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
<title>Register item transfer</title>
<link rel="stylesheet" type="text/css" href="../css/emloyeestyle.css">
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script src="../js/jquery-3.3.1.js" type="text/javascript"></script>
<script type="text/JavaScript" src="../js/employeeregister.js"> </script>
<meta charset="utf-8">

</head>
<body bgcolor="white">
<div class="header">
<h1>Item Transfer Registration Form </h1>
</div>
<div id="wrapper">

<form method="POST"action="TransferItem.php"onsubmit="return validate()"name="vfrom" id="cform">

<div>
		<label>Wthdraw ID<label></br>
<input type="text" name="wid"class="textInput" id="wid">
<span><i id="fname_error"class="val_error"></i></span>
			</div>
			
<div>
		<label>Transfer Employe ID<label></br>
<input type="text" name="teid"class="textInput" id="teid">
<span><i id="fname_error"class="val_error"></i></span>
			</div>
			
			
			<div>
		<label>Reciver Employe ID<label></br>
<input type="text" name="reid"class="textInput" id="reid">
<span><i id="fname_error"class="val_error"></i></span>
			</div>
			
<div>
		<label>Witness Employe ID<label></br>
<input type="text" name="weid"class="textInput" id="weid">
<span><i id="fname_error"class="val_error"></i></span>
			</div>
			
			<div>
		<label>DateOf Register<label></br>
<input type="date" name="date"class="textInput" id="date">
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
	//$id=$_POST["tid"];
	$wid=$_POST["wid"];
	$td=$_POST["teid"];
	$rid=$_POST["reid"];
	$weid=$_POST["weid"];
	//$date=$_POST["date"];
	

	if($con)
	{
		$sql="select * from item_transfer where  withdraw_id='$wid'";
		$userexist=mysqli_query($con,$sql);
		if(mysqli_affected_rows($con))
			echo "Item already exist" ;
		else
		{
			
			$sql="insert into item_transfer values('','$wid','$td','$rid','$weid',Now())".mysqli_error($con);
			$inserted=mysqli_query($con,$sql);
			
			//if(mysqli_affected_rows($con))
			if($inserted)
			{
				$sql="select * from item_withdraw where Employee_id='$td'";	
				
				$matchfound1=mysqli_query($con,$sql);
      if($row=mysqli_fetch_assoc($matchfound1))
                $emptransid=$row['Employee_id'];
                $sql5=mysqli_query($con,"select * from employee where Employee_id='$emptransid'");
			  $sql2="update item_withdraw  set  Employee_id='$rid' where Employee_id='$emptransid'";
			$inserted1=mysqli_query($con,$sql2);
			if($inserted1)	
			
				echo "Item registered successfully!";
		//header("location:admin.php");
			else	
				echo " register the item".mysqli_error($con);
	}
	else 
	echo "not inserted".mysqli_error($con);
		}
		}
	else
		echo "Connection Failed";
}
?>
