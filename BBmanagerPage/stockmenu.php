<html>
<head>
<style>
.dropbtn {
    background-color: #2babbd;
    color: white;
    width:200px;
    height:50px;
    margin-top: -20px;
    border-radius:15px;
    border-color: 15px #0ea524;
    font-family: times new roman;
    font-size: 20px;
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
    display: none;
    position: absolute;
    right:20px;
    background-color: #291018;
    border-radius:7px;
    width:180px;
    line-height: 5px;
    box-shadow: 3px 8px 16px 4px rgba(12,6,35,9.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding:10px;
    font-size: 15px;
    text-decoration: none;
    color: #804bed;
    display: block;
}

.dropdown-content a:hover {
	background-color: #8B4513;
	color: #fffbfb;
	line-height:10px;
	}

.dropdown:hover .dropdown-content {
    display: block;
    background-color:#b3e0e3; 
    text-shadow: 10px;
    color: #ebfafe;
    margin-left:200px;
   margin-top: -50px;
    
}

.dropdown:hover .dropbtn {
	color: #fff7f7;
    background-color: #8B4513;
}
.rarrow{
	font-size:13px;
	position:absolute;
	top:0px;
	right:4px;
	margin-left:150px;
	top:0px;
}
</style>
</head>
<body>

  <div class="dropdown" style="float:left;">
  <button class="dropbtn">Register</button>
  <div class="dropdown-content" style="left:0;">
		     <a href="registeremployee.php">Register employee</a>
		     <a href="registeritem.php"> Register Item </a>
		     <a href="withdrawitem.php"> Item Withdraw</a>
			<a href="transferitem.php"> Item Transfer</a>
			<a href="registeroffice.php"> Register office </a>
			<a href="registercollage.php"> Register collage </a>
			<a href="registerdept.php"> Register Department </a>
			<a href="registerpostion.php"> Register postion </a>
			<a href="registersupplier.php"> Register supplier </a>
			
	
  </div><br><br>
</div>

<div class="dropdown" style="float:left;">
  <button class="dropbtn">view</button>
  <div class="dropdown-content" style="left:0;">
                        <a href="viewemployee.php">view employee </a>
		              <a href="viewitem.php">View Item</a>
		              <a href="viewwithdrawitemstock.php">view withdraw </a>
			          <a href="viewtransferitem.php">View transfer item </a>
			          <a href="viewoffice.php">view office </a>
			          <a href="viewcollage.php">view collage </a>
			          <a href="viewdept.php">view department </a>
			          <a href="viewpostion.php">View postion </a>
			          <a href="viewsupplier.php">View supplier </a>
			        
	       
  </div><br><br>
  </div>
  
  <div class="dropdown" style="float:left;">
  <button class="dropbtn">Update</button>
  <div class="dropdown-content" style="left:0;">
                <a href="editeemployee.php">update employee </a>
                <a href="editeitem.php">update item </a>
                <a href="editewithdraw.php">update withdraw item  </a>
                <a href="editetransfer.php">update transfer item </a>
               <a href="editoffice.php">update office </a>
                <a href="editcollage.php">update collage </a>
                <a href="editdept.php">update department </a>
                 <a href="editepostion.php">update postion </a>    
                <a href="updatesupplier.php">update supplier </a>
      
        
  </div><br><br>
  </div>
</body>
<li><a href="viewallowedemployee.php"><h3>view allwed employee</h3>  </a</li>
<li><a href="changepassworedstock.php"><h3>ChangPasswored</a> </h3></li>
</html>
<html>
<body>
	
</body></html>