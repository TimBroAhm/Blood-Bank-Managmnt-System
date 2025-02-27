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

<html>
<body  bgcolor="#B0C4DE">
<head>
<title>register user</title>
<link  href="mystyles.css" rel="stylesheet" type="text/css"/>
</head><center>
<div id="divWrapper">
<table border="0">
<tr><td >
<div id="divheader"><?php include("header.php");?></div>
<div id="divNav">
<?php
include("menu1.php");
if(isset($_SESSION['sun']) && isset($_SESSION['spw']))
{
?>
</td></tr><tr><td>&nbsp;</td></tr>
<tr>
<td><div id="divSideContentLeft"><h1>Side Links</h1>
<ul>
	<li><a href="updateuser.php" >update user</a></li>
	<li><a href="adminmenu.php" >admin menu</a></li>	
</ul></div></td>
<td>&nbsp;</td><td><div id="divContentCenter">
<?php
if(isset($_POST["display"]))
{
	$un=$_POST["un"];
	$pass=sha1($_POST["pass"]);
	$role=$_POST["urole"];

	if($con)
	{
		$sql="select * from register where Username='$un'";
		$userexist=mysqli_query($con,$sql);
		if(mysqli_affected_rows($con))
			echo "Username already exist please change your username and try again!";
		else
		{
			
			$sql="insert into register values('$un','$pass','$role',1)";
			$inserted=mysqli_query($con,$sql);
			if(mysqli_affected_rows($con))
				echo "User registered successfully!";
			else	
				echo "Unable to register the user";
	
		}
		}
	else
		echo "Connection Failed";
}
?>
<fieldset>
<legend width="30px" height="30px" align="center">register user</legend>
<form action="" method="post"><table><tr><td>
Username:</td><td><input type="text" name="un" required></td></tr>
<tr><td>Password:</td><td><input type="password" name="pass" required></td></tr>
<tr><td>User Role:</td><td><select name="urole">
<option value="">Choose Role</option>
<option value="traffic">traffic</option>
<option value="Administrator">Administrator</option>
</select></td></tr>

<tr><td><input type="submit" name="display" value="Register"></td></tr></table>

</form></fieldset></div></td></tr>
<tr><td><div id="divFooter"><br><?php include("footer.php");?></div></td></tr>
</table>
</div></center>

<?php
	}
	else
	header("location:login.php");	
?>  
</body>
</html>