<html>
<?php
session_start();
include("../connection/connection.php");
?>
<head>
<title>register item</title>
<link  href="mystyles.css" rel="stylesheet" type="text/css"/>
</head>
<body bgcolor="#B0C4DE">
<center>
<div id="divWrapper">
<table border=0 ><tr><td colspan="6">

<div id="divNav">

</div></td>
</tr>
<tr><tr><td>&nbsp;</td></tr>
<td><div id="divSideContentLeft"><h1>Stock clerk task</h1>
<?php
include("employeemenu.php");
?></div> </td>
<td><div id="divContentCenter">

<a href="searchperson.php">View person Profile</a> 
<form action="" method="post">
<fieldset><legend>Search person id</legend>
<input type="text" name="searchkey" pattern="[a-zA-Z0-9/]+" required>
&nbsp;<input type="submit" name="search" value="Search"></fieldset>
</form>

<?php
$server="localhost";
$dbuser="root";
$dbpass="";
$dbname="tms";
$con=mysqli_connect($server,$dbuser,$dbpass,$dbname) or mysqli_error($con);
	if($con)
{

	if(!isset($_POST["search"])&&!isset($_POST["update"])&&!isset($_POST["delete"])&&!isset($_POST["display"]))
	{
		$sql="select * from item";
		$recordfound=mysqli_query($con,$sql);
		if(mysqli_affected_rows($con))
			{echo "<table border=2>";
	echo"<tr><th> item<br>Register_ID</th><th> Srial<br>Number</th><th> Model</th><th>catagory</th><th>Description</th><th>Shelf<br>Number</th><th>Request_ID
	</th><th>Supplier_ID</th><th>Stockclerk_ID</th><th>price</th><th>Date</th></tr>";
	
		while($row=mysqli_fetch_array($recordfound))
		{
	echo "<tr><td>".$row['item_Register_ID']."</td><td>".$row['serial_numbre']."</td><td>".$row['item_model']."</td><td>".$row['catagory'].
			"</td><td>".$row['description']."</td><td>".$row['shelf_number']."</td><td>".$row['request_id']."</td><td>".$row['supplier_id']."
			</td><td>".$row['stockclerk_id']."</td><td>".$row['price']."</td><td>".$row['date']."</td></tr>";
		}
		echo "</table>";
		}else
			echo "No records found!";
	}else if(isset($_POST["search"])&&!isset($_POST["update"])&&!isset($_POST["delete"])&&!isset($_POST["display"]))
	{
		$searchkey=$_POST["searchkey"];
		$sql="select * from item where item_Register_ID='$searchkey'";
		$recordfound=mysqli_query($con,$sql);
		if(mysqli_affected_rows($con))
			{
				$row=mysqli_fetch_assoc($recordfound);
				echo "<h1>person Detail</h1>";
				echo "<form action='' method=post><table>
				<tr><td>itemRegister_ID:</td><td><input type=text name=id value='".$row["item_Register_ID"]."'readonly></td></tr>";		
				echo "<tr><td>Srial Number :</td><td><input type=text name=sn value='".$row["serial_numbre"]."' required></td></tr>";
				echo "<tr><td>Model:</td><td><input type=text name=mo value='".$row["item_model"]."' required></td></tr>";
				echo "<tr><td>catagory:</td><td><input type=text name=ca value='".$row["catagory"]."' required></td></tr>";
				echo "<tr><td>Description:</td><td><input type=text name=de value='".$row["description"]."' required></td></tr>";
				echo "<tr><td>ShelfNumber:</td><td><input type=text name=shn value='".$row["shelf_number"]."' required></td></tr>";
				echo "<tr><td>Request_ID:</td><td><input type=text name=rid value='".$row["request_id"]."' required></td></tr>";
				echo "<tr><td>Supplier_ID:</td><td><input type=text name=sid value='".$row["supplier_id"]."' required></td></tr>";
				echo "<tr><td>Stockclerk_ID :</td><td><input type=text name=stoid value='".$row["stockclerk_id"]."' required></td></tr>";
				echo "<tr><td>price :</td><td><input type=text name=price value='".$row["price"]."' required></td></tr>";
				echo "<tr><td>Date :</td><td><input type=text name=date value='".$row["date"]."' required></td></tr>";
					
					
				echo "<tr><td><input type=submit name=update value=update>";
				?>
<input type=submit name=delete value=Delete onclick="return confirm('Are you sure you want to delete this record?')"><input type=submit name=display value=Display></td></tr></table></form>
				<?php
			}else
				echo "No result found";
	}else if(!isset($_POST["search"])&&isset($_POST["update"])&&!isset($_POST["delete"])&&!isset($_POST["display"]))
	{
	$id=$_POST['id'];
	$sn=$_POST['sn'];
	$mo=$_POST['mo'];
	$ca=$_POST['ca'];
	$de=$_POST['de'];
	$shn=$_POST['shn'];
	$rid=$_POST['rid'];
	$sid=$_POST['sid'];
	$stid=$_POST['stoid'];
    $pr=$_POST['price'];
    $date=$_POST['date'];
    

$sql="Update item set serial_numbre='$sn',item_model='$mo',catagory='$ca',description='$de',shelf_number='$shn',request_id='$rid',supplier_id='$sid',
              stockclerk_id='$stid',price='$pr',date='$date' where item_Register_ID='$id'";
		$updated=mysqli_query($con,$sql);
		if(mysqli_affected_rows($con))
			echo mysqli_affected_rows($con)." record/s update successfully!";
		else
			echo "Unable to update!";
	}else if(!isset($_POST["search"])&&!isset($_POST["update"])&&isset($_POST["delete"])&&!isset($_POST["display"]))
	{
		$id=$_POST["id"];
		$sql="delete from item where item_Register_ID='$id'";
	$rs=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con))
		echo mysqli_affected_rows($con)." record/s deleted!";
	else
		echo "Unable to delete the record/s";
	
	}else if(!isset($_POST["search"])&&!isset($_POST["update"])&&!isset($_POST["delete"])&&isset($_POST["display"]))
	{
		$sql="select * from person";
		$recordfound=mysqli_query($con,$sql);
		if(mysqli_affected_rows($con))
			{
			echo "<table border=2>";
	echo"<tr><th> item<br>Register_ID</th><th> Srial<br>Number</th><th> Model</th><th>catagory</th><th>Description</th><th>Shelf<br>Number</th><th>Request_ID
	</th><th>Supplier_ID</th><th>Stockclerk_ID</th><th>price</th><th>Date</th></tr>";
		while($row=mysqli_fetch_array($recordfound))
		{
echo "<tr><td>".$row['item_Register_ID']."</td><td>".$row['serial_numbre']."</td><td>".$row['item_model']."</td><td>".$row['catagory'].
			"</td><td>".$row['description']."</td><td>".$row['shelf_number']."</td><td>".$row['request_id']."</td><td>".$row['supplier_id']."
			</td><td>".$row['stockclerk_id']."</td><td>".$row['price']."</td><td>".$row['date']."</td></tr>";
		}
		echo "</table>";
		}else
			echo "No records found!";
	}
}else
	echo "Unable to connect the database:".mysqli_error();

?>
</div>
</td>
</tr>


</table>
</div>
</center>
<!--?php
	

	header("location:login.php");	
?-->
</body>
</html>