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
<link rel="stylesheet"
type="text/css"
href="../css/f.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script src="../js/jquery-3.3.1.js" type="text/javascript"></script>
 <script src="../js/associationregister.js" type="text/javascript"></script>
 <meta charset="utf-8">
 <?php include'../Language/lang.php';?>
</head>
<body>
<div class="header">
<h1><?php echo htmlspecialchars($lang['assm']);?></h1>
</div>
<form method="POST"action="associationregistration.php" onsubmit="return Validate()"name="vform"id="cform">
<div class="input-group">
<label><?php echo htmlspecialchars($lang['assname']);?> </label>
<input type="text" name="Asso_Name"placeholder="Association Name"  id="uid" placeholder=""onkeyup="lettersOnly(this)">
<span><i id="aname_error"></i></span>
</div>
<div class="input-group">
<label><?php echo htmlspecialchars($lang['phone']);?></label>
<input type="text"id="em"name="Phone_No"placeholder="phone number"><span><i id="phone_error"></i></span>
</div>
<div class="input-group">
<label><?php echo htmlspecialchars($lang['assmaname']);?></label>
<input type="text" name="Man_Name"id="pass"placeholder="association manager" placeholder=""onkeyup="lettersOnly(this)"><span><i id="amanager_error"></i></span>
</div>
	<style>
	.manager select{
	 width:245px;
	 border-radius:3px;
	 height:25px;
	 font-family:cambria;
	 font-size:12px;
	 
		}
		</style>
<div class="manager">
			<label><?php echo htmlspecialchars($lang['idno']);?></label></br>
	<select type="text" name="manid"class="select" style="font-size: 16pt" id="managerid">
	<option>please choose</option>
<?php

   $cdquery="SELECT *FROM Employee";
            $cdresult=mysqli_query($con,$cdquery);
            
            while ($cdrow=mysqli_fetch_array($cdresult)) {
     ?>
	 <option><?php echo $cdrow['EID'];?></option>
	 <?php
            
            }

            ?>
    
        </select>
		<span class="error_form" id="managerid_error"></span>
		</div>
<div class="manager">
<label><?php echo htmlspecialchars($lang['level']);?></label><br>
	<select type="number" name="level2"class="select" style="font-size: 16pt" id="level">
		<option>please choose</option>
		<option>1</option>
		<option>2</option>
		<option>3</option>
	</select>
	<span class="error_form" id="level_error"></span>
</div>
<div class="input-group">
<button type="submit" name="register" class="btn"><?php echo htmlspecialchars($lang['register']);?></button>
<button type="reset" name="Reset" class="btn"><?php echo htmlspecialchars($lang['reset']);?></button>
</div>
</form>
</body>
</html>
<script>
function lettersOnly(input){
var regex=/[^a-z]/gi;
input.value=input.value.replace(regex,"");
}
function numbersOnly(input){
var regex=/[^0-9]/gi;
input.value=input.value.replace(regex,"");
}
</script>

 <?php

if (isset($_POST['register']))
	{
    $asso=$_POST['Asso_Name'];
	$formedd = date("d-m-y");
	$phone = $_POST['Phone_No'];
	$man = $_POST['Man_Name'];
	$managerid=$_POST['manid'];
	$lvl = $_POST['level2'];
	echo "$_SESSION[USER_ID]";
   "</br>";
   $sql="insert into association values('$_SESSION[USER_ID]','','$asso','$formedd','$phone','$man','$managerid','$lvl')";

$result  = mysqli_query($con,$sql);
	if(!$result)
	{
	echo "not registerd".mysqli_error();
	}
	else
	{	
echo '<script type="text/javascript">alert("Register Seccesfully !! ");window:locationa =\'associationregistration.php\';</script>';
}
}

 ?>