 <?php
 session_start();
 include "../connection/connection.php";
if (isset($_POST['register']))
	{
    $fn=$_POST['fname'];
	$mn = $_POST['fathername'];
	$ln = $_POST['lname'];
	$ph = $_POST['phone'];
	$keb = $_POST['kebele'];
	$req = $_POST['request'];
	$lev = $_POST['level1'];
	$bord = $_POST['bordno'];
	$ol = $_POST['olicence'];
	//$kebeleid=$_POST['KEBELE_ID'];
	$busl = $_POST['blicence'];
	$insurl = $_POST['Ilicence'];
	$reqdate = date("y-m-d");
	$accept = 'Not';
	$approve = 'Not';
	   
    $year=date("Y")-8;// starting id generation 
    $counter_res=mysqli_query($con,"select * from Request");
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
      $kebeleid=$year.$d.$varx;// End of id generation
	  //start bord number check
	$query3 = mysqli_query($con,"SELECT * FROM request where BORD_NO='$bord' ");
    if(mysqli_fetch_array($query3)>0)
	{
		echo '<script type="text/javascript">alert("Bored Number are already exist !! ");</script>';
	}//if exist 
	else//
	{
//for count start
$sqla="select count('FIRST_NAME') from request where  REQUEST_TO='$req' ";
$countt=mysqli_query($con,$sqla);
$row1= mysqli_fetch_array($countt);
$tot=$row1['0'];
if($tot >=250){
 echo'<script type="text/javascript">alert("The Association is Full Pleas Find Other Asociation !! ");</script>';	
}
else{
echo "<center><font color='green' size='6'>Total Member of This Association:";
echo $row1['0'];
echo "</font></center>";

 $sql="insert into request values('$fn','$mn','$ln','$ph','$keb','$req','$lev','$bord','$ol','$busl','$insurl','$reqdate','$kebeleid','$accept','$approve')";
$result  = mysqli_query($con,$sql);
	if(!$result)
	{
	echo "not registerd".mysqli_error();
	}
	else
	{	
echo '<script type="text/javascript">alert("Register Seccesfully !! ");window:location=\'Requestform.php\';</script>';
			
}
}
	}
	}
 ?>


<!DOCTYPE html>
<html><html>
<head>
	<title>Operator Request Form</title>
<link rel="stylesheet" type="text/css" 
href="Requestformstyle.css">

 <script src="js/jquery-3.3.1.js" type="text/javascript"></script>
 <script src="js/requestform.js" type="text/javascript"></script>
<meta charset="utf-8">
<?php include'../Language/lang.php';?>
</head>
<body bgcolor="white">
<div class="header">
<h1><?php echo htmlspecialchars($lang['reqestform']);?></h1>
</div>
<div id="wrapper">
	<form method="POST"action="Requestform.php"onsubmit="return validate()"name="vfrom" id="cform">
		<div>
		<label><?php echo htmlspecialchars($lang['first']);?><label></br>
<input type="text" name="fname"class="textInput" id="fn">
<span><i id="fname_error"class="val_error"></i></span>
			</div>
			<div>
		<label><?php echo htmlspecialchars($lang['second']);?></label></br>
			<input type="text" name="fathername"class="textInput" id="mn" >
			<span><i id="fathername_error"class="val_error"></i></span>
                </div>
						<div>
		<label> <?php echo htmlspecialchars($lang['last']);?></label></br>
			<input type="text" name="lname"class="textInput" id="ln">
			<span><i id="grandfather_error"class="val_error"></i></span>
                </div>
				
		<div>
		    <label><?php echo htmlspecialchars($lang['phone']);?></label></br>
			<input type="text" name="phone"class="textInput" id="phon">
			<span><i id="phone_error"class="val_error"></i></span>
		</div>
		<div>
		    <label><?php echo htmlspecialchars($lang['kebele']);?></label></br>
		<select type="text" name="kebele" id="kebel" class="textInput">
		<option>Select Kebele</option>
		<option>01</option>
		<option>02</option>
		<option>03</option>
		<option>04</option>
		<option>05</option>
		<option>06</option>
		<option>07</option>
		<option>08</option>
		<option>09</option>
		<option>10</option>
		<option>11</option>
		<option>12</option>
		<option>13</option>
		<option>14</option>
		<option>15</option>
		<option>16</option>
		<option>17</option>
		<option>18</option>
		<option>19</option>
		<option>20</option>
		<option>21</option>
		</select>
			<span> <i id="kebele_error"class="val_error"></i></span>
		</div>
		<div>
		<label> <?php echo htmlspecialchars($lang['asso']);?></label></br>
		
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
		<label> <?php echo htmlspecialchars($lang['lev']);?></label></br>
			<select type="text" name="level1" id="level" class="textInput"placeholder="">
			
		
		<option>-Select Level-</option>
		<option>level 1</option>
		<option>level 2</option>
		<option>level 3</option>
		</select>
		<span id="level_error"class="val_error"></span>
		</div>
		<div>
		    <label><?php echo htmlspecialchars($lang['targa']);?></label></br>
			<input type="text" name="bordno"class="textInput"id="bord" placeholder=""onkeyup="numbersOnly(this)">
			<span id="bordno_error"class="val_error"></span>
		</div>
			
		
		<div>
		<input type="hidden"name="size"value="100000">
		    <label><?php echo htmlspecialchars($lang['opreatorlicence']);?></label></br>
			<input type="file" name="olicence" id="operator" class="textInput">
			<span id="olicence_error"class="val_error"></span>
		</div>
		<div>
		    <label><?php echo htmlspecialchars($lang['BusinesseLicence']);?></label></br>
			<input type="file" name="blicence"class="textInput" id="business" >
			<span id="blicence_error"class="val_error"></span>
		</div>
			<div>
		    <label><?php echo htmlspecialchars($lang['Insurancemember']);?></label></br>
			<input type="file" name="Ilicence"class="textInput" id="insurance">
			<span id="Ilicence_error"class="val_error"></span>
		</div>	
		<div>
			<input type="submit" value="<?php echo htmlspecialchars($lang['submit']);?>" class="btn"name="register">
			<input type="reset" value="<?php echo htmlspecialchars($lang['reset']);?>" class="btn"name="register">
		</div>
	</form>
	</fieldset>
</div>
</body>
</html>
