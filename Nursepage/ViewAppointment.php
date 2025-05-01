<?php
session_start();
include("../connection/connection.php"); // Make sure this sets $con as mysqli connection

$uid=$_SESSION['USER_ID'];
	$uname=$_SESSION['USER_NAME'];
	$role=$_SESSION['ROLE'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Donor Appointment</title>
    <link rel="stylesheet" type="text/css" href="setting.css">
    <link rel="stylesheet" href="stylesLogin.css">
    <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="src/jquery.js" type="text/javascript"></script>
    <script src="src/facebox.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('a[rel*=facebox]').facebox({
                loadingImage: 'src/loading.gif',
                closeImage: 'src/closelabel.png'
            });
        });
    </script>
</head>
<body>

<div id="container">
    

    <div id="navigationmenu"></div>

    <div id="content">
        <table border="0" width="100" height="500">
            <tr>
                <td width="150"></td>
                <td width="700">
                    <div style="width:625px; height:600px; border:solid 4px #dldbeg; overflow:auto;">
                        <div id="contentcenter">
                            <div class="loginBoxx">
                                <fieldset style="border-radius: 25px; background-color: #e2e6fe; color:#147d98; height:480px; width:580px; margin-left:10px;">
                                    <div id="customers">
<?php
if ($con) {
    $sql = "SELECT * FROM appointment WHERE nurse_status='unread'";
    $recordfound = mysqli_query($con, $sql);

    if (mysqli_num_rows($recordfound) > 0) {
        echo "<h2><center>The Blood Donors Appointment Are</center></h2>";
        echo "<table border='1'>";
        echo "<tr>
                <th>App ID</th>
                <th>Donor ID</th>
                <th>User Name</th>
                <th>Donor Phone</th>
                <th>Appointment Time</th>
                <th>Appointment Date</th>
                <th colspan='2'>Appointment Status</th>
              </tr>";
        while ($row = mysqli_fetch_assoc($recordfound)) {
            echo "<tr>
                    <td>{$row['appid']}</td>
                    <td>{$row['uid']}</td>
                    <td>{$row['did']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['aptime']}</td>
                    <td>{$row['apdate']}</td>
                    <td><a href='nurseaccept.php?id={$row['appid']}'><h4 style='color:green;'>Accept</h4></a></td>
                    <td><a rel='facebox' href='nurserejectt.php?id={$row['appid']}'><h4 style='color:red;'>Reject</h4></a></td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<div id='error'>Sorry, no appointment records found!</div>";
    }
} else {
    echo "<div id='error'>Sorry! Connection failed!</div>";
}
?>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>
