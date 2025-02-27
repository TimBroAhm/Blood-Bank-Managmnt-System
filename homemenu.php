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
<style>
.dropbtn {
    background-color: #424766;
    color: white;
    width:200px;
    height:50px;
    margin-top:5px;
    border-radius:15px;
    border-color: 15px #0ea524;
    font-family: times new roman;
    font-size: 25px;
    transition: all 0.5s;
    cursor: pointer;
    border-radius: 4px;
   cursor: pointer;
}
.dropdown {
    position: relative;
    display: block;
}
.dropdown-content {
    position: absolute;
    right:5px;
    font-size: 20px;
    background-color: #cadadf;
    border-radius:7px;
    color: #ffffff;
    width:190px;
    line-height: 5px;
    //box-shadow: 3px 8px 16px 4px rgba(12,6,35,9.2);
    z-index: 1;
}
.dropdown-content a {
    color: black;
    padding:20px;
    font-size: 20px;
    text-decoration: none;
    color: #804bed;
    display: block;
}
.dropdown-content a:hover {
	background-color: #8B4513;
	color: #110000;

	}
.dropdown:hover .dropdown-content {
    display: block;
    background-color:#d6e4e3; 
    text-shadow: 10px;
    color: #2b060a;
    margin-left:180px;
}
</style>
</head>
<body>
<div class="dropdown" style="float:left;">
  	<button class="dropbtn">Inventory</button>
  <div class="dropdown-content" style="down:0;">
		<a href=uploadddd.php target="myframe"> Notice </a><hr>
	    <a href="viewbid.php" target="myframe"> Bids </a><hr>
 <a href="imageupload.php" target="myframe"> FeedBack </a><hr>

		   
  </div>
</div><br><br>
</body>
</html>