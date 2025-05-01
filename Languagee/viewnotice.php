<?php
session_start();
include("connection.php");
?>
<html>

<head>
<title>view notice</title>
<link  href="mystyles.css" rel="stylesheet" type="text/css"/>
</head>
<body bgcolor="#B0C4DE">
<center>
<div id="divWrapper">
<table border=0 ><tr><td colspan="6">
<div id="divheader"><?php include("header.php");?></div>
<div id="divNav">
<?php
include("menu.php");
?>
<!--<?php
require("date_time.php");
?>-->
</div></td>
</tr>
<tr>
<td><div id="divSideContentLeft">
<?php
include("homemenu.php");
?>
 
</td><td><div id="divContentCenter">
    <!--?php
include("print.php");
?--> 
<?php

if($con)
{
  $date=date('Y-m-d');
  //echo $date;
	$sql1="SELECT * from notice where end_date>='$date' order by start_date DESC"; 
     $sql2=mysqli_query($con,$sql1);
	if(mysqli_num_rows($sql2)>0)
	{
	//$sql=mysqli_query("SELECT * from notice where Ex_Dates>='$date' ORDER BY dates ASC") or die(mysql_error());
	while($row=mysqli_fetch_array($sql2))
	{
	
						echo"<p align='right'><b>Date:</b>"."<u>".$row['start_date']."</u>"."</p>";
						echo"<center>"."<u>".$row['subject']."</u>"."</center>"."</p>";       	
						echo "<font  size='3' color='#00000b'>".$row['content'];
						//echo"<font size='4' color='#0000CD'><center>".$row['sender']."</center>"."</p>";
						echo "<br> <hr >";

	}
	}
	else
	
		echo "There No Post Notice!!!";
	}

else
		echo "Connection Failed";
?>
    
</tr>

</div></td>
<tr><td colspan=6>
<div id="divFooter"><br>
<?php include("footer.php");?>
</div></td></tr>
</table>
</div>
</center>

</body>
</html>