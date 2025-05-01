
<?php
include("../connection/connection.php");  
 session_start();
if(isset($_SESSION['USER_ID']))
 {
  $mail=$_SESSION['USER_ID'];
 } else {
 ?>

<script>
  alert('You are not logged In !! Please Login to access this page');
  alert(window.location='../login.php');
 </script>
 <?php
 }
 ?>

<?php

if ($con) {
    // Fetch all employee IDs from the item transfer tables
    $sql3 = "SELECT Transfer_employe_ID FROM item_transfer";
    $result3 = mysqli_query($con, $sql3);
    $sql1 = "SELECT Reciver_employe_ID FROM item_transfer";
    $result1 = mysqli_query($con, $sql1);
    $sql2 = "SELECT withdraw_id FROM item_withdraw";
    $result2 = mysqli_query($con, $sql2);

    if (!$result3 || !$result2 || !$result1) {
        die("Query failed: " . mysqli_error($con));
    }
} else {
    echo "Connection failed!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Item Transfer Registration Form">
    <meta name="author" content="Your Name">
    <title>Item Transfer Registration</title>
    <link rel="stylesheet" type="text/css" href="Requestformstyle.css">
    <script src="js/jquery-3.3.1.js" type="text/javascript"></script>
    <script src="js/requestform.js" type="text/javascript"></script>

    <style>
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            background-color: #2980b9;
            color: white;
            padding: 20px 0;
        }

        h1 {
            font-size: 2em;
        }

        #wrapper {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        fieldset {
            border: 2px solid #ddd;
            padding: 20px;
            border-radius: 8px;
        }

        label {
            font-weight: bold;
            margin: 10px 0 5px;
            display: block;
        }

        .form-input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        .btn {
            background-color: #2980b9;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 48%;
        }

        .btn:hover {
            background-color: #3498db;
        }

        .btn-reset {
            background-color: #e74c3c;
            margin-left: 4%;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            #wrapper {
                padding: 15px;
            }

            .btn {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Item Transfer Registration Form</h1>
    </div>

    <div id="wrapper">
        <fieldset>
            <form method="POST" action="TransferItem.php" onsubmit="return validate()" name="vfrom" id="cform">
                
                <!-- Withdraw ID Dropdown -->
                <label for="wid">Withdraw ID:</label>
                <select name="wid" required class="form-input">
                    <option value="">Select Withdraw ID</option>
                    <?php
                    while ($row = mysqli_fetch_assoc($result2)) {
                        $emp_id = htmlspecialchars($row['withdraw_id']);
                        echo "<option value='$emp_id'>$emp_id</option>";
                    }
                    ?>
                </select>

                <!-- Transfer Employee ID Dropdown -->
                <label for="teid">Transfer Employee ID:</label>
                <select name="teid" required class="form-input">
                    <option value="">Select Transfer Employee ID</option>
                    <?php
                    while ($row = mysqli_fetch_assoc($result3)) {
                        $emp_id1 = htmlspecialchars($row['Transfer_employe_ID']);
                        echo "<option value='$emp_id1'>$emp_id1</option>";
                    }
                    ?>
                </select>

                <!-- Receiver Employee ID Dropdown -->
                <label for="reid">Receiver Employee ID:</label>
                <select name="reid" required class="form-input">
                    <option value="">Select Receiver Employee ID</option>
                    <?php
                    while ($row = mysqli_fetch_assoc($result1)) {
                        $emp_id12 = htmlspecialchars($row['Reciver_employe_ID']);
                        echo "<option value='$emp_id12'>$emp_id12</option>";
                    }
                    ?>
                </select>

                <!-- Witness Employee ID -->
                <label for="weid">Witness Employee ID:</label>
                <input type="text" name="weid" class="form-input" id="weid" required>

                <!-- Date of Registration -->
                <label for="date">Date of Registration:</label>
                <input type="date" name="date" class="form-input" id="date" required>

                <!-- Submit and Reset Buttons -->
                <div>
                    <input type="submit" value="Submit" class="btn" name="register">
                    <input type="reset" value="Reset" class="btn btn-reset" name="reset">
                </div>
            </form>
        </fieldset>
    </div>
</body>
</html>

<?php
if (isset($_POST["register"])) {
    $wid = $_POST["wid"];
    $teid = $_POST["teid"];
    $reid = $_POST["reid"];
    $weid = $_POST["weid"];
    $date = $_POST["date"];

    if ($con) {
        $sql = "SELECT * FROM item_transfer WHERE withdraw_id='$wid'";
        $userexist = mysqli_query($con, $sql);
        if (mysqli_affected_rows($con)) {
            echo "Item already exists";
        } else {
            $sql = "INSERT INTO item_transfer VALUES('', '$wid', '$teid', '$reid', '$weid', NOW())";
            $inserted = mysqli_query($con, $sql);

            if ($inserted) {
                echo "Item registered successfully!";
            } else {
                echo "Unable to register item: " . mysqli_error($con);
            }
        }
    } else {
        echo "Connection Failed!";
    }
}
?>
