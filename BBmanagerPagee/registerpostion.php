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
<title>postion </title>
<link rel="stylesheet" type="text/css" href="../css/emloyeestyle.css">
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script src="../js/jquery-3.3.1.js" type="text/javascript"></script>
<script type="text/JavaScript" src="../js/employeeregister.js"> </script>
<meta charset="utf-8">

</head>
<body bgcolor="white">
<div class="header">
<h1>Postion Registration form  </h1>
</div>
<div id="wrapper">

<form method="POST"action=""onsubmit="return validate()"name="vfrom" id="cform">

<div>
		<label>Employee ID<label></br>
<input type="text" name="eid"class="textInput" id="eid" required>
<span><i id="fname_error"class="val_error"></i></span>
			</div>
			
<div>
    <label for="dept_office_collage_id">Dept/Office/Collage ID</label><br> 
    <select name="idd" id="dept_office_collage_id" required placeholder="Enter collage ID or office/dept id" 
            style="width: 25%; height: 15%; border-radius: 4px; font-size: 15px; box-sizing: border-box; border: 1px solid #060907; padding: 0px;">
        <option value="" selected>Choose</option>
        <?php
        // Replace mysql_* with mysqli_* for improved security and compatibility
        $mysqli = new mysqli("localhost", "root", "", "tms");

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        $result_office = $mysqli->query("SELECT office_id, office_name FROM office");
        $result_collage = $mysqli->query("SELECT collage_id, collage_name FROM collage");
        $result_department = $mysqli->query("SELECT Did, Dept_Name FROM department");

        while ($row = $result_office->fetch_assoc()) {
            ?>
            <option value="<?php echo $row['office_id']; ?>"><?php echo $row['office_name']; ?></option>
            <?php
        }

        while ($row = $result_collage->fetch_assoc()) {
            ?>
            <option value="<?php echo $row['collage_id']; ?>"><?php echo $row['collage_name']; ?></option>
            <?php
        }

        while ($row = $result_department->fetch_assoc()) {
            ?>
            <option value="<?php echo $row['Did']; ?>"><?php echo $row['Dept_Name']; ?></option>
            <?php
        }

        $result_office->free();
        $result_collage->free();
        $result_department->free();
        $mysqli->close();
        ?>
    </select>
    <span><i id="fname_error" class="val_error"></i></span>
</div>
			
<div>
		<label> DateOfRegistration<label></br>
<input type="date" name="date"class="textInput" id="date" value="<?php echo date('Y-m-d');?>">
<span><i id="fname_error"class="val_error"></i></span>
			</div>
			
				
				<div>
			<input type="submit" value="submit" class="btn"name="register">
			<input type="reset" value="reset" class="btn"name="register">
		</div>
	</form>

	</div>

<?php
if(isset($_POST["register"]))
{
	$ln=$_POST["eid"];
	$id=$_POST["idd"];
$sql = mysqli_query($con,"SELECT * FROM employee where Employee_id='$ln' && Employe_status='onduty' ");
if(mysqli_affected_rows($con))
{
	if($con)
	{
		
			$sql="insert into postion values('Office','identity','$ln','$id','Active',Now())";
			$inserted=mysqli_query($con,$sql);
			if(mysqli_affected_rows($con))
				echo "Postion registered successfully!";
		//header("location:admin.php");
			else	
				echo "Unable to register the postion";
	
		
		}
	else
		echo "Connection Failed";
		}
	else
		echo "Employee is not active!";
}
?>

</body>
</html>
