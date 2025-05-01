<?php 
session_start();
include("../connection/connection.php");
?>
<?php
$id =$_REQUEST['USER_ID'];
$result = mysqli_query($con,"SELECT * FROM Account WHERE USER_ID  = '$id'");
$test = mysqli_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
	
				$username=$test['USER_NAME'] ;					
				$password=$test['PASSWORD'] ;
                                					
				$usertype=$test['ROLE'] ;

if(isset($_POST['edite']))
{	   
	$username_save = $_POST['username'];
	$password_save = base64_encode($_POST['password']);
	$usertype_save = $_POST['usertype'];

	mysqli_query($con,"UPDATE Account SET  USER_NAME ='$username_save',
		 pASSWORD ='$password_save' ,ROLE='$usertype_save' WHERE USER_ID='$id'")
				or die(mysqli_error()); 
	echo "Saved!";
	
	header("Location: AccountUpadate.php");			
}
mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet"
type="text/css"
href="../css/f.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script src="../js/jquery-3.3.1.js" type="text/javascript"></script>
 <script src="../js/updateaccountvalidation.js" type="text/javascript"></script>
</head>
<body>
<div class="header">
<h1> Update Account</h1>
</div>
<form method="POST" onsubmit="return Validate()"name="vform"id="cform">
<div class="input-group">
<label> User Name</label>
<input type="text" name="username"value="<?php echo $username ?>"class="textInput" id="un">
<span><i id="uname_error"></i></span>
</div>
<div class="input-group">
<label>Password</label>
<input type="password" name="password"value="<?php echo $password ?>" id="pass"><span><i id="pass_error"></i></span>
</div>
<div class="input-group">
<label>Role</label>
<input type="text" name="usertype"value="<?php echo $usertype ?>"id="role"><span><i id="role_error"></i></span>
</div>
<style>
</style>
<div class="input-group">
<button type="submit" name="edite" value="update user"  class="btn">Update</button>
<a href="AccountUpadate.php" ><input name="back" type="Button" value=" Back"/></td>
</div>
</form>
</body>
</html>