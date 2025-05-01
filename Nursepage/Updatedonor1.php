<?php
include("../connection/connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Donor</title>
    <link rel="stylesheet" href="stylesLogin.css">
    <link rel="stylesheet" href="setting.css">
    <link rel="stylesheet" href="Setting11.css">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f3f4f6;
            margin: 0;
            padding: 0;
        }

        #container {
            width: 100%;
            max-width: 800px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #147d98;
        }

        form {
            width: 100%;
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        input[type="submit"],
        input[type="reset"] {
            padding: 10px 20px;
            margin: 10px 5px;
            background-color: #147d98;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #0e5e72;
        }

        .back-btn {
            float: right;
        }

        .back-btn img {
            width: 25px;
        }

        .message {
            padding: 10px;
            background: #d4edda;
            color: #155724;
            border-radius: 5px;
            margin-top: 15px;
        }

        .error {
            padding: 10px;
            background: #f8d7da;
            color: #721c24;
            border-radius: 5px;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div id="container">
    <h2>Update Donor Information</h2>
    <div class="back-btn">
        <a href="Nursepage.php"><img src="Images/close.jpg" title="Close"></a>
    </div>

    <?php
    if (isset($_GET["bdid"])) {
        $id = $_GET['bdid'];
        echo "<p>Editing Donor ID: <strong>$id</strong></p>";

        $sql = "SELECT * FROM blooddonor WHERE did = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            ?>

            <form method="post">
                <table>
                    <tr><td>ID Number:</td><td><input type="text" name="bdid1" value="<?= $row["did"] ?>" readonly></td></tr>
                    <tr><td>First Name:</td><td><input type="text" name="fname1" value="<?= $row["fname"] ?>" required></td></tr>
                    <tr><td>Last Name:</td><td><input type="text" name="lname1" value="<?= $row["lname"] ?>" required></td></tr>
                    <tr><td>Email:</td><td><input type="email" name="email1" value="<?= $row["email"] ?>" required></td></tr>
                    <tr><td>Occupation:</td><td><input type="text" name="occp1" value="<?= $row["occp"] ?>" required></td></tr>
                    <tr><td>Date of Birth:</td><td><input type="text" name="dbdate1" value="<?= $row["dbdate"] ?>" required></td></tr>
                    <tr><td>Age:</td><td><input type="number" name="dage1" value="<?= $row["dage"] ?>" required></td></tr>
                    <tr><td>Sex:</td><td><input type="text" name="dsex1" value="<?= $row["dsex"] ?>" required></td></tr>
                    <tr><td>City:</td><td><input type="text" name="city1" value="<?= $row["city"] ?>" required></td></tr>
                    <tr><td>Region:</td><td><input type="text" name="region1" value="<?= $row["region"] ?>" required></td></tr>
                    <tr><td></td><td>
                        <input type="submit" name="update" value="Update">
                        <input type="reset" value="Cancel">
                    </td></tr>
                </table>
            </form>

            <?php
        } else {
            echo "<div class='error'>Sorry, no record found!</div>";
        }
    }

    if (isset($_POST["update"])) {
        $bdid1 = $_POST["bdid1"];
        $fname1 = $_POST["fname1"];
        $lname1 = $_POST["lname1"];
        $email1 = $_POST["email1"];
        $occp1 = $_POST["occp1"];
        $dbdate1 = $_POST["dbdate1"];
        $dage1 = $_POST["dage1"];
        $dsex1 = $_POST["dsex1"];
        $city1 = $_POST["city1"];
        $region1 = $_POST["region1"];

        $sql_update = "UPDATE blooddonor SET fname=?, lname=?, email=?, occp=?, dbdate=?, dsex=?, dage=?, city=?, region=? WHERE did=?";
        $stmt_update = mysqli_prepare($con, $sql_update);

        if (!$stmt_update) {
            die("<div class='error'>Prepare failed: " . mysqli_error($con) . "</div>");
        }

        mysqli_stmt_bind_param($stmt_update, 'ssssssisss', $fname1, $lname1, $email1, $occp1, $dbdate1, $dsex1, $dage1, $city1, $region1, $bdid1);

        if (mysqli_stmt_execute($stmt_update)) {
            echo "<div class='message'>[1] Record updated successfully!</div>";
        } else {
            echo "<div class='error'>Unable to update record. Please try again.</div>";
        }
    }
    ?>
</div>

</body>
</html>
