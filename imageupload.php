
<?php
include("connection/connection.php");  
 session_start();
?>

<? php
$msg = "";
if(isset($_POST['upload'])){
	$target = "images/".basename($_FILES['image']['name']);
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
<?php include'Language/lang.php';?>
<style>
.upload {
	padding:13px;
	margin-left:55px;
}
</style>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script src="js/jquery-3.3.1.js" type="text/javascript"></script>
 <script src="js/imageupload.js" type="text/javascript"></script>
</head>
<body>
<div class="upload">
<fieldset>
<legend><?php echo htmlspecialchars($lang['upload']);?></legend> 
<form method="post" action="imageupload.php" enctype="multipart/form-data"id="cform">
<style>
.request select{
	width:155px;
}
</style>
	<div class="request">
		<label><?php echo htmlspecialchars($lang['notice']);?></label></br>
		<select name="asso"id="notice">
		
		<option>please choose</option>
		<option>For All </option>
        <?php
 $cdquery="SELECT *FROM association";
            $cdresult=mysql_query($cdquery,$con);
           while ($cdrow=mysql_fetch_array($cdresult)) {
     ?>
	 <option><?php echo $cdrow['ASSOCIATION_NAME'];?></option>
	 <?php
            
            }

            ?>
    
        </select> 
<span><i id="notice_error"></i></span>		
		</div>
		<div>
<label><?php echo htmlspecialchars($lang['Image']);?></label></br>
<input type="hidden"name="size"value="100000">
<input type="file"name="image"id="image">
<span><i id="image_error"></i></span></div>
<div>
<label><?php echo htmlspecialchars($lang['text']);?></label></br>
<textarea name="text"cols="40"rows="4"id="comment"></textarea>
<span><i id="comment_error"></i></span>
</div>
<input type="submit" name="upload" value="<?php echo htmlspecialchars($lang['uppload']);?>">
</form>
</fieldset>
</div>
</body>
</html>