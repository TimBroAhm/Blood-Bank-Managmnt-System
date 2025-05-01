 <?php
 session_start();
 include "../connection/connection.php";
if (isset($_POST['register']))
	{
    $fn=$_POST['fname'];
	$ph = $_POST['phone'];
	$mn = $_POST['adress'];
	$ln = $_POST['ag'];
	$req = $_POST['birr'];
	$lev = $_POST['level1'];
	//$keb = $_POST['bordno'];
	$fixed = '1000';

$accountNo = $fixed.mt_rand( 100000000, 999999999);
	   $year=date("Y")-8;// starting id generation 
    $counter_res=mysqli_query($con,"select * from birrpassenger");
    $counter=mysqli_num_rows($counter_res);
    $varx=$counter+1;
      if($varx<10)
      {
          $d="000";
      }
      elseif ($varx<100) {
      	   $d="00";
      }
      elseif ($varx<1000) {
   	      $d="0";
      }
      else {
   	   $d="";
      }
      $kebeleid=$year.$d.$varx;
	   $query = mysqli_query($con,"SELECT *FROM birrpassenger where UserName='$fn'");
	   if(!$query)
	{
	echo '<script type="text/javascript">alert("UserName Already Exists !! ");window:location=\'Requestformm.php\';</script>';
	}
	else
	{	

 $sql="insert into birrpassenger values('$fn','$ph','$mn','$ln','$lev','$req','$accountNo','$kebeleid')";
$result  = mysqli_query($con,$sql);
	if(!$result)
	{
	echo "not registerd".mysql_error();
	}
	else
	{	
echo '<script type="text/javascript">alert("Register Seccesfully !! ");window:location=\'Requestformm.php\';</script>';
			
	}}
	}
 ?>
<!DOCTYPE html>
<html><html>
<head>
	<title>Passenger Request Form</title>
<link rel="stylesheet" type="text/css" 
href="style.css">
<meta charset="utf-8">
<script type="text/javascript">
function validate(){
 var fullname1=document.vvfrom.fn;
 var phone1=document.vvfrom.phon;
 var age1=document.vvfrom.age;
 var address1=document.vvfrom.address;
 var birr1=document.vvfrom.birr;
 var sex1=document.vvfrom.level1;
 var sex=document.vvfrom.bord;
         var fullnamevalidate = /^[0-9a-zA-Z\s]+$/; 
         var phonevalidate= /^[0-9]+$/; 
         var phoneno = /^\d{10}$/;
         var sexvalidate= /^[a-zA-Z\s]+$/; 
         var agevalidate= /^[1-9]+$/; 
         var agelength = /^\d{2}$/;
         var validateaddress= /^[a-zA-Z\s]+$/; 
         var birrvalidate= /^[0-9]+$/;


if(!fullname1.value.match(fullnamevalidate)){
alert("Fullname must be alpabet character only");
fullname1.focus();
return false;
}

if(!phone1.value.match(phoneno)){
alert("please enter 10 digit");
phone1.focus();
return false;
}

if(!address1.value.match(validateaddress)){
alert("please enter valid email");
address1.focus();
return false;
}

if(!age1.value.match(agevalidate)){
alert("please enter 2 digit age");
age1.focus();
return false;
}

if(!birr1.value.match(birrvalidate)){
alert("please enter again birr");
birr1.focus();
return false;
}

if(!sex1.value.match(sexvalidate)){
alert("please enter Account again");
sex1.focus();
return false;
}

if(!sex1.value.match(sexvalidate)){
alert("please enter gender");
sex1.focus();
return false;
}

return true;}
</script>
<?php include'../Language/lang.php';?>
</head>
<body bgcolor="white">
<div class="header">
<h1><?php echo htmlspecialchars($lang['genn']);?></h1>
</div>
<div id="wrapper">
	<form method="POST"action=" " onsubmit="return validate();"name="vvfrom" id="ccform">
		<div>
		<label><?php echo htmlspecialchars($lang['username']);?><label></br>
         <input type="text" name="fname"class="textInput" id="fn"Required>
          <span><i id="fname_error"class="val_error"></i></span>
		</div>

		<div>
	
				
		<div>
		    <label><?php echo htmlspecialchars($lang['phone']);?></label></br>
			<input type="text" name="phone"class="textInput" id="phon"Required>
			<span><i id="phone_error"class="val_error"></i></span>
		</div>
		<div>
		<label><?php echo htmlspecialchars($lang['nn']);?><label></br>
<input type="text" name="adress"class="textInput" id="address"Required>
<span><i id="address_error"class="val_error"></i></span>
			</div>
			<div>
			<div>
		<label><?php echo htmlspecialchars($lang['age']);?><label></br>
<input type="text" name="ag"class="textInput" id="age"Required>
<span><i id="age_error"class="val_error"></i></span>
			</div>
			<div>
			
			<div>
			<div>
		<label><?php echo htmlspecialchars($lang['bir']);?><label></br>
<input type="text" name="birr"class="textInput" id="birr"Required>
<span><i id="birr_error"class="val_error"></i></span>
			</div>
			
			<div>
		    <label><?php echo htmlspecialchars($lang['acc']);?></label></br>
			<input type="text" name="bordno"class="textInput"id="bord" placeholder=""onkeyup="numbersOnly(this)"Required>
			<span id="bord_error"class="val_error"></span>
		</div>
			<div>
			<div>
		<label><?php echo htmlspecialchars($lang['gen']);?><label></br>
<select type="text" name="level1" id="gender" class="textInput"placeholder="sex"Required>
		<option>Male</option>
		<option>Female</option>
		
		</select>
		<span> <i id="gender_error"class="val_error"></i></span>
			</div>
			
			<div>
		
			
		<div>
			<input type="submit" value="<?php echo htmlspecialchars($lang['submit']);?>" class="btn"name="register"id="register">
			<input type="reset" value="<?php echo htmlspecialchars($lang['reset']);?>" class="btn"name="register">
		</div>
	</form>
	</fieldset>
</div>
</body>
</html>
