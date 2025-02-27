<?php
session_start();
include("../Connection/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Request</title>
    <link href="mystyles.css" rel="stylesheet" type="text/css"/>
    <style>
        <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f7fa;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 80%;
        max-width: 800px;
        margin: 50px auto;
        background: #fff;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #1E90FF; /* Blue */
        text-decoration: underline;
        margin-bottom: 30px;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin: 5px 0;
        font-weight: bold;
    }

    input, select {
        padding: 10px;
        margin: 10px 0 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        width: 100%;
    }

    input:focus, select:focus {
        border-color: #1E90FF; /* Blue */
        outline: none;
    }

    .btn-group {
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .btn-group input {
        padding: 12px 25px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-submit {
        background-color: #1E90FF; /* Blue */
        color: white;
    }

    .btn-submit:hover {
        background-color: #1C86EE; /* Darker Blue */
    }

    .btn-reset {
        background-color: #f44336;
        color: white;
    }

    .btn-reset:hover {
        background-color: #e53935;
    }

    .message {
        text-align: center;
        font-size: 16px;
        font-weight: bold;
    }

    .message.success {
        color: #1E90FF; /* Blue for success */
    }

    .message.error {
        color: red;
    }
</style>

    </style>
</head>
<body>
    <div class="container">
        <h2>Item Request Registration Form</h2>
        <form action="" method="post">
            <label for="eid">Employee ID:</label>
            <input type="text" id="eid" name="eid" pattern="^[a-zA-Z0-9 ]+" required placeholder="Enter Employee ID" />

            <label for="id">Request ID:</label>
            <input type="text" id="id" name="id" pattern="^[a-zA-Z0-9 ]+" required placeholder="Enter Request ID" />

            <label for="item_name">Item Name:</label>
            <input type="text" id="item_name" name="item_name" pattern="^[a-zA-Z0-9 ]+" required placeholder="Enter Item Name" />

            <label for="sp">Specification:</label>
            <input type="text" id="sp" name="sp" pattern="^[a-zA-Z0-9 ]+" required placeholder="Enter Specification" />

            <label for="qu">Quantity:</label>
            <input type="number" id="qu" name="qu" required placeholder="Enter Quantity" />

            <label for="type">Request From:</label>
            <select id="type" name="type" required>
                <option value="">Select Role</option>
                <option value="property admin">System Admin</option>
                <option value="Director General">Director General</option>
                <option value="Stock Clerk">Stock Clerk</option>
                <option value="Deputy Director General">Deputy Director General</option>
                <option value="General Service Excutive Officer">General Service Excutive Officer</option>
                
                <option value="directorate">Directorate</option>
            </select>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required />

            <div class="btn-group">
                <input type="submit" name="Send" value="Send" class="btn-submit" />
                <input type="reset" value="Reset" class="btn-reset" />
            </div>
        </form>

        <?php
        if (isset($_POST["Send"])) {
            $rid = $_POST["id"];
            $eid = $_POST["eid"];
            $item_name = $_POST["item_name"];
            $sp = $_POST["sp"];
            $qu = $_POST["qu"];
            $request_from = $_POST["type"];
            $date = $_POST["date"];

            $server = "localhost";
            $dbuser = "root";
            $dbpass = "";
            $dbname = "tms";
            $con = mysqli_connect($server, $dbuser, $dbpass, $dbname);

            if ($con) {
                $sql = "SELECT * FROM request WHERE request_id='$rid'";
                $userexist = mysqli_query($con, $sql);

                if (!$userexist) {
                    echo "<p class='message error'>Error in query: " . mysqli_error($con) . "</p>";
                } else {
                    if (mysqli_num_rows($userexist) > 0) {
                        echo "<p class='message error'>Item already exists!</p>";
                    } else {
                        $sql = "INSERT INTO request (request_id, Employee_id, item_name, status, specification, quentity, request_from, Date) 
                                VALUES ('$rid', '$eid', '$item_name', 'pending', '$sp', '$qu', '$request_from', '$date')";
                        $inserted = mysqli_query($con, $sql);

                        if ($inserted) {
                            echo "<p class='message success'>Item registered successfully!</p>";
                        } else {
                            echo "<p class='message error'>Unable to register the item. Error: " . mysqli_error($con) . "</p>";
                        }
                    }
                }
            } else {
                echo "<p class='message error'>Connection Failed</p>";
            }
        }
        ?>
    </div>
</body>
</html>
