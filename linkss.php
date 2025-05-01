<html>
<head>
<link rel="stylesheet"
type="text/css"
href="css/sttyle.css">
<?php include'Language/lang.php';?>
<meta charset="utf-8">
</head>
<div id="links">
	<ul>
	<li><a href="index.php"><?php echo htmlspecialchars($lang['home']);?></a>
	</li>
	<li><a href=><?php echo htmlspecialchars($lang['t']);?></a>
	<ul>
	<li><a href="aboutorganization.php"target="myframe"><?php echo htmlspecialchars($lang['org']);?></a></li>
	<li><a href="about us.php"target="myframe"><?php echo htmlspecialchars($lang['devv']);?></a></li>
	</ul>
	
	<!--contact us start-->
	<html>
<head><style>
.modalDialog {
	position: fixed;
	font-family: Arial, Helvetica, sans-serif;
	top: 16;
	right: 0;
	bottom: 0;
	left: 0;
	background: rgba(0,0,0,0.3);
	 opacity:0;
	-webkit-transition: opacity 400ms ease-in;
	-moz-transition: opacity 400ms ease-in;
	transition: opacity 400ms ease-in;/*britness close and open time */
	pointer-events: none;-->
	
}
.modalDialog:target {
	opacity:1;
	pointer-events: auto; /* to close*/
}

.modalDialog > div {
	width: 650px;
	position: relative;
	margin: 7% auto;
	padding: 0px 20px 13px 20px;
	border-radius: 10px;
	background: #fff;
	border:4px solid red;
}
</style>
</head>
<body>
 <li><a href="#openModal"><?php echo htmlspecialchars($lang['cus']);?></a></li>
				                    <div id="openModal" class="modalDialog">
	                                   <div>
		                                 <a href="#close" title="Close"  style="color:blue;font-family:Cambria;font-size:14;text-decoration:none;color:red"><?php echo htmlspecialchars($lang['close']);?></a>
		                                    <table width="648" height="200"bgcolor="white"><tr>
								              <td colspan="2" style="color:blue;font-family:Cambria;font-size:25"><?php echo htmlspecialchars($lang['use']);?></td>
								                </tr>
	             								   <tr>
				            				         <td><img src="images/phon-img.jpeg" width="50" height="30"><?php echo htmlspecialchars($lang['office']);?>: 000465758</td>
								                       </tr>
									                      <tr>
								                             
								                                 </tr>
									                                <tr>
								                                  <td><img src="images/email.jpg" width="50" height="30"><?php echo htmlspecialchars($lang['man']);?>: 09239945688 </td>
								                               </tr>
									                        <tr>
								                         <td><img src="images/pobox.jpeg" width="50" height="30">Po Box 4000 </td>
    					                             </tr>
							                      <tr><td> <i><b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars($lang['info']);?></i></b></td></tr>
							              </table>
										  <table bgcolor="#ccc"width="648">
										  <td><b><?php echo htmlspecialchars($lang['lab']);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td><td><b><?php echo htmlspecialchars($lang['manname']);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td><td><b><?php echo htmlspecialchars($lang['phone']);?></b></td></tr>
										 <td><?php echo htmlspecialchars($lang['dor']);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><?php echo htmlspecialchars($lang['mizan']);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>09715962</td></tr>
										 <td><?php echo htmlspecialchars($lang['sek']);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><?php echo htmlspecialchars($lang['seble']);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>09720499</td></tr>
										 <td><?php echo htmlspecialchars($lang['bbm']);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><?php echo htmlspecialchars($lang['mahrie']);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>0919159</td></tr>
										 <td><?php echo htmlspecialchars($lang['nurse']);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><?php echo htmlspecialchars($lang['melkam']);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>090386</td></tr>
										 <td><?php echo htmlspecialchars($lang['off']);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><?php echo htmlspecialchars($lang['mersha']);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td><td>0920084</td></tr>
										 <td><?php echo htmlspecialchars($lang['emp']);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><?php echo htmlspecialchars($lang['ashenafie']);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>0900202</td></tr>
										 
														
										 </table>
	                                    </div>
                                    </div>
									</body>
									</html>
									<!--contact uc end-->
	
	</li>
	<li><a href="#"><?php echo htmlspecialchars($lang['view']);?></a>
	<ul>
	
	<li><a href="uploadddd.php"target="myframe"><?php echo htmlspecialchars($lang['viewnotice']);?></a></li>
	
	</ul>
	</li>	
	<li><a href="login.php"target="myframe"><?php echo htmlspecialchars($lang['login']);?></a></li>
	<li><a><?php echo htmlspecialchars($lang['help']);?></a>
	<ul>
	<li><a href="help/vediohelp.php"target="myframe"><?php echo htmlspecialchars($lang['video']);?></a></li>
	<li><a href="help/help.php"target="myframe"><?php echo htmlspecialchars($lang['text']);?></a></li>
	</ul>
	</li>
	<style>
	.lang a{
		
	color:white;
text-decoration:none;	
	}
	</style>
	<div class="lang">
	<a href ="index.php? lang=en">English &nbsp;||</a> <a href ="index.php? lang=it">አማርኛ </a>
	</div>
	</ul>
	</html>