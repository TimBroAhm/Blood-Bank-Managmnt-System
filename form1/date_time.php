<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <style>
.left {
     display:block;
	width:60px;
	height:72px;
	line-height:25px;
	color:white;
	margin-left:1200px;
	margin-top:49px;
	text-decoration:none;
	border:1px  CornflowerBlue ;
	
	}
    </style>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Display Date and Time in Javascript</title>
        <script type="text/javascript" src="date_time.js"></script>
    </head>
    <body><div class="left"><table style="width:59px;" ><tr >
    <td style="background-color:#219DA7; height:100px; color:black;">
             <h1 style="margin-left:5px; color:#3C3C3C;">Calander</h1>
            <span id="date_time"></span>
            <script type="text/javascript">window.onload = date_time('date_time');</script></td></tr>
            <tr><td><a href="#"><img src="image/i.jpg" width="200px" height="300px"/></a></td></tr></table>
   </div> </body>
</html>