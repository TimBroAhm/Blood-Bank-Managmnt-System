
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
<form action="ScheduleRequest.php" method="post">
<label><?php echo htmlspecialchars($lang['enterbordno']);?></label></br>
<input type="text" name="serach" placeholder="" required="required"/>
<input type="submit" value=">>"/>
</form>
</div>
</body>
</html>


