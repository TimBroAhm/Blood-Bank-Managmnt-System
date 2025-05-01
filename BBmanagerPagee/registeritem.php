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
<title>register item</title>
<link rel="stylesheet" type="text/css" href="../css/emloyeestyle.css">
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script src="../js/jquery-3.3.1.js" type="text/javascript"></script>
<script type="text/JavaScript" src="../js/employeeregister.js"> </script>
<meta charset="utf-8">

</head>
<body bgcolor="white">
<div class="header">
<h1>New Item  Registration form</h1>
</div>
<div id="wrapper">

<form method="POST"action="registeritem.php"onsubmit="return validate()"name="vfrom" id="cform">

<div>
		<label>Item Register ID<label></br>
<input type="text" name="id"class="textInput" id="id">
<span><i id="fname_error"class="val_error"></i></span>
			</div>
			
<div>
		<label>Serial Numder<label></br>
<input type="text" name="sno"class="textInput" id="sno">
<span><i id="fname_error"class="val_error"></i></span>
			</div>


<div>
		<label>Item Name</label></br>
			<input type="text" name="mo"class="textInput" id="mo" >
			<span><i id="fathername_error"class="val_error"></i></span>
                </div>

<div>
		<label>Catagory</label></br>
			<select name="ca"required="true" >
<option value=" "> choose</option>
<option value="fixed">fixed</option>
<option value="non_fixed">non_fixed</option></select>
			<span><i id="fathername_error"class="val_error"></i></span>
                </div>
				
				
<div>
		<label>Descrption </label></br>
			<input type="text" name="de"class="textInput" id="de" >
			<span><i id="fathername_error"class="val_error"></i></span>
                </div>

<div>
		<label>Shelf Number </label></br>
			<input type="text" name="sh"class="textInput" id="sh" >
			<span><i id="fathername_error"class="val_error"></i></span>
                </div>
<div>
		<label> Request ID </label></br>
			<input type="text" name="re"class="textInput" id="re" >
			<span><i id="fathername_error"class="val_error"></i></span>
                </div>
				<div>
		<label> Supplier ID </label></br>
			<input type="text" name="siid"class="textInput" id="siid" >
			<span><i id="fathername_error"class="val_error"></i></span>
                </div>
				
				<div>
		<label> Stockclerk ID </label></br>
			<input type="text" name="sid"class="textInput" id="sid" >
			<span><i id="fathername_error"class="val_error"></i></span>
                </div>
				
				
				<div>
		<label> Item Price </label></br>
			<input type="text" name="price"class="textInput" id="price" >
			<span><i id="fathername_error"class="val_error"></i></span>
                </div>



				<div>
		<label> DateOfRegister</label></br>
			<input type="date" name="date"class="textInput" id="date" value="<?php echo date('Y-m-d')?>">
			<span><i id="fathername_error"class="val_error"></i></span>
                </div>
				
				
				
				<div>
			<input type="submit" value="submit" class="btn"name="register">
			<input type="reset" value="reset" class="btn"name="register">
		</div>
	</form>
	
	</div>


<?php
if(isset($_POST["register"]))
{
	$id=$_POST["id"];
	$sno=$_POST["sno"];
	$mo=$_POST["mo"];
	$ca=$_POST["ca"];
	$de=$_POST["de"];
	$sh=$_POST["sh"];
	$re=$_POST["re"];
	$siid=$_POST["siid"];
	$sid=$_POST["sid"];
	$pr=$_POST["price"];
	if($con)
	{
		$sql="select * from item where item_Register_ID='$id'";
		$userexist=mysqli_query($con,$sql);
		if(mysqli_affected_rows($con))
			echo "Item already exist!";
		else
		{
			
			$sql="insert into item values('$id','$sno','$mo','$ca','$de','$sh','$re','$siid','$sid','$pr',Now())";
			$inserted=mysqli_query($con,$sql);
			if(mysqli_affected_rows($con)){
				
			 $sql2="update supplier  set  status='Taken' where supplier_id='$siid'";
			$inserted1=mysqli_query($con,$sql2);
			 if($inserted1)
				echo "Item registered successfully!";
				}
			else	
				echo "Unable to register the user";
		}
		
		} 
	else
		echo "Connection Failed";
}?>

 
</body>
</html>
