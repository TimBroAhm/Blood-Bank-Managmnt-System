<?php
session_start();
include "../connection/connection.php";
$userName = $_SESSION['USER_ID'];
if (isset($_POST['create'])) {
	$userid=$_POST['userId'];
    $uname = $_POST['username'];
    $password = $_POST['password'];
	$passs=$_POST['rpassword'];
	$pass=md5($passs);
	  //$pass = ('$password');
    $roll = $_POST['rol'];
    $emai = $_POST['email'];
    $stat = '0';
     $adminid=$_SESSION['USER_ID'];                                                 
    $query3 = mysqli_query($con,"SELECT * FROM Account where USER_NAME='$uname' || USER_ID='$userid'");
    if(mysqli_fetch_array($query3)>0)
	{
		echo '<script type="text/javascript">alert("Account are already exist !! ");</script>';
	}//end if there is an account
	else//if doesnot predefind account
	{
		
		 if($roll == 'sysadmin' ||$roll == 'Passenger'||$roll == 'Employee'|| $roll == 'Deputy Director General' || $roll== 'General Service Excutive Offic' || $roll =='Stockclerk')
		{
			$sql1="select EID from Employee1 where EID='$userid'";
			$result1=mysqli_query($con,$sql1);
			if(mysqli_fetch_array($result1) > 0)
			{
		$save2="insert into Account values('$userid','$uname','$pass','$roll','$emai','$stat','$adminid')";
				$saved2=mysqli_query($con,$save2);
				if($saved2)
				{
					echo '<script type="text/javascript">alert("Account created Seccesfully !! ");</script>';
				}
				else{
					echo "error".mysql_error();
				}
			}//end if operator exist
			else{
				echo '<script type="text/javascript">alert("Yuo are not legal member of Employee!! ");</script>';
			}	
		}
	}//end if have not account
    }
?>
<html>
<head>
<link rel="stylesheet"
type="text/css"
href="../css/f.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script src="../js/jquery-3.3.1.js" type="text/javascript"></script>
 <script src="../js/createaccvalidation.js" type="text/javascript"></script>
 <meta charset="utf-8">
<?php include'../Language/lang.php';?>
</head>
<body>
<div class="header">
<h1><?php echo htmlspecialchars($lang['createኡ']);?></h1>
</div>
<form method="POST"action="createaccount.php" onsubmit="return Validate()"name="vform"id="cform">
<div class="input-group">
<label><?php echo htmlspecialchars($lang['id']);?></label>
<input type="text" name="userId" id="uid" placeholder=""onkeyup="numbersOnly(this)">
<span><i id="userId_error"></i></span>
</div>
<div class="input-group">
<label><?php echo htmlspecialchars($lang['username']);?></label>
<input type="text" name="username"class="textInput"id="un">
<span><i id="uname_error"></i></span>
</div>

<div class="input-group">
<label><?php echo htmlspecialchars($lang['password']);?></label>
<input type="password" name="password"id="pass"><span><i id="pass_error"></i></span>
</div>
<div class="input-group">
<label><?php echo htmlspecialchars($lang['repass']);?></label>
<input type="password" name="rpassword"id="repass"><span><i id="repass_error"></i></span>
</div>

<div class="selectrol">
<label style="font-size: 16pt" ><?php echo htmlspecialchars($lang['role']);?></label></br>
<select name="rol" style="font-size: 12pt" id="form_role">
        <option>please choose</option>
		<option>System Admin</option>
		<option>Director General</option>
		<option>Deputy Director General</option>
		<option>General Service Excutive Officer</option>
		<option>Employee</option>
		<option>Stockclerk</option>
	</select><span  id="role_error_message"></span>
</div>
<div class="input-group">
<label> <?php echo htmlspecialchars($lang['email']);?></label>
<input type="text"id="em"name="email"><span><i id="email_error"></i></span>
</div>

<div class="input-group">
<button type="submit" name="create" class="btn"><?php echo htmlspecialchars($lang['create']);?></button>
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
