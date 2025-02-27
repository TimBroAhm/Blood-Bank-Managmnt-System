
<?php
session_start();
include"../connection/connection.php";
if(isset($_POST['serach'])){  
$searchq = $_POST['serach']; 
$query = mysqli_query($con,"SELECT *FROM schedule WHERE BORD_NUMBER = '$searchq'") 
or die("could not sea");

while($row= mysqli_fetch_array($query)){
$a1=$_SESSION['USER_NAME'];
$r2 = $row["LEVEL"];
$r3 = $row["BORD_NUMBER"];
$r4 = $row["INITIAL_PLACE"];
$r5 = $row["DESTINATION_PLACE"];
$r6 = $row["TARIFF"];			
}
$query1 = mysqli_query($con,"SELECT *FROM birrpassenger WHERE UserName='$_SESSION[USER_NAME]'");
while($row1= mysqli_fetch_array($query1)){
$r7 = $row1["AccountNo"];}
}
echo"</br>";
?>
 
 <!DOCTYPE html>
<html>
<head>
	<title>tiket reservation</title>
<link rel="stylesheet" type="text/css" 
href="../css/tiket.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 
<script type="text/JavaScript" src="../js/shcedulerequest.js"> </script>
<?php include"../Language/lang.php";?>
<meta charset="utf-8">
</head>
<body bgcolor="white">
<div class="header">
<h1><?php echo htmlspecialchars($lang['h']);?></h1>
</div>
<div id="wrapper">
	<form method="POST"action="ticket.php"onsubmit="return validate()"name="vfrom"id="cform">
				<style>
	.request select{
	 width:180px;
     height:26px;	
     border-radius:5px;	   
		}
		</style>
		
		<div class="request">
		     <label><?php echo htmlspecialchars($lang['uname']);?></label></br>
		<input type="text"readonly name="asso"value="<?php echo $a1;?>"> 
		</div>
		 <div>
		<label><?php echo htmlspecialchars($lang['bordno']);?></label>
		<input type="text"value="<?php echo $r3;?>"readonly name="bord"class="textInput">
		<div id="ass_error"class="val_error"></div>	
		</div>
		<div>
		<label><?php echo htmlspecialchars($lang['from']);?></label></br>
		<input type="text"readonly name="start" value="<?php echo $r4;?>">
		</div>
		
		<div>
		<label><?php echo htmlspecialchars($lang['tto']);?></label></br>
		<input type="text"readonly name="end" value="<?php echo $r5;?>">
		</div>
		<div>
		<label><?php echo htmlspecialchars($lang['level']);?></label></br>
		<input type="text"readonly name="level" value="<?php echo $r2;?>">
		</div>
		<div>
		<label><?php echo htmlspecialchars($lang['tarif']);?></label></br>
		<input type="text"readonly name="price" value="<?php echo $r6;?>">
		</div>
		<div>
		<label><?php echo htmlspecialchars($lang['acc']);?></label></br>
		<input type="text"readonly name="accountno" value="<?php echo $r7;?>">
		</div>
		<div>
		<div>
		    <label><?php echo htmlspecialchars($lang['ho']);?></label></br>
		<select type="text" name="seatno" id="kebel" class="textInput">
		<option> </option>
		<option>01</option>
		<option>02</option>
		<option>03</option>
		<option>04</option>
		<option>05</option>
		<option>06</option>
		<option>07</option>
		<option>08</option>
		<option>09</option>
		<option>10</option>
		<option>11</option>
		<option>12</option>
		<option>13</option>
		<option>14</option>
		<option>15</option>
		<option>16</option>
		<option>17</option>
		<option>18</option>
		<option>19</option>
		<option>20</option>
		<option>21</option>
		<option>01</option>
		<option>02</option>
		<option>03</option>
		<option>04</option>
		<option>05</option>
		<option>06</option>
		<option>07</option>
		<option>08</option>
		<option>09</option>
		<option>10</option>
		<option>11</option>
		<option>12</option>
		<option>13</option>
		<option>14</option>
		<option>15</option>
		<option>16</option>
		<option>17</option>
		<option>18</option>
		<option>19</option>
		<option>20</option>
		<option>21</option>
		<option>22</option>
		<option>23</option>
		<option>24</option>
		<option>25</option>
		<option>26</option>
		<option>27</option>
		<option>28</option>
		<option>29</option>
		<option>30</option>
		<option>31</option>
		<option>32</option>
		<option>33</option>
		<option>34</option>
		<option>35</option>
		<option>36</option>
		<option>37</option>
		<option>38</option>
		<option>39</option>
		<option>40</option>
		<option>41</option>
		<option>42</option>
		<option>43</option>
		<option>44</option>
		<option>45</option>
		<option>46</option>
		<option>47</option>
		<option>48</option>
		<option>49</option>
		<option>50</option>
		<option>51</option>
		<option>52</option>
		<option>53</option>
		<option>54</option>
		<option>55</option>
		<option>56</option>
		<option>57</option>
		<option>58</option>
		<option>59</option>
		<option>60</option>
		<option>61</option>
		<option>62</option>
		<option>63</option>
		<option>64</option>
		</select>
			<span> <i id="kebele_error"class="val_error"></i></span>
		</div>
		    <label><?php echo htmlspecialchars($lang['date']);?></label></br>
			<input type="date" name="date"class="textInput"id="from"required>
			<div id="from_error"class="val_error"></div>
		</div>
		
		<div>
		    <label><?php echo htmlspecialchars($lang['phone']);?></label></br>
			<input type="text" name="phone"class="textInput"id="to"required>
			<div id="to_error"class="val_error"></div>
		</div>
		
		<div>
			<input type="submit" value="<?php echo htmlspecialchars($lang['register']);?>" class="btn"name="Applay">
			<input type="reset" value="<?php echo htmlspecialchars($lang['reset']);?>" class="btn"name="reset">
		</div>
	</form>
</div>
</body>
</html>
<script>
function lettersOnly(input){
var regex=/[^a-z]/gi;
input.value=input.value.replace(regex,"");
}
</script>