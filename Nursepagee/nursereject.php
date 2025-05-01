<?php
session_start();
include("../connection/connection.php");
?>
<html>
<head>
    <title>Donor Appointment</title>
    <link rel="stylesheet" type="text/css" href="setting.css">
    <link rel="stylesheet" href="stylesLogin.css">
    <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="src/jquery.js" type="text/javascript"></script>
    <script src="src/facebox.js" type="text/javascript"></script>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $('a[rel*=facebox]').facebox({
            loadingImage: 'src/loading.gif',
            closeImage: 'src/closelabel.png'
        });
    });
    </script>
</head>
<body>

<div id="container">
    <table><tr><td>
    <img src="Images/logoo.jpg" width="1065" height="135">
    </td></tr></table>
    <div id="navigationmenu">
    </div>
    <div id="content">
        <table border="0" width="1000" height="500"><tr><td width="150">
        </td>
        <td width="300">
            <div style="width:625px;height: 600px; border:solid 4px #dldbeg; overflow: auto;">
                <div id="contentcenter">
                    <div class="loginBoxx">    
                        <fieldset style="border-radius: 25px;background-color: #e2e6fe;color:#147d98;height:480px;width:580px;margin-left:10px;">
                            <div id="customers">
                                <?php
                                if (isset($_POST['submit'])) {
                                    $uid = $_POST['uid'];        
                                    $Description = $_POST['message'];
                                    $status1 = "unread";  // Nurse status
                                    $status2 = "unread";  // Donor status

                                    if ($con) {
                                        // Use mysqli_query instead of mysql_query
                                        $sql = "INSERT INTO nursedescription VALUES ('','','','','', '$uid', '$Description', '$status1', '$status2')";
                                        $inserted = mysqli_query($con, $sql);  // Use mysqli_query
                                        
                                        if ($inserted) {
                                            echo "<div id='success'>You have sent the description successfully!</div>";
                                        } else {
                                            echo "<div id='error'>You haven't sent the description! Error: " . mysqli_error($con) . "</div>";
                                        }
                                    } else {
                                        die("Connection failed: " . mysqli_connect_error());
                                    }
                                }
                                ?>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </td>
        <td width="150">
        </td>
        </tr></table>
    </div>
</div>

</body>
</html>
