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
<body>
<head>
<title>stockclerk page</title>
<link  href="mystyles.css" rel="stylesheet" type="text/css"/>
</head>

<body bgcolor="#B0C4DE">
 <?php

if(isset($_SESSION['sun'])&& isset($_SESSION['spw']))
{
	$emppostionoffid1=$_SESSION['$emppostionoffid'];
 //echo $emppostionoffid1; 

 $empid= $_SESSION['Employee_id'];
//echo $empid;

$oid=$_SESSION['$empoffid'];
//echo $oid;
$poname=$_SESSION['$emppostionoffname'];
?>
<div id="divWrapper">
<center>

<table border=0>
<tr><td colspan=6>
<div id="divheader">
<?php include("header.php");
?>
</div>
<div id="divNav">
<?php
include("internalmenu.php");
?>
<?php
require("date_time.php");
?>
</div>
</td>
</tr>
<tr><td colspan=6>&nbsp;</td></tr>
<tr><td>
<div id="divSideContentLeft"><h1>Stock clerk task</h1>

	
<?php
include("stockmenu.php");
?>
	
	
	

</ul>
</div>
</td>
<td><b><font color="green"><h1>Wellcome to Stock clerk page</h1></font></b></td>


</tr>

<tr><td colspan=6>
<div id="divFooter"><br>
<?php include("footer.php");
?>
</div></td></tr>
</center>
</div></table>
  <?php
}
else
{
header("location:index.php");
}?>
</body>
</html>