
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
  alert(window.location='login.php');
 </script>
 <?php
 }
 ?>


<?php
$msg = "";
if(isset($_POST['upload'])){
	$target = "../images/".basename($_FILES['image']['name']);
	$da = date("y-m-d");
	$notice=$_POST['asso'];
	$image = $_FILES['image']['name'];
	$text = $_POST['text'];
	$sql = "INSERT INTO upload VALUES ('$da','$notice','$image','$text','$_SESSION[USER_ID]')";
     mysqli_query($con,$sql);
	if(move_uploaded_file($_FILES['image']['tmp_name'], $target )){
		$msg ="image is uplod seccessfully";
	}
	else{
		$msg = "in not uploded";
	}
	}

?>
<html>
<head>
<link rel="stylesheet"
type="text/css"
href="css/sttyle.css">
<?php include'../Language/lang.php';?>
<style>
.upload {
	padding:13px;
	margin-left:55px;
}
</style>
</head>
<body>
<div class="upload">
<fieldset>
<legend><?php echo htmlspecialchars($lang['upload']);?></legend> 
<form method="post" action="imageupload.php" enctype="multipart/form-data">
<style>
.request select{
	width:155px;
}
</style>
	<div class="request">
		<label><?php echo htmlspecialchars($lang['notice']);?></label></br>
		<select name="asso"required="required">
		<option></option>
		<option>For All  </option>
        <?php
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
            ?>
    
        </select>  
		</div>
<label><?php echo htmlspecialchars($lang['Image']);?></label></br>
<input type="hidden"name="size"value="100000">
<input type="file"required="required"name="image"></br>
<label><?php echo htmlspecialchars($lang['text']);?></label></br>
<textarea name="text"required="required"cols="40"rows="4"></textarea>
</br></br>
<input type="submit" name="upload"value="<?php echo htmlspecialchars($lang['uppload']);?>">
</form>
</fieldset>
</div>
</body>
</html>