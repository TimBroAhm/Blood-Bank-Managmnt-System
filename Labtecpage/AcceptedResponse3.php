<?php 
session_start();
include("../connection/connection.php");  // Assuming this file contains the $con connection variable
?>
<html>
<head>
<title>DateencoderRegisterBlood</title>
<link rel="Stylesheet" type="text/css" href="setting.css">
<link rel="stylesheet" href="stylesLogin.css">
<link rel="Stylesheet" type="text/css" href="Setting11.css">
</head>
<body>
<?php
if(isset($_SESSION['USER_NAME'])) {

    $uid = $_SESSION['USER_ID'];
    $uname = $_SESSION['USER_NAME'];
    $role = $_SESSION['ROLE'];

?>
<div id="container">
    
    
<div id="content">
    <table border="0" width="1000" height="500"><tr>
    <td width="300">
    <div style="width:660px;height: 600px;
    border:solid 4px #dldbeg;
    overflow: auto;">

    <div id="contentcenter">
    
<?php
//$id = $_GET['id']; // Get the blood ID from the query parameter

// Correct the query calls by including the $con connection variable as the first parameter
$query1 = mysqli_query($con, "UPDATE blood SET bstatus='NO' WHERE bid='4323'");

if ($query1) {
    $query2 = mysqli_query($con, "UPDATE bloodrequest SET status='accepted' WHERE bid='90'");
    if ($query2) {
        // Alert the user of success and redirect them
        echo '<script type="text/javascript">alert("Distributed successfully!!!");
      </script>';
    } else {
        echo "<p>Failed to update the request status.</p>";
    }
} else {
    echo "<p>Failed to update the blood status.</p>";
}
?>

</div></div>
    </div></td>
    
    </tr></table>
</div>

</div>
<?php
} else {
    header("location:Index.php");
}
?>
</body>
</html>
