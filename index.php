
<html>
<head>
<META Http-Equiv="Cache-Control" Content="no-cache"/>
<META Http-Equiv="Pragma" Content="no-cache"/>
<META Http-Equiv="Expires" Content="0"/>
<meta charset="utf-8">
<title> index</title>
<link rel="stylesheet"
type="text/css"
href="css/sttyle.css">
<script>
 function preventBack(){
	 window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onclick=function()
	{null};
</script>
</head>
<body >
<div id="container">
<header><table border="4px" color="white"><tr><td>
<img src="images/blod.jpeg" height="70px"width="190px"/>
</td></br><td><img src="images/LOG.GIF" width="870" height="70px"/></td>
<td><img src="images/bann.jpeg" height="70px" width="240px"/></td></tr></table>
</header>
	<?php include'links.php';
	?>
	</div>
	<div id="main">
	<div id="sidebar1">
	
            </br>
	<div id="selectid">

</div>
<style>
#assocation{
  text-align:center;
  width:50%;
  font-size:18px;
  opacity:0.9;
  font-family:Cambria;
  padding-top:48px;
  
  }
#assocation ul {
 margin:0;
 padding:3;
 list-style:none;
 position:relative;
 margin-left:20px;
 background:#BCC6CC;
 width:240px;
}
#assocation ul li a{
 display:block;
 padding:10px;
 text-decoration:none;
 width:240px;
 color:black;

}
#assocation ul:after {
content:"";clear: both;
display:block;
	}
#assocation ul li {
margin-right:1px;
float:left;
list-style:none;

	 }
#assocation ul li:hover{
background-color:white;
 width:240px;

		}
#assocation ul li a:hover{
color:black;
		}
</style>
</head>
	<div id="assocation" style="background-image: url('images/29.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; width: 100%; height: 200px;">
	
 <ul>
	    <li><a href="Announcement.php" target="myframe"><?php echo htmlspecialchars($lang['docc']);?></a></li>
	 </ul>
	 
	 <ul>
	    <li><a href="Download.php" target="myframe"><?php echo htmlspecialchars($lang['dan']);?></a></li>
	 </ul>
	 
	  <ul>
	    <li><a href="Gallery.php" target="myframe"><?php echo htmlspecialchars($lang['gal']);?></a></li>
	 </ul>
	 
	 <ul>
	    <li><a href="uploadddd.php" target="myframe"><?php echo htmlspecialchars($lang['noti']);?></a></li>
	 </ul>
	
	 <ul>
	    <li><a href="feadBack.php" target="myframe"><?php echo htmlspecialchars($lang['feedd']);?></a></li>
	 </ul>
</div>

<?php echo $lang['responseed']; ?>

	</div>
	<div id="sidebar2">
			<?php 
			include 'timecalendar.php';
			?> <br/></br>            
<div id="marq"><table border="0px"><tr><td>
<object bgcolor="#BCC6CC"width="850" height="168">
  <param name="movie" value="images/goldenthree.jpeg" />
  <embed bgcolor="#BCC6CC"src="project.swf"
         quality="high"
         type="application/x-shockwave-flash"
         width="270"
         height="166"
          />
</object>
 </td></tr></table></div>
 </br>
	<?php 
	include 'indeximage.php';
	?>
	</div>
	<div id="column1"> 
	<?php 
	include 'iframforindex.php';
	?>
	</div>
	</div>
	</body>
    <footer>
	<?php 
	include 'footer.php';
	?>
	</footer>
</html>