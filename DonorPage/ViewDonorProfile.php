<?php
include("../connection/connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile | Admin View</title>
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

        td, th {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 15px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        img.profile-img {
            width: 100px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }

        .error {
            color: red;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            td, th {
                font-size: 14px;
                padding: 10px;
            }

            img.profile-img {
                width: 80px;
                height: 60px;
            }
        }
    </style>
</head>
<body>
<div id="container">
    <header>
        <img src="Images/logoo.jpg" alt="Banner">
    </header>

    <div class="content-wrapper">
        <?php
        if ($con) {
            $sql = "SELECT * FROM blooddonor WHERE did = 'D1'";
            $recordfound = mysqli_query($con, $sql);

            if (!$recordfound) {
                echo "<div class='error'>SQL Query Failed: " . mysqli_error($con) . "</div>";
            } elseif (mysqli_num_rows($recordfound) > 0) {
                echo "<h2>User Profile: D1</h2>";
                echo "<table>";

                while ($row = mysqli_fetch_assoc($recordfound)) {
                    echo "<tr><td colspan='2'><img src='{$row['UserPhoto']}' class='profile-img' alt='User Photo'></td></tr>";
                    echo "<tr><td><strong>ID Number:</strong></td><td>{$row['did']}</td></tr>";
                    echo "<tr><td><strong>Full Name:</strong></td><td>{$row['fname']} {$row['lname']}</td></tr>";
                    echo "<tr><td><strong>Sex:</strong></td><td>{$row['dsex']}</td></tr>";
                    echo "<tr><td><strong>Email:</strong></td><td>{$row['email']}</td></tr>";
                    echo "<tr><td><strong>Occupation:</strong></td><td>{$row['occp']}</td></tr>";
                    echo "<tr><td><strong>Date of Birth:</strong></td><td>{$row['dbdate']}</td></tr>";
                    echo "<tr><td><strong>Age:</strong></td><td>{$row['dage']}</td></tr>";
                    echo "<tr><td><strong>City:</strong></td><td>{$row['city']}</td></tr>";
                    echo "<tr><td><strong>Region:</strong></td><td>{$row['region']}</td></tr>";
                }

                echo "</table>";
            } else {
                echo "<div class='error'>Sorry, No Record Found!</div>";
            }
        } else {
            echo "<div class='error'>Connection Failed!</div>";
        }
        ?>
    </div>
</div>
</body>
</html>
