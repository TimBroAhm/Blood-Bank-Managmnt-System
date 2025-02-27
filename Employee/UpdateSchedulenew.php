<?php
session_start();
include"../connection/connection.php";
if(isset($_POST['serach'])){  
$searchq = $_POST['serach']; 
$query = mysqli_query($con,"SELECT *FROM schedule WHERE BORD_NUMBER = '$searchq'") 
or die("could not sea");
while($row= mysqli_fetch_array($query)){
$r2 = $row["BORD_NUMBER"];
$r3= $row["ASSOCIATION_NAME"];
$r4= $row["REQ_ID"]; 
$r5= $row["INITIAL_PLACE"]; 
$r6= $row["DESTINATION_PLACE"]; 
$r8=$row["LEVEL"];
$r9= $row["PREPARED_DATE"];	
$r10= $row["DISTANCE"];	
$r11= $row["TARIFF"];
		
}
}
echo"</tr>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Schedule update</title>
<link rel="stylesheet" type="text/css" 
href="../css/schedulestyle.css">
</head>
  <style>
	.ass select{
	 width:180px;
     height:26px;	
     border-radius:5px;	   
		}
	
</style>
<body bgcolor="white">
<div class="header">
<h1> Controller</h1>
</div>
<div id="wrapper">
	<form method="POST"action="UpdateScheduleAction.php"onsubmit="return validate()"name="vfrom">
        		<div class="ass">
<label>Current Time</label><br>
	<select type="text" name="status"class="select" style="font-size: 16pt" id="level">
		<option></option>
		<option>InKocha</option>
		<option>OutKocha </option>
	</select>
	<span class="error_form" id="level_error"></span>
</div>
			    <label>Bord No</label></br>
			<input type="text" name="bord"readonly value="<?php echo $r2;?>"class="textInput">
			<div id="intial_error"class="val_error"></div>
		<div>
		    <label>Association Name</label>
			<input type="text" name="aname"class="textInput"readonly value="<?php echo $r3;?>">
			<div id="ass_error"class="val_error"></div>
		</div>
		
		
		<div>
	    <label> Operator ID</label>
			<input type="text" name="id"readonly value="<?php echo $r4;?>"class="textInput">
			<div id="dname_error"class="val_error"></div>
		</div>
		<div>
		    <label>From</label></br>
			<input type="text" name="intial"readonly value="<?php echo $r5;?>"class="textInput">
			<div id="intial_error"class="val_error"></div>
		</div>
		<div>
		    <label>To</label></br>
			<input type="text" name="destination"readonly value="<?php echo $r6;?>"class="textInput">
			<div id="intial_error"class="val_error"></div>
		</div>
		
		<div>
		    <label>Level</label></br>
			<input type="text" name="level"readonly value="<?php echo $r8;?>"class="textInput">
			<div id="intial_error"class="val_error"></div>
		</div>
		<div>
		    <label>Distance</label></br>
			<input type="text" name="distance"readonly value="<?php echo $r10;?>"class="textInput">
			<div id="intial_error"class="val_error"></div>
		</div>
		<div>
		    <label>Tariff</label></br>
			<input type="text" name="tarif"readonly value="<?php echo $r11;?>"class="textInput">
			<div id="intial_error"class="val_error"></div>
		</div>
		

		<div>
			<input type="submit" value="Register" class="btn"name="Update">
			<input type="reset" value="Reset" class="btn"name="reset">
		</div>
	</form>
</div>
</body>
</html>