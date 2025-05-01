<?php
include("../connection/connection.php"); // Make sure this connects correctly
?>
<html>
<head>
<title>requestform</title>
<link rel="Stylesheet" type="text/css" href="setting.css">
<link rel="stylesheet" href="stylesLogin.css">
</head>
<body>
<div id="container">
    <table><tr><td>
        <img src="images/logoo.jpg" width="1065" height="135">
    </td></tr></table>
    <div id="navigationmenu"></div>
    <div id="content">
        <table border="0" width="100" height="500">
            <tr>
                <td width="150">
                    <div id="sideleft"></div>
                </td>
                <td width="300">
                    <div style="width:660px; height: 600px; border: solid 4px #dldbeg; overflow: auto;">
                        <div id="contentcenter">
<?php
$id = $_GET['id'];  // Get the appointment ID from the URL
// Ensure $con is the correct MySQLi connection resource
$query1 = mysqli_query($con, "UPDATE appointment SET nurse_status='read' WHERE appid='$id'");

if ($query1) {
    echo "<div id='success'>Accepted!!!</div>";
} else {
    echo "<div id='error'>Error updating status: " . mysqli_error($con) . "</div>";
}
?>
                        </div>
                    </div>
                </div>
            </td>
            <td width="150"></td>
        </tr>
    </table>
</div>
</div>
</body>
</html>
