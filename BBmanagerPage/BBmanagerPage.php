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
<meta charset="utf-8">
</head>
<body>
<div id="container">
<header><table border="2px" color="white"><tr><td><img src="../images/b.jpeg" height="70px"width="130px"/>
</td><br><td><img src="../images/stck.png" width="1010" height="80px"/></td>
<td><img src="../images/blood.jpeg" height="80px" width="130px"/>	</td></tr></table></header>
	<?php 
	include '../logoutlink.php';
	?>
	</div>
	<div id="main">
	<div id="sidebar1">
	<div id="admin">
<ul><li> <a><?php echo htmlspecialchars($lang['bdttt']);?> </a></li></ul>
	
			<ul><li><a href="BBRigisterSeeker.php" target="myframe"><?php echo htmlspecialchars($lang['rs']);?> </a></li></ul>
								
			<ul><li><a href="Recieverequest.php" target="myframe"><?php echo htmlspecialchars($lang['rr']);?> </a></li></ul>
		   <ul><li> <a href="RetriveReport.php" target="myframe"><?php echo htmlspecialchars($lang['vr']);?> </a></li></ul>
		    <ul><li><a href="viewblood.php"target="myframe"><?php echo htmlspecialchars($lang['vb']);?> </a></li></ul>
		    <ul><li><a href="ViewDonor.php" target="myframe"><?php echo htmlspecialchars($lang['vd']);?> </a> </li></ul>
		    <ul><li><a href="ViewSeeker.php" target="myframe"><?php echo htmlspecialchars($lang['vs']);?> </a> </li></ul>
		   <ul><li> <a href="Notices.php"target="myframe"><?php echo htmlspecialchars($lang['sn']);?> </a></li></ul>
		    					
		 <ul><li><a href="ViewFeedback.php"target="myframe"><?php echo htmlspecialchars($lang['vc']);?> </a> </li></ul>
		 <ul>
	<li><a href="../updateindividualuser.php"target="myframe"><?php echo htmlspecialchars($lang['update']);?> </a></li>
	</ul>
	

</div>
<?php 

?>
	
	</br></br></br></br></br>
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