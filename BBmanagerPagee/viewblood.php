<?php
session_start();
include("../connection/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dateencoder Register Blood</title>
    <link rel="stylesheet" type="text/css" href="setting.css">
    <link rel="stylesheet" href="stylesLogin.css">
    <link rel="stylesheet" type="text/css" href="Setting11.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ccc;
        }
        h2 {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div id="container">
    

    <div id="navigationmenu"></div>

    <div id="content">
        <table border="0" width="1000" height="500">
            <tr>
                <td width="150"></td>
                <td width="300">
                    <div style="width:660px; height:600px; border:solid 4px #dldbeg; overflow:auto;">
                        <div id="contentcenter">
                            <div class="loginBoxx">
                                <fieldset style="border-radius: 25px; background-color: #e2e6fe; color: #147d98; height: auto; width: 580px; margin-left: 18px;">
                                    <div id="customers">
                                        <?php
                                        if ($con) {
                                            $bloodCounts = array_fill_keys(['A+', 'B+', 'AB+', 'O+', 'A-', 'B-', 'AB-', 'O-', 'A', 'B', 'AB', 'O'], 0);
                                            $total = 0;

                                            $query = "SELECT * FROM blood WHERE bstatus = 'YES'";
                                            $result = mysqli_query($con, $query);

                                            if ($result && mysqli_num_rows($result) > 0) {
                                                echo "<h2 align='center'>The Total Blood Units In Our Stock</h2>";
                                                echo "<table>
                                                        <tr>
                                                            <th>Blood Group</th>
                                                            <th>Register Date</th>
                                                            <th>Expired Date</th>
                                                            <th>Quantity</th>
                                                            <th>Status</th>
                                                        </tr>";

                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $bg = $row['bg'];
                                                    if (array_key_exists($bg, $bloodCounts)) {
                                                        $bloodCounts[$bg]++;
                                                    }
                                                    echo "<tr>
                                                            <td>{$row['bg']}</td>
                                                            <td>{$row['rdate']}</td>
                                                            <td>{$row['edate']}</td>
                                                            <td>{$row['bqty']}</td>
                                                            <td>{$row['bstatus']}</td>
                                                        </tr>";
                                                }

                                                $total = array_sum($bloodCounts);

                                                echo "</table><br><br>";
                                                echo "<h3>Summary:</h3>";
                                                echo "<table>
                                                        <tr><th>Blood Group</th><th>Amount</th><th></th><th>Blood Group</th><th>Amount</th></tr>
                                                        <tr><td>A</td><td>{$bloodCounts['A']}</td><td></td><td>AB+</td><td>{$bloodCounts['AB+']}</td></tr>
                                                        <tr><td>B</td><td>{$bloodCounts['B']}</td><td></td><td>O+</td><td>{$bloodCounts['O+']}</td></tr>
                                                        <tr><td>AB</td><td>{$bloodCounts['AB']}</td><td></td><td>A-</td><td>{$bloodCounts['A-']}</td></tr>
                                                        <tr><td>O</td><td>{$bloodCounts['O']}</td><td></td><td>B-</td><td>{$bloodCounts['B-']}</td></tr>
                                                        <tr><td>A+</td><td>{$bloodCounts['A+']}</td><td></td><td>AB-</td><td>{$bloodCounts['AB-']}</td></tr>
                                                        <tr><td>B+</td><td>{$bloodCounts['B+']}</td><td></td><td>O-</td><td>{$bloodCounts['O-']}</td></tr>
                                                        <tr><td colspan='2'><strong>Total Blood Units</strong></td><td colspan='3'><strong>{$total}</strong></td></tr>
                                                      </table>";
                                            } else {
                                                echo "<div id='error'>Sorry, no blood records found!</div>";
                                            }
                                        } else {
                                            echo "<div id='error'>Database connection failed!</div>";
                                        }
                                        ?>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </td>
                <td width="150"><div id="sideright"></div></td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>
