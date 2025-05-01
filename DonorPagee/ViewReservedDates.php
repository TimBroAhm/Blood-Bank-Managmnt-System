<?php
session_start();
include("../connection/connection.php");
?>

<html>
<head>
    <link rel="Stylesheet" type="text/css" href="setting.css">
    <link rel="Stylesheet" type="text/css" href="Setting11.css">
</head>
<body>
<fieldset style="border-radius: 25px;background-color: #e2e6fe;color:#147d98;height:480px;width:480px;">
    <div id="customers">
        <center>
            <?php
            if ($con) {
                // Update query to use mysqli_query instead of mysql_query
                $sql = "SELECT * FROM appointment";
                $recordfound = mysqli_query($con, $sql);

                if (mysqli_num_rows($recordfound) > 0) {
                    echo "<table border='1'>";
                    echo "<h2><img src='Images/contact.jpg' height='40px' width='50px'/> The Blood Donors Reserved Dates Are</h2><table border=1><tr><th>Appnmt ID</th><th>Appnmt_Date</th><th>Appnmt Time</th></tr>";
                    while ($row = mysqli_fetch_assoc($recordfound)) {
                        $tod = date("Y-m-d");
                        $apdate = $row['apdate'];
                        if ($apdate >= $tod) {
                            echo "<tr><td>" . $row['appid'] . "</td><td>" . $row['apdate'] . "</td><td>" . $row['aptime'] . "</td></tr>";
                        } else {
                            echo "";
                        }
                    }
                    echo "</table>";
                } else {
                    echo "<div id='error'>Sorry!! No Record is Found!!</div>";
                }
            } else {
                echo "<div id='error'>Sorry!! Connection is failed!!</div>";
            }
            ?>
        </center>
    </div>
</body>
</html>
