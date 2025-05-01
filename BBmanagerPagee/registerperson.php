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
<title>register person</title>
<link  href="mystyles.css" rel="stylesheet" type="text/css"/>
</head><center>
<div id="divWrapper">
<table border="0">
<tr><td >
<div id="divheader"><?php include("header.php");?></div>
<div id="divNav">
<?php
include("menu.php");
//if(isset($_SESSION['sun']) && isset($_SESSION['spw']))
	//{
?>
</div>
</td></tr>
<tr>
<td><div id="divSideContentLeft"><h1>Side Links</h1>
<ul>
<li><a href="registeraccident.php">register general accident</a>	
	<li><a href="registerdriver.php">register car driver</a></li>
	<li><a href="registerproperty.php">register damage property</a></li>
	<li><a href="registercar.php">register car</a></li>
	<li><a href="registerperson.php">register injured  person</a></li>
	<li><a href="trafficmenu.php">traffic police menu</a></li>
</ul></div>
</td><td><div id="divContentCenter">


<form action="" method="post"><table><tr><td>
person ID</td><td><input type="text" name="pi"  pattern="[a-zA-Z0-9/]+" required></td></tr>
<tr><td>first name</td><td><input type="text" name="fn" pattern="[a-zA-Z/]+"  required></td></tr>
<tr><td>last name</td><td><input type="text" name="ln"  pattern="[a-zA-Z/]+" required></td></tr>
<tr><td>sex</td><td><select name="sex">
<option value="">choose sex</option>
<option value="male">male</option>
<option value="female">female</option>
</select></td></tr>
<tr><td>age</td><td><input type="number" name="age" pattern="[0-9/]+" required></td></tr>
<tr><td>kebele</td><td><input type="text" name="ke" pattern="[a-zA-Z0-9/]+" required></td></tr>
<tr><td>woreda</td><td><input type="text" name="wo" pattern="[a-zA-Z0-9/]+" required></td></tr>
<tr><td>zone</td><td><input type="text" name="zo"  pattern="[a-zA-Z0-9/]+" required></td></tr>
<tr><td>region</td><td><input type="text" name="re"  pattern="[a-zA-Z0-9/]+" required></td></tr>
<tr><td>car number</td><td><input type="text" name="cn"  pattern="[a-zA-Z0-9/]+" required></td></tr>
<tr><td><input type="submit" name="register" value="register">&nbsp;&nbsp;<input type="reset" value="Reset">
</td></tr></table></form></fieldset>
</div></td></tr><tr><td><div id="divFooter"><br><?php include("footer.php");?></div></td></tr>
</table>
</div></center>

</body>
</html>