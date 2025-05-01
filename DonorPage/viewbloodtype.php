<?php
include("../connection/connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Seeker Page</title>
    <style>
        body {
            margin: 0;
            background: #f4f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        #container {
            max-width: 1065px;
            margin: auto;
        }

        header img {
            width: 100%;
            height: auto;
        }

        .content-wrapper {
            margin: 30px auto;
            padding: 30px;
            background-color: #e2e6fe;
            border-radius: 15px;
            border: 2px solid #d2d5de;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 90%;
            overflow-x: auto;
        }

        h2 {
            text-align: center;
            color: #147d98;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: auto;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            font-size: 15px;
        }

        th {
            background-color: #147d98;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .error {
            color: red;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            th, td {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
<div id="container">
    <header>
        <img src="images/logoo.png" alt="Banner">
    </header>

    <div class="content-wrapper">
        <h2>Blood Bank Stock Info</h2>
        <table>
            <tr>
                <th>Blood ID</th>
                <th>Blood Type</th>
                <th>Quantity (Units)</th>
            </tr>
            <?php
            $sql = mysqli_query($con, "SELECT * FROM blood WHERE bid='432'");

            if ($sql) {
                if (mysqli_num_rows($sql) > 0) {
                    while ($row = mysqli_fetch_array($sql)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['bid']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['bg']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['bqty']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No records found for this blood ID.</td></tr>";
                }
            } else {
                echo "<tr><td colspan='3' class='error'>Error fetching data: " . mysqli_error($con) . "</td></tr>";
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>
