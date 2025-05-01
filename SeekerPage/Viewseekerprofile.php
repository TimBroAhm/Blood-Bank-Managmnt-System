<?php
session_start();
include("../connection/connection.php");

// Check if user is logged in or if session is active
$uid = $_SESSION['USER_ID'];  // Assuming the user ID is stored in session, replace with your session variable if needed
?>

<html>
<head>
    <title>Seeker Profile</title>
    <link rel="stylesheet" href="setting.css">
    <link rel="stylesheet" href="stylesLogin.css">
    <style>
        /* Additional styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }
        #container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        #content {
            display: flex;
            justify-content: center;
            padding-top: 20px;
        }
        .profile-box {
            background-color: #e2e6fe;
            border-radius: 25px;
            padding: 20px;
            width: 70%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-box h2 {
            text-align: center;
            color: #2d7d98;
        }
        .profile-box table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .profile-box th, .profile-box td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        .profile-box th {
            background-color: #147d98;
            color: white;
        }
        .profile-box img {
            border-radius: 50%;
            margin-top: 10px;
        }
        .profile-box td img {
            max-width: 100px;
            max-height: 100px;
        }
        .profile-box .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
<div id="container">
   

    <div id="content">
        <div class="profile-box">
            <fieldset style="border-radius: 25px; background-color: #e2e6fe; padding: 20px;">
                <h2>Seeker Profile Information</h2><br>

                <?php
                // Fetch seeker info using session UID
                $sql = "SELECT * FROM bloodseeker WHERE sid = ?";
                $stmt = mysqli_prepare($con, $sql);

                // Bind the parameter to the prepared statement, assuming $uid contains the seeker ID
                mysqli_stmt_bind_param($stmt, "s", $uid);

                // Execute the statement
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                // Check if data was fetched
                if ($row = mysqli_fetch_assoc($result)) {
                    // Display the seeker profile information in a table format
                    echo "<table>";
                    echo "<tr><th>SID</th><td>" . htmlspecialchars($row['sid']) .  "</td></tr>";
                    echo "<tr><th>First Name</th><td>" . htmlspecialchars($row['sfname']) . "</td></tr>";
                    echo "<tr><th>Last Name</th><td>" . htmlspecialchars($row['slname']) . "</td></tr>";
                    echo "<tr><th>Age</th><td>" . htmlspecialchars($row['sage']) . "</td></tr>";
                    echo "<tr><th>Sex</th><td>" . htmlspecialchars($row['ssex']) . "</td></tr>";
                    echo "<tr><th>Email</th><td>" . htmlspecialchars($row['semail']) . "</td></tr>";
                    echo "<tr><th>Hospital</th><td>" . htmlspecialchars($row['hname']) . "</td></tr>";
                    echo "<tr><th>Status</th><td>" . htmlspecialchars($row['sstatus']) . "</td></tr>";
                    echo "<tr><th>Website</th><td>" . htmlspecialchars($row['website']) . "</td></tr>";
                    echo "<tr><th>Photo</th><td><img src='" . htmlspecialchars($row['UserPhoto']) . "' alt='User Photo'></td></tr>";
                    echo "</table>";
                } else {
                    echo "<div class='error'>Seeker profile not found.</div>";
                }
                ?>

            </fieldset>
        </div>
    </div>
</div>
</body>
</html>
