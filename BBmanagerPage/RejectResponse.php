<?php
include("../connection/connection.php");
session_start();
?>
<html>
<head>
    <title>requestform</title>
    <link rel="Stylesheet" type="text/css" href="setting.css">
    <link rel="stylesheet" href="stylesLogin.css">
</head>
<body>
<div id="container">
    <table><tr><td><img src="Images/logoo.jpg" width="1065" height="135"></td></tr></table>

    <div id="content">
        <table border="0" width="1000" height="500"><tr><td width="150"><div id="sideleft"></div></td>
        <td width="300">
            <div style="width:660px;height: 600px; border:solid 4px #dldbeg; overflow: auto;">
                <div id="contentcenter">
                    <?php
                    if (isset($_POST['submit'])) {
                        $tx = $_POST['message'];	
                        $id = $_SESSION['USER_ID'];

                        $query1 = mysqli_query($con, "UPDATE bloodrequest SET status='$tx' WHERE sid='$id'");
                        if ($query1) {
                            echo "<script>alert('Rejected Successfully!!!'); window.location='Recieverequest.php';</script>";
                        } else {
                            echo "<div style='color:red;'>Error updating record: " . mysqli_error($con) . "</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </td>
        <td width="150">
            <div id="sideright">
                <?php include("Calander.php"); ?>
            </div>
        </td></tr></table>
    </div>

    <table width="1000"><tr><td><?php include("footer.php"); ?></td></tr></table>
</div>
</body>
</html>
