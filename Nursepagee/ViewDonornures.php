<?php
session_start();
include("../connection/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dateencoder Register Blood</title>
    <style>
        /* Global Reset */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f6fb;
            color: #333;
            padding: 20px;
        }

        #container {
            max-width: 1200px;
            margin: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table img {
            width: 100%;
            max-height: 135px;
            object-fit: cover;
        }

        #content {
            margin-top: 20px;
        }

        #contentcenter {
            padding: 20px;
        }

        fieldset {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.05);
        }

        #customers table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
        }

        #customers th, #customers td {
            border: 1px solid #e0e0e0;
            padding: 12px 14px;
            text-align: center;
            font-size: 14px;
        }

        #customers th {
            background-color: #f2f4f8;
            color: #2c3e50;
            font-weight: 600;
        }

        #customers tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        #customers tr:hover {
            background-color: #eef4fb;
        }

        #error {
            background-color: #fdecea;
            color: #c62828;
            padding: 10px 15px;
            margin-top: 15px;
            border-radius: 8px;
            font-weight: 600;
            text-align: center;
        }

        h2 {
            font-size: 24px;
            color: #2e3a59;
            margin-bottom: 15px;
            text-align: center;
        }

        div[style*="overflow"] {
            border: 1px solid #e1e4ed;
            border-radius: 10px;
            background-color: #ffffff;
            padding: 15px;
        }
    </style>
</head>
<body>

<div id="container">
    <table>
        <tr>
            <td>
                <img src="images/logoo.jpg" width="1065" height="135" alt="Logo">
            </td>
        </tr>
    </table>

    <div id="content">
        <table border="0" height="500">
            <tr>
                <td width="150"></td>
                <td width="700">
                    <div style="width:625px; height:600px; border:solid 4px #dldbeg; overflow:auto;">
                        <div id="contentcenter">
                            <div class="loginBoxx">
                                <fieldset>
                                    <div id="customers">
                                        <?php
                                        if ($con) {
                                            $sql = "SELECT * FROM blooddonor";
                                            $result = mysqli_query($con, $sql);

                                            if ($result && mysqli_num_rows($result) > 0) {
                                                echo "<h2>The Blood Donors Profile</h2>";
                                                echo "<table>";
                                                echo "<tr>
                                                        <th>Donor ID</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Donor Email</th>
                                                        <th>Occupation</th>
                                                        <th>Date of Birth</th>
                                                        <th>Sex</th>
                                                        <th>Age</th>
                                                        <th>City</th>
                                                        <th>Region</th>
                                                      </tr>";

                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>";
                                                    echo "<td>" . htmlspecialchars($row['bdid'] ?? '') . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['fname'] ?? '') . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['lname'] ?? '') . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['email'] ?? '') . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['occp'] ?? '') . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['dbdate'] ?? '') . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['dsex'] ?? '') . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['dage'] ?? '') . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['city'] ?? '') . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['region'] ?? '') . "</td>";
                                                    echo "</tr>";
                                                }

                                                echo "</table>";
                                            } else {
                                                echo "<div id='error'>Sorry, no records found!</div>";
                                            }
                                        } else {
                                            echo "<div id='error'>Sorry! Connection failed.</div>";
                                        }
                                        ?>
                                    </div>
                                </fieldset>
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
