<?php
include("../connection/connection.php");  
 session_start();
if(isset($_SESSION['USER_ID']))
 {
	 $now=time();
	if($now>$_SESSION['expire']){
		error_reporting(1);
      // session_destroy();    ahmed comment after finished un coment
     echo"<p > session expire</p><a href='../Login.php'>login</a>";
}
	else{
	$_SESSION['expire'] = time();
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

<header><table border="2px" color="white"><tr><td><img src="../images/logoo.jpg" height="70px"width="130px"/>
</td><br><td><img src="../images/Adminn.png" width="1020" height="70px"/></td>
<td><img src="../images/logoo.jpg" height="70px" width="130px"/>
</td></tr></table></header>
	<?php 
	include '../logoutlink.php';
	?>

	</div>
	<div id="main">
	<div id="sidebar1">
	<div id="admin">
<ul><li><a><?php echo htmlspecialchars($lang['admin']);?></a></li></ul>
	<ul>
	<li><a href="createaccount.php"target="myframe"><?php echo htmlspecialchars($lang['createa']);?></a></li>
	</ul>
	<ul>
	<li><a href="AccountUpadate.php"target="myframe"><?php echo htmlspecialchars($lang['update']);?></a></li>
	</ul>
	<ul>
	<li><a href="deactivateactiveuser.php"target="myframe"><?php echo htmlspecialchars($lang['deactivate']);?></a></li>
	</ul>
	<ul>
	<li><a href="activatedeactivateuser.php"target="myframe"><?php echo htmlspecialchars($lang['activate']);?></a></li>
	</ul>
	<ul>
	<li><a href="employeeregistration.php"target="myframe"><?php echo htmlspecialchars($lang['employee']);?></a></li>
	</ul>
	
	<ul>
	<li><a href="ViewUser.php"target="myframe"><?php echo htmlspecialchars($lang['user']);?></a></li>
	</ul>
	<ul>
	
	<li><a href="restoredb.php"target="myframe"><?php echo htmlspecialchars($lang['db']);?></a>
	</li>
	</ul>
	<ul>
	
	<li><a href="backup.php"target="myframe"><?php echo htmlspecialchars($lang['bb']);?></a>
	</li>
	</ul>
	
	
	<ul>
	
	<li><a href="Reportbbm.php" target="myframe">Retrive Report</a>
		
		<ul>
	
	<li><a href="ViewUsersActivity.php" target="myframe">View_User_Activity</a></li>
	</ul>
	<ul>
	<li><a href="imageupload.php"target="myframe"><?php echo htmlspecialchars($lang['notice']);?></a></li>
	</ul>
</div>
</br></br></br>
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
