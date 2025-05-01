<?php
include("../connection/connection.php");  // Assuming your connection file creates a $con variable for the DB connection
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
        <img src="Images/logoo.jpg" width="1065" height="135">
    </td></tr></table>
    <div id="navigationmenu"></div>

    <div id="content">
        <table border="0" width="1000" height="500">
            <tr><td width="150">
            <div id="sideleft"></div>
            </td>
            <td width="300">
            <div style="width:660px;height: 600px; border:solid 4px #dldbeg; overflow: auto;">
                <div id="contentcenter">        

<?php
$id = $_GET['id'];  // Get the request ID from the URL
$query1 = mysqli_query($con, "UPDATE bloodrequest SET Status='yes', Unread='yes' WHERE Rqid='$id'");

if ($query1) {
    $x = '<script type="text/javascript">alert("Accepted Successfully!!!"); window.location=\'Recieverequest.php\';</script>';
    echo $x;
} else {
    // Handle the case if the query fails
    echo '<script type="text/javascript">alert("Error: ' . mysqli_error($con) . '");</script>';
}
?>

                </div>
            </div>
            </div>
        </td>
        <td width="150">
        </td>
        </tr>
    </table>
</div>
</div>
</body>
</html>
