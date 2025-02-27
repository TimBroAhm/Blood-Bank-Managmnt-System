<?php
session_start();
include"connection/connection.php";
$output = '';
if(isset($_POST['serach'])){  
$searchq = $_POST['serach']; 
$searchq = preg_replace("#[^0-9a-z]#i","",$searchq); 
$query = mysqli_query($con,"SELECT * FROM Employee WHERE FIRST_NAME LIKE '%$searchq%' OR LAST_ANAME LIKE '%$searchq%'") 
or die("could not sea");
$count = mysqli_num_rows($query);
if($count==0){
$output = 'there is no serach result';	
}
else{
	while($row= mysqli_fetch_array($query)){
		$fname = $row['FIRST_NAME'];
		$lname = $row['LAST_ANAME'];
		$id = $row['EID'];
		$output .= '<div>' .$fname.'&nbsp;'.$lname.'</div>';
	}
}
}
?>

<html>
<head>
</head>
<style>
.ser form{
margin-left:54px;
padding:54px;	
}
</style>
<body>
<div class="ser">
<form action="search.php" method="post">
<input type="text" name="serach" placeholder="search member..."/>
<input type="submit" value=">>"/>
</form>
</div>
<?php 
print("$output");
?>
</body>
</html>
