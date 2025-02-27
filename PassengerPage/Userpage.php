<?php
include("../connection/connection.php");  
 session_start();
if(isset($_SESSION['USER_ID']))
 {
	 $now=time();
	if($now>$_SESSION['expire']){
		error_reporting(1);
       session_destroy();
     echo"<p > session expire</p><a href='../Login.php'>login</a>";
}
	else{
	//$_SESSION['expire'] = time();
	echo"<h3 align='center'>automatic logout after 4 minute</h3>";
	}
	 //$_SESSION['expire'];
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
<?php 

include"../connection/connection.php";
//session_start();
if(isset($_SESSION["USER_ID"]))
{
	
}?>
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
<header><table border="2px" color="white"><tr><td><img src="../images/b2.jpg" height="70px"width="150px"/>
</td><br><td><img src="../images/ahmedu.png" width="1050" height="80px"/></td>
<td><img src="../images/b4.jpg" height="80px" width="150px"/>
	</b></p></td></tr></table></header>
	<?php 
	include '../logoutlink.php';
	?>
	</div>
	<div id="main">
	<div id="sidebar1">
	<div id="admin">
<ul><li><a><?php echo htmlspecialchars($lang['b']);?></a></li></ul>
	<ul>
	<li><a href="viewbus.php"target="myframe"><?php echo htmlspecialchars($lang['c']);?></a></li>
	</ul>
	<ul>
	<li><a href="book_tiket.php"target="myframe"><?php echo htmlspecialchars($lang['e']);?></a></li>
	</ul>
	<ul>
	<li><a href="viewseat.php"target="myframe"><?php echo htmlspecialchars($lang['f']);?></a></li>
	</ul>
	<ul>
	<li><a href="booking.php"target="myframe"><?php echo htmlspecialchars($lang['g']);?></a></li>
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