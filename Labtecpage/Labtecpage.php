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
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet"
type="text/css"
href="../css/adminstyle.css">
</head>
<body>
<div id="container">
<header><table border="2px" color="white"><tr><td><img src="../images/b.jpeg" height="70px"width="150px"/>
</td><br><td><img src="../images/.png" width="990" height="80px"/></td>
<td><img src="../images/blood.jpeg" height="80px" width="150px"/>
	</b></p></td></tr></table></header>
	<?php 
	include '../logoutlink.php';
	?>
	</div>
	<div id="main">
	<div id="sidebar1">
	<div id="admin">
<ul><li><a ></a><?php echo htmlspecialchars($lang['pott']);?> </li></ul>
	
		
		<ul>
	<li><a href="BloodDetails.php"target="myframe"><?php echo htmlspecialchars($lang['rbb']);?> </a></li>
	</ul>
		<ul>
	<li><a href="ViewAvailableBloodLabtec.php"target="myframe"><?php echo htmlspecialchars($lang['vabb']);?> </a></li>
	</ul>
		<ul>
	<li><a href="ViewExpairedBloodLabtec.php" target="myframe">V<?php echo htmlspecialchars($lang['vebb']);?> </a></li>
	</ul>
		
		<ul>
	<li><a href="responsefrommanager.php" target="myframe"><?php echo htmlspecialchars($lang['dbb']);?> </a> </li>
	</ul>
		
	
	<ul>
	<li><a href="../updateindividualuser.php"target="myframe"><?php echo htmlspecialchars($lang['update']);?> </a></li>
	</ul>
</div>
<?php 

?>
	</br></br></br>
	</br></br></br></br></br></br></br></br></br></br></br>
	<?php
	include '../imagelink.php';
	?>
	</div>
	<div id="sidebar2">
		<?php 
	include '../timecalendar.php';
		?>
     
	</div>
	<div id="column1"> 
    <?php
	include '../ifram.php';
	?>
	</div>
	
	</div>
	</body>
	<footer>
	<?php 
	include '../footer.php';
	?>
	</footer>
</html>