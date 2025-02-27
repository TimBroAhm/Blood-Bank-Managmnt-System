<?php
session_start();
include("../connection/connection.php");
?>
<html>

<head>
<title> Register employee </title>
<link rel="stylesheet" type="text/css" 
href="Requestformstyle.css">

 <script src="js/jquery-3.3.1.js" type="text/javascript"></script>
 <script src="js/requestform.js" type="text/javascript"></script>
<meta charset="utf-8">
</head>

<body bgcolor="white">

<div class="header">
<h1>Employee Registratiom form</h1>
</div>

<div id="wrapper">


<form method="POST"action="registeremployee.php"onsubmit="return validate()"name="vfrom" id="cform">

<div>
		<label>Employe ID<label></br>
<input type="text" name="id"class="textInput" id="idd">
<span><i id="idd_error"class="val_error"></i></span>
			</div>
			
			<div>
		<label>First Name</label></br>
			<input type="text" name="fnn"class="textInput" id="fn" >
			<span><i id="fathername_error"class="val_error"></i></span>
                </div><div>
				<label>Middle Name</label></br>
			<input type="text" name="fathername"class="textInput" id="mn" >
			<span><i id="mn_error"class="val_error"></i></span>
                </div>
				
				<div>
		<label> Last Name</label></br>
			<input type="text" name="mnn"class="textInput" id="ln">
			<span><i id="grandfather_error"class="val_error"></i></span>
                </div>

<div>
		    <label>Sex</label></br>
		<select type="text" name="sex" id="kebel" class="textInput">
		<option>Select Sex</option>
		<option>Male</option>
		<option>Female</option>
		
		</select>
			<span> <i id="kebele_error"class="val_error"></i></span>
		</div>
		
		<div>
		<label>Email</label></br>
			<input type="email" name="email"class="textInput" id="email">
			<span><i id="email_error"class="val_error"></i></span>
                </div>
				<div>
		<label>collage_Id </label></br>
		
	<select name="request" id="request" class="textInput">
	<option>request to---</option>
	
<?php

   $cdquery="SELECT *FROM Association";
            $cdresult=mysqli_query($con,$cdquery);
            
            while ($cdrow=mysqli_fetch_array($cdresult)) {
     ?>
	 <option><?php echo $cdrow['ASSOCIATION_NAME'];?></option>
	 <?php
            
            }

            ?>
    
        </select>
		<span id="request_error"class="val_error"></span>
		</div>
		<div>
		<label>DateOfRegistration</label></br>
			<input type="text" name="date"class="textInput" value="<?php echo date('Y-m-d')?>" id="ln">
			<span><i id="grandfather_error"class="val_error"></i></span>
                </div>
				
				<div>
			<input type="submit" value="submit" class="btn"name="register">
			<input type="reset" value="reset>" class="btn"name="register">
		</div>
	</form>
	
	</div>
	</fieldset>
</body>
</html>

<?php
if(isset($_POST["register"]))
{
	$id=$_POST["id"];
	$fn=$_POST["fnn"];
	$mn=$_POST["fathername"];
	$ln=$_POST["mnn"];
	$sex=$_POST["sex"];
	$email=$_POST["email"];
	$po=$_POST["request"];
	//$status=$_POST["status"];
	$date=$_POST["date"];

	if($con)
	{
		$sql="select * from employee where Employee_id='$id'";
		$userexist=mysqli_query($con,$sql);
		if(mysqli_affected_rows($con))
			echo "Employee already exist" ;
		else
		{
			
			$sql="insert into employee values('$id','$fn','$mn','$ln','$sex','$email','$po','onduty',Now())";
			$inserted=mysqli_query($con,$sql);
			if(mysqli_affected_rows($con))
				echo "Employee registered successfully!";
		//header("location:admin.php");
			else	
				echo "Unable to register the user";
	
		}
		}
	else
		echo "Connection Failed";
}
?>
