
<html>
<head>
<?php include"../Language/lang.php";?>
<meta charset="utf-8">
</head>
<style>
.ser form{
margin-left:558px;
padding:5px;
font-style:italic;
font-size:16px;
font-family:cambria;	
}
</style>
<body>
<div class="ser">
<form action="SchedulePreparation.php" method="post">
<label><?php echo htmlspecialchars($lang['operatorid']);?></label></br>
<select type="text" name="serach"  required="required">
<?php
 include"../connection/connection.php";
   $cdquery="SELECT *FROM request where ACCEPTED='accepted'";
            $cdresult=mysqli_query($con,$cdquery);
            
            while ($cdrow=mysqli_fetch_array($cdresult)) {
     ?>
	 <option><?php echo $cdrow['REQUAST_ID'];?></option>
	 <?php
            
            }

            ?>
</select>
<input type="submit" value=">>"/>
</form>
</div>
</body>
</html>


