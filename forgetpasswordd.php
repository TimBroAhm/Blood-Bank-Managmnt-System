<?php
 session_start();
 include "connection/connection.php";?>
<html>
<head>
<link rel="stylesheet"
type="text/css"
href="css/bb.css">
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script src="js/jquery-3.3.1.js" type="text/javascript"></script>
 <script src="js/createaccvalidation.js" type="text/javascript"></script>
 <meta charset="utf-8">
<?php include'Language/lang.php';?>
</head>
<body>
<div class="header">
<h1><?php echo htmlspecialchars($lang['for']);?></h1>
</div>
<form method="POST"action="forget.php" onsubmit="return Validate()"name="vform"id="cform">

<div class="input-group">
<label><?php echo htmlspecialchars($lang['username']);?></label>
<input type="text" name="username"class="textInput"id="un"required>
<span><i id="uname_error"></i></span>
</div>

<div class="input-group">
<label> <?php echo htmlspecialchars($lang['email']);?></label>
<input type="text"id="em"name="email"><span><i id="email_error"required></i></span>
</div>

<div class="input-group">
<button type="submit" name="create" class="btn"><?php echo htmlspecialchars($lang['send']);?></button>
<button type="reset" name="Reset" class="btn"><?php echo htmlspecialchars($lang['reset']);?></button>
</div>
</form>
</body>
</html>
<script>
function lettersOnly(input){
var regex=/[^a-z]/gi;
input.value=input.value.replace(regex,"");
}
function numbersOnly(input){
var regex=/[^0-9]/gi;
input.value=input.value.replace(regex,"");
}
</script>
