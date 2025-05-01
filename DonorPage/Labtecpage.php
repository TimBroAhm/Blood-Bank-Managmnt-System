<?php
session_start();
include("../connection/connection.php");
?>
<html>
<head>
<title>labtecknitian</title>
<link rel="Stylesheet" type="text/css" href="setting.css">
</head>
<body>
<?php
if(isset($_SESSION['USER_NAME']))
{

$uid=$_SESSION['USER_ID'];
$uname=$_SESSION['USER_NAME'];
$role=$_SESSION['ROLE'];
?>
<div id="container">


<div id="content">
<table border="0" width="1000" height="500"><tr><td width="150">
</td>
		<td width="300">
		<div style="width:630px;height: 600px; margin-left: 20px;
		border:solid 4px #dldbeg;
		overflow:scroll;
		overflow-x:scroll">
		<div id="contentcenter">
<br/>	
<h2>Well Come To Lab Technitian Page</h2><img src="../images/dm3.jpg"width="580"height="500"/>
</div></td>
		</tr></table>
		</div>

</div>
<?php
}
else
{
header("location:Index.php");
}
?>
</body>
</html>