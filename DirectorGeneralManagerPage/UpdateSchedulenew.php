<?php
session_start();
include"../connection/connection.php";
if(isset($_POST['serach'])){  
$searchq = $_POST['serach']; 
$query = mysqli_query($con,"SELECT *FROM schedule WHERE REQ_ID = '$searchq'") 
or die("could not sea");
//check the data is found in the database
$count = mysqli_num_rows($query);
if($count==0){
 echo'<script type="text/javascript">alert("Terse is no such data in the database !! ");window:location=\'ScheduleUpdatesearch.php\';</script>';	
}
else{
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
$r12=$row["PREPARED_DATE"];		
}
}}
echo"</br>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Schedule update</title>
<link rel="stylesheet" type="text/css" 
href="../css/schedulestyle.css">
<?php include"../Language/lang.php";?>
<meta charset="utf-8">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script src="../js/jquery-3.3.1.js" type="text/javascript"></script>
<script type="text/JavaScript" src="../js/updateschedule.js"> </script>
</head>
<body bgcolor="white">
<div class="header">
<h1><?php echo htmlspecialchars($lang['scheduleupdate']);?></h1>
</div>
<div id="wrapper">
	<form method="POST"action="UpdateScheduleAction.php"onsubmit="return validate()"name="vfrom"id="cform">
			    <label><?php echo htmlspecialchars($lang['bordno']);?></label></br>
			<input type="text" name="bord"readonly value="<?php echo $r2;?>"class="textInput">
			<div id="intial_error"class="val_error"></div>
		<div>
		    <label><?php echo htmlspecialchars($lang['assname']);?></label>
			<input type="text" name="aname"class="textInput"readonly value="<?php echo $r3;?>">
			<div id="ass_error"class="val_error"></div>
		</div>
		
		
		<div>
	    <label><?php echo htmlspecialchars($lang['operatorid']);?></label>
			<input type="text" name="id"readonly value="<?php echo $r4;?>"class="textInput">
			<div id="dname_error"class="val_error"></div>
		</div>
		<div>
		    <label><?php echo htmlspecialchars($lang['from']);?></label></br>
			<input type="text" name="intial" value="<?php echo $r5;?>"class="textInput"id="from">
			<div id="from_error"class="val_error"></div>
		</div>
		<div>
		    <label><?php echo htmlspecialchars($lang['to']);?></label></br>
			<input type="text" name="destination" value="<?php echo $r6;?>"class="textInput"id="to">
			<div id="to_error"class="val_error"></div>
		</div>
		
		<div>
		    <label><?php echo htmlspecialchars($lang['level']);?></label></br>
			<input type="text" name="level"readonly value="<?php echo $r8;?>"class="textInput">
			<div id="intial_error"class="val_error"></div>
		</div>
		<div>
		    <label><?php echo htmlspecialchars($lang['distance']);?></label></br>
			<input type="text" name="distance"value="<?php echo $r10;?>"class="textInput"id="distancee">
			<div id="distancee_error"class="val_error"></div>
		</div>
		<div>
		    <label><?php echo htmlspecialchars($lang['tarif']);?></label></br>
			<input type="text" name="tarif"value="<?php echo $r11;?>"class="textInput"id="tarif">
			<div id="tarif_error"class="val_error"></div>
		</div>
        <div>
		    <label><?php echo htmlspecialchars($lang['prepareddate']);?></label></br>
			<input type="text"readonly name="datt" value="<?php echo $r12;?>"class="textInput">
			<div id="intial_error"class="val_error"></div>
		</div>
		<div>
			<input type="submit" value="<?php echo htmlspecialchars($lang['register']);?>" class="btn"name="Update">
			<input type="reset" value="<?php echo htmlspecialchars($lang['reset']);?>" class="btn"name="reset">
		</div>
	</form>
</div>
</body>
</html>