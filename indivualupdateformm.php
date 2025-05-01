<?php
include("connection/connection.php");  
 session_start();
if(isset($_SESSION['USER_ID']))
 {
  $mail=$_SESSION['USER_ID'];
 } else {
 ?>

<script>
  alert('You are not logged In !! Please Login to access this page');
  alert(window.location='login.php');
 </script>
 <?php
 }
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
                                					
				$usertype=$test['EMAIL'] ;

if(isset($_POST['edite']))
{	

       
	$username_save = $_POST['username'];
	$password_save = base64_encode($_POST['password']);
	$usertype_save = $_POST['usertype'];

	mysqli_query($con,"UPDATE Account SET  USER_NAME ='$username_save',
		 PASSWORD ='$password_save' ,EMAIL='$usertype_save' WHERE USER_ID='$id'")
				or die(mysqli_error()); 
	echo "Saved!";
	
	header("Location: updateindividualuser.php");			
}
mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet"
type="text/css"
href="form1/f.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script src="js/jquery-3.3.1.js" type="text/javascript"></script>
 <script src="form1/js/individualupdate.js" type="text/javascript"></script>
</head>
<body>
<div class="header">
<h1> Create User Account</h1>
</div>
<form method="POST" onsubmit="return Validate()"name="vform"id="cform">
<div class="input-group">
<label> User Name</label>
<input type="text" name="username" class="textInput"value="<?php echo $username ?>"id="un" placeholder="">
<span><i id="uname_error"></i></span>
</div>

<div class="input-group">
<label>Password</label>
<input type="password" name="password" id="pass" value="<?php echo $password ?>"><span><i id="pass_error"></i></span>
</div>
<div class="input-group">
<label> E-mail</label>
<input type="text"id="em"name="usertype" value="<?php echo $usertype ?>"><span><i id="email_error"></i></span>
</div>

<div class="input-group">
<button type="submit" name="edite" value="update user" class="btn">Update</button>
<a href="updateindividualuser.php" ><input name="back" type="Button" value=" Back"/>
</div>
</form>
</body>
</html>

