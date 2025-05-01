<?php
$con=mysql_connect('localhost','root','');
if($con){
}
else
{
	echo "not connected";
}
$sel=mysql_select_db('TMS',$con);
if(!$sel){
    echo 'TMS is not select ';
}
?>