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
<!--meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="div.css" />
<link href="photo/a.jpeg" rel="shortcut icon" type="image/x-icon"/>
<title>admin page</title>
 <link href="jsImgSlider/themes/8/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="jsImgSlider/themes/8/js-image-slider.js" type="text/javascript"></script>
    <link href="jsImgSlider/themes/8/tooltip.css" rel="stylesheet" type="text/css" />
    <script src="jsImgSlider/themes/8/tooltip.js" type="text/javascript"></script>
    <link href="jsImgSlider/generic.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="out.css">
    <script type="text/javascript">
        imageSlider.thumbnailPreview(function (thumbIndex) { return "<img src='images/thumb" + (thumbIndex + 1) + ".jpg' style='width:100px;height:60px;' />"; });
    </script>
</head-->
<?php
//session_start();
//include("connection.php");
?>
<html>
<body  bgcolor="#B0C4DE">
<head>
<title></title>
<link  href="mystyles.css" rel="stylesheet" type="text/css"/>
</head><center>
<div id="divWrapper">
<table border="0">
<tr><td >

<div id="divNav">

</div>
</td></tr>

<tr>

<td><br></br><div id="divSideContentLeft">
</div>
</td><td>
<br /><br />
<div id="divContentCenter">


<script type = "text/javascript" >
 function preventBack()
 {
 window.history.forward();
 } 
 setTimeout("preventBack()", 0); 
 window.onunload=function(){null};
 
  </script>
  


		  
		  
 
 
 
 
									
<?php

$tables = array();
$query = mysqli_query($con, 'SHOW TABLES');
while($row = mysqli_fetch_row($query))
{
     $tables[] = $row[0];
}

$result = "";
foreach($tables as $table)
{
$query = mysqli_query($con, 'SELECT * FROM '.$table);
$num_fields = mysqli_num_fields($query);

$result .= 'DROP TABLE IF EXISTS '.$table.';';
$row2 = mysqli_fetch_row(mysqli_query($con, 'SHOW CREATE TABLE '.$table));
$result .= "\n\n".$row2[1].";\n\n";

for ($i = 0; $i < $num_fields; $i++)
 {
while($row = mysqli_fetch_row($query))
{
   $result .= 'INSERT INTO '.$table.' VALUES(';
     for($j=0; $j<$num_fields; $j++)
     {
       $row[$j] = addslashes($row[$j]);
       $row[$j] = str_replace("\n","\\n",$row[$j]);
       if(isset($row[$j]))
       {
		   $result .= '"'.$row[$j].'"' ; 
		}
		else
		{ 
			$result .= '""';
		}
		if($j<($num_fields-1))
		{ 
			$result .= ',';
		}
    }
   	$result .= ");\n";
}
}
$result .="\n\n";
}

//Create Folder
$folder = 'C:/wamp64/www/tras/';
if (!is_dir($folder))
mkdir($folder, 0777, true);
chmod($folder, 0777);

//$date = date('m-d-Y-h-m-s'); 
$filename = $folder."ims"; 

$handle = fopen($filename.'.sql','w+');
fwrite($handle,$result);
fclose($handle);
?>

	
	<?php
	
        echo "<script>alert('Database Backed Up Successfully!');</script>.</a> </h2>";
        echo "<tr><td>Path: ".$filename."</td></tr>";
    ?>
	

</div></td></tr>
</table>
</div></center>

</body>
</html>