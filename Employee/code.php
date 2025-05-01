<?php
$exp_date="2021/05/03";
$today_date=date('Y/m/d');
//convert to sorttime
$exp = strtotime($exp_date);
$td = strtotime($today_date);
//compare 
	$diff = $td-$exp; 
	$x=abs(floor($diff / (60 * 60 * 24)));
	if($x<30){
		echo"canot update";
	}
	

else{
	echo"gooodmring";
	echo"<br/>".$x;
	
}
?>
<html>
</html>
