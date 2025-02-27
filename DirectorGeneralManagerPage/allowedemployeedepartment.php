
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
    // Fetch all employee IDs from the employee table
    $sql = "SELECT employee_id FROM employee"; // Adjust the table and column name if necessary
    $result = mysqli_query($con, $sql);
    $sql1 = "SELECT postion_name FROM postion"; // Adjust the table and column name if necessary
    $result1 = mysqli_query($con, $sql1);

    // Check if the query was successful
    if (!$result) {
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
    <meta name="description" content="Register allowed employees form">
    <meta name="author" content="Your Name">
    <title>Allowed Employee Registration</title>
    <link href="mystyles.css" rel="stylesheet" type="text/css"/>

    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <style>
        /* General body styling */
        body {
            background-color: #f0f8ff;
            font-family: 'Arial', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Centering the form */
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .form-wrapper {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        h1 {
            text-align: center;
            color: #2980b9;
            margin-bottom: 20px;
            font-size: 2em;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        .form-input, .form-submit {
            width: 100%;
            padding: 14px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-input:focus, .form-submit:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 10px rgba(52, 152, 219, 0.5);
        }

        .form-submit {
            background-color: #2980b9;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-submit:hover {
            background-color: #3498db;
        }

        .form-reset {
            background-color: #e74c3c;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-reset:hover {
            background-color: #c0392b;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-wrapper {
                width: 90%;
                padding: 20px;
            }

            h1 {
                font-size: 1.5em;
            }
        }

        /* Success and Error Messages */
        .message {
            font-size: 1.2em;
            padding: 10px;
            margin-top: 15px;
            border-radius: 5px;
            text-align: center;
        }

        .message.success {
            background-color: #2ecc71;
            color: white;
        }

        .message.error {
            background-color: #e74c3c;
            color: white;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-wrapper">
            <form action="" method="post">
                <fieldset>
                    <legend>
                        <h1>Register Allowed Employee</h1>
                    </legend>

                    <!-- Employee ID Dropdown -->
                    <label for="employeeid">Employee ID:</label>
                    <select name="employeeid" required class="form-input">
                        <option value="">Select Employee ID</option>
                        <?php
                        // Display the fetched employee IDs as options in the dropdown
                        while ($row = mysqli_fetch_assoc($result)) {
                            $emp_id = htmlspecialchars($row['employee_id']); // Adjust field name if necessary
                            echo "<option value='$emp_id'>$emp_id</option>";
                        }
                        ?>
                    </select>

                    <!-- Position Dropdown -->
                    <label for="po">Position:</label>
                    <select name="po" required class="form-input">
                        <option value="">Select Position</option>
                        <?php
                        // Display the fetched position names as options in the dropdown
                        while ($row = mysqli_fetch_assoc($result1)) {
                            $position_name = htmlspecialchars($row['postion_name']);
                            echo "<option value='$position_name'>$position_name</option>";
                        }
                        ?>
                    </select>

                    <!-- Item Name -->
                    <label for="itemname">Item Name:</label>
                    <input type="text" name="itemname" required placeholder="Enter item name" class="form-input"/>

                    <!-- Date of Registration -->
                    <label for="sdate">Date of Registration:</label>
                    <input type="date" name="sdate" value="<?php echo date('Y-m-d'); ?>" required class="form-input"/>

                    <!-- Buttons -->
                    <input type="submit" name="Register" value="Register" class="form-submit"/>
                    <input type="reset" value="Reset" class="form-reset"/>

                    <?php
                    // Handle form submission
                    if (isset($_POST["Register"])) {
                        $empid = $_POST["employeeid"];
                        $poo = $_POST["po"];
                        $itemname = $_POST["itemname"];
                        $sdate = $_POST["sdate"];

                        // Insert into allowedemployee table
                        $sql = "INSERT INTO allowedemployee (employeeid, emppostionoffid1, itemname, register_date, status) 
                                VALUES ('$empid', '$poo', '$itemname', '$sdate', 'Active')";

                        if (mysqli_query($con, $sql)) {
                            echo "<div class='message success'>Employee registered successfully!</div>";
                        } else {
                            echo "<div class='message error'>Unable to register the employee: " . mysqli_error($con) . "</div>";
                        }
                    }
                    ?>
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>
