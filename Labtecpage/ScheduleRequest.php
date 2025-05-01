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
<?php
include"../connection/connection.php";
if(isset($_POST['serach'])){  
$searchq = $_POST['serach']; 
$query = mysqli_query($con,"SELECT *FROM Request WHERE BORD_NO = '$searchq'") 
or die("could not sea");

while($row= mysqli_fetch_array($query)){
$a1=$row["REQUEST_TO"];
$r2 = $row["LEVEL"];
$r3 = $row["BORD_NO"];	
}
}
echo"</br>";
?>
 
 <!DOCTYPE html>
<html>
<head>
	<title>Schedule Request</title>
<link rel="stylesheet" type="text/css" 
href="../css/schedulerequest.css">

<?php include"../Language/lang.php";?>
<meta charset="utf-8">
</head>
<body bgcolor="white">
<div class="header">
<h1><?php echo htmlspecialchars($lang['schedulerequest']);?></h1>
</div>
<div id="wrapper">
	<form method="POST"action="shedulerequestaction.php"onsubmit="return validate()"name="vfrom"id="cform">
				<style>
	.request select{
	 width:180px;
     height:26px;	
     border-radius:5px;	   
		}
		</style>
		<div class="request"> 
		<label><?php echo htmlspecialchars($lang['updatenew']);?></label>
		<select name="option"id="user"required>
		<option>please choose</option>
		<option>To Update</option>
		<option>New User</option>
		</select>
		<div id="user_error"class="val_error"></div>
		</div>
		<div class="request">
		     <label><?php echo htmlspecialchars($lang['assname']);?></label></br>
		<input type="text"readonly name="asso"value="<?php echo $a1;?>"> 
		</div>
		 <div>
		<label><?php echo htmlspecialchars($lang['bordno']);?></label>
		<input type="text"value="<?php echo $r3;?>"readonly name="bord"class="textInput">
		<div id="ass_error"class="val_error"></div>	
		</div>
		<div>
		<label><?php echo htmlspecialchars($lang['level']);?></label></br>
		<input type="text"readonly name="level" value="<?php echo $r2;?>">
		</div>
		<div>
		    <label><?php echo htmlspecialchars($lang['from']);?></label></br>
			<input type="text" name="intial"class="textInput"id="from"required>
			<div id="from_error"class="val_error"></div>
		</div>
		<div>
		    <label><?php echo htmlspecialchars($lang['to']);?></label></br>
			<input type="text" name="destination"class="textInput"id="to"required>
			<div id="to_error"class="val_error"></div>
		</div>
		
		<div>
			<input type="submit" value="<?php echo htmlspecialchars($lang['register']);?>" class="btn"name="Applay">
			<input type="reset" value="<?php echo htmlspecialchars($lang['reset']);?>" class="btn"name="reset">
		</div>
	</form>
</div>
</body>
</html>
<script>
function lettersOnly(input){
var regex=/[^a-z]/gi;
input.value=input.value.replace(regex,"");
}
</script>
 