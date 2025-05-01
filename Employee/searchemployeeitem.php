<?php
session_start();
include("connection/connection.php");
?>
<html>

<head>
<title>view withdraw item</title>
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
//echo $poname;
//$eid=$_SESSION['$eid'];
?>
<center>
<div id="divWrapper">
<table border=0 ><tr><td colspan="6">
<div id="divheader"><?php include("header.php");?></div>
<div id="divNav">
<?php
include("internalmenu.php");
?>
<!--?php
require("date_time.php");
?-->
</div></td>
</tr>
<tr><tr><td>&nbsp;</td></tr>
<td><div id="divSideContentLeft">
<?php
include("employeemenu.php");
?></div> </td>
<td><div id="divContentCenter">
 
<!--form action="" method="post">
<label>Enter your ID</label><input type="text" placeholder="Search.." name="searchkey" required="1"/>
<!--input type="text" name="searchkey" pattern="[a-zA-Z0-9/]+" required>
<input type="submit" name="search" value="Search"></>
</form-->

<?php
	if($con)
{          echo "<h1>list of item  </h1>";
	$sql="select * from item_withdraw where item_withdraw.Employee_id='$empid'";
		$recordfound=mysqli_query($con,$sql);
		if(mysqli_affected_rows($con))
			{
				echo "<table border=2>";
	echo"<tr> <th>Item<br>Name</th>  <th>Reciver<br> Employee Name</th> <th>Date of withdraw</th></tr>";
	
		while($row=mysqli_fetch_array($recordfound))
		{
			$deptcollname=null;
		    $deptcollid=$row['Employee_id'];
		  // echo $deptcollid;
		    $sql3="select * from employee where Employee_id='$deptcollid'";
		    //echo $deptcollid;
		$resultset=mysqli_query($con,$sql3);
		//echo $deptcollid;
		if($resultset=mysqli_fetch_array($resultset)){
			//echo $deptcollid;
			$empfname=$resultset['First_Name'];
			$emplname=$resultset['Last_Name'];
		
		}else
		    $empname=null;
		    $itemid=$row['item_Register_ID'];
		  //echo $deptcollid;
		    $sql3="select item_model from item where item_Register_ID='$itemid'";
		    //echo $deptcollid;
		$resultset=mysqli_query($con,$sql3);
		//echo $deptcollid;
		if($resultset=mysqli_fetch_array($resultset)){
			//echo $deptcollid;
			$empname=$resultset['item_model'];
				}
	           echo "<tr>
	              
	                <td>".$empname."</td>
	             <td>".$empfname." ".$emplname."</td> 
	               <td>".$row['DateOf_Register']."</td></tr>";
		}
		echo "</table>";
		}else
			echo "No records found!";
}
else
	echo "Unable to connect the database:";
	
?>
</div>
</td>
</tr>

<tr><td><div id="divFooter">
<?php include("footer.php");?>
</div></td></tr>
</table>
</div>
</center>
  <?php
}
else
{
header("location:login.php");
}?>
</body>
</html>
