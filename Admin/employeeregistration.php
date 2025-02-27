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
<!DOCTYPE html>
<html>
<head>
	<title>employee registration</title>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="../css/emloyeestyle.css">
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script src="../js/jquery-3.3.1.js" type="text/javascript"></script>
<script type="text/JavaScript" src="../js/employeeregister.js"> </script>
<meta charset="utf-8">
<?php include'../Language/lang.php';?>
</head>
<body bgcolor="white">
<div class="header">
<h1><?php echo htmlspecialchars($lang['empl']);?> </h1>
</div>
<div id="wrapper">
	<form method="POST" action="employeeregistration.php" id="employeeregistration" onsubmit="return validate()"name="vfrom">
		<div>
		<label><?php echo htmlspecialchars($lang['first']);?></label></br>
		<input type="text" name="fname" class="textInput"id="fname" placeholder=""onkeyup="lettersOnly(this)">
		<span><i id="fname_error" ></i></span>
		</div>
		<div>
		<label><?php echo htmlspecialchars($lang['second']);?></label></br>
		<input type="text" name="faname"class="textInput" id="mname" placeholder=""onkeyup="lettersOnly(this)">
		<span><i id="mname_error"></i></span>
		</div>
		<div>
		<label><?php echo htmlspecialchars($lang['last']);?></label></br>
		<input type="text" name="lname"class="textInput" id="lname"placeholder=""onkeyup="lettersOnly(this)">
		<span><i id="lname_error"></i></span>
		</div>
		<div>
		<label><?php echo htmlspecialchars($lang['sex']);?></label><br>
	<select type="text" name="sex" id="sexx" class="textInput">
		
		<option>please choose</option>
		<option>Male</option>
		<option>Female</option>
	</select>
	<span><i id="sex_error"></i></span>
		</div>
		<div>
		    <label><?php echo htmlspecialchars($lang['dateofbirth']);?></label></br>
			<input type="date" name="dob"class="textInput" max ="2001-01-01" id="dbrith"placeholder=""onkeyup="numbersOnlyfordate(this)">
			<span><i id="dbrith_error"></i></span>
		</div>
		<div>
		    <label><?php echo htmlspecialchars($lang['phone']);?></label></br>
			<input type="text" name="phone"class="textInput"id="phon">
			<span><i id="phone_error"></i></span>
		</div>
		<div>
		    <label><?php echo htmlspecialchars($lang['kebele']);?></label></br>
			<input type="text" name="kebele"class="textInput"id="kebel">
			<span><i id="kebele_error"></i></span>
		</div>
		<div>
		<label> <?php echo htmlspecialchars($lang['qualification']);?></label></br>
			<input type="text" name="qualification"class="textInput"id="qualif" placeholder=""onkeyup="lettersOnly(this)">
			<span><i id="qualif_error"></i></span>
		</div>
		<div>
		<label> <?php echo htmlspecialchars($lang['role']);?></label><br>
			<select type="text" name="role" class="textInput"id="rol" >
		<option>-Select Role-</option>
		<option>System Admin</option>
		<option>Director General</option>
		<option>Deputy Director General</option>
		<option>General Service Excutive Offic</option>
		<option>Employee</option>
		<option>Stockclerk</option>
		</select><span><i id="role_error"></i></span>
		</div>
		<div>
		<input type="submit" value="<?php echo htmlspecialchars($lang['submit']);?>" class="btn" name="register">
		<input type="reset" value="<?php echo htmlspecialchars($lang['reset']);?>" class="btn"name="reset">
		</div>
	</form>
</div>
</body>
</html>

 <?php
if (isset($_POST['register']))
	{
	$fn = $_POST['fname'];
	$fan = $_POST['faname'];
	$la = $_POST['lname'];
	$sx = $_POST['sex'];
	$dobirth = $_POST['dob'];
	$phon = $_POST['phone'];
	$keb = $_POST['kebele'];
	$quali = $_POST['qualification'];
	$ro = $_POST['role'];
  $un = $_SESSION['USER_ID'];
$sql="insert into employee1 values('','$fn','$fan','$la','$sx','$dobirth','$phon','$keb','$quali','$ro','$un')";
$result  = mysqli_query($con,$sql);
	if(!$result)
	{
	echo "not registerd".mysql_error();
	}
	else
	{	
echo '<script type="text/javascript">alert("Register Seccesfully !! ");window:location=\'employeeregistration.php\';</script>';
			

}
}

 ?>