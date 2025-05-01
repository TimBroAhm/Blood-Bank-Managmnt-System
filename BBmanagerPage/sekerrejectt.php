	<?php
	session_start();
	include("../connection/connection.php");
	?>
	<html>
	<head>
	<title>requestform</title>
	<link rel="Stylesheet" type="text/css" href="setting.css">
	<link rel="stylesheet" href="stylesLogin.css">
	</head><body>
	<?php
	if(isset($_SESSION['USER_NAME']))
	{
	
	$uid=$_SESSION['USER_ID'];
	
	?>	
	<?php
	?>
<div class="loginBoxx">
<fieldset style="border-radius: 25px;background-color: #e2e6fe;height:400px;width: 550px;margin-left:35px;">
<form action="RejectResponse.php" method="post">
<table border="0px" bgcolor="#fff9f9" width="500px">
<tr><td colspan="2"><h3 style="font-size:20px;text-align: center;">Send Description for Appointment 
<div style="float:right; margin-left:40px;"></div></h3></td></tr>
	<tr><td>User ID:</td><td><input type="text" name="uid"  value="<?php echo $uid;?>" readonly></td></tr>
	<tr><td>Description:</td><td><textarea name="message" ROWs="5"COLs="33" placeholder="please write your description here !!!" required></textarea></td></tr>
<tr><td>&nbsp;</td><td><input type="Submit" name="submit"size="100" value="Send"/>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="Reset" class="submit"size="100" value="Reset"/></td></tr>
	</table></form></fieldset></div>
<?php
	
	}
	else
	{
	header("location:Index.php");
	}
	?>
	</body>
	</html>