<?php
session_start();
include("../connection/connection.php");

// Check DB connection
if (!$con) {
    die("<div id='error'>❌ Database connection failed: " . mysqli_connect_error() . "</div>");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dateencoder Register Blood</title>
    <link rel="stylesheet" href="setting.css">
    <link rel="stylesheet" href="stylesLogin.css">
    <link rel="stylesheet" href="Setting11.css">
    <style>
        #customers {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        #customers th, #customers td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        #customers tr:nth-child(even){background-color: #f2f2f2;}
        #customers tr:hover {background-color: #ddd;}
        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #4CAF50;
            color: white;
        }
        .Available {
            color: green;
            font-weight: bold;
        }
        .Expaired {
            color: red;
            font-weight: bold;
        }
        #error {
            color: red;
            font-weight: bold;
            padding: 10px;
        }
    </style>
</head>
<body>
<div id="container">
    <table><tr><td>
        <img src="images/logoo.jpg" width="1065" height="135">
    </td></tr></table>

    <div id="navigationmenu">
        <table width="1040"><tr><td></td></tr></table>
    </div>

    <div id="content">
        <table border="0" width="100" height="500">
            <tr><td width="150"></td>
            <td width="300">
                <div style="width:625px;height: 600px; border:solid 4px #dldbeg; overflow: auto;">
                    <div id="contentcenter">
                        <fieldset style="border-radius: 25px;background-color: #e2e6fe;color:#147d98;height: auto;width: auto;">
                            <div id="customers">
                                <?php
                                $sql = "SELECT * FROM blood";
                                $result = mysqli_query($con, $sql);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    echo "<h2 align='center'>🩸 Blood Details</h2>";
                                    echo "<table id='customers'>";
                                    echo "<tr><th>Blood ID</th><th>Donor ID</th><th>Blood Group</th><th>Pack No</th><th>Register Date</th><th>Expired Date</th><th>Quantity</th><th>Status</th></tr>";

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($row['bid']) . "</td>";
                                        echo "<td>" . (isset($row['bdid']) ? htmlspecialchars($row['bdid']) : "N/A") . "</td>";
                                        echo "<td>" . htmlspecialchars($row['bg']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['packno']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['rdate']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['edate']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['bqty']) . "</td>";

                                        if ($row['bstatus'] === "Available") {
                                            echo "<td class='Available'>Available</td>";
                                        } elseif ($row['bstatus'] === "Expaired") {
                                            echo "<td class='Expaired'>Expired</td>";
                                        } else {
                                            echo "<td>" . htmlspecialchars($row['bstatus']) . "</td>";
                                        }

                                        echo "</tr>";
                                    }

                                    echo "</table>";
                                } else {
                                    echo "<div id='error'>❗ Sorry, no blood records found.</div>";
                                }
                                ?>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </td></tr>
        </table>
    </div>
</div>
</body>
</html>
