<?php
session_start();
include("../connection/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Request</title>
    <link rel="stylesheet" href="mystyles.css">
    <style>
        body {
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h1 {
            color: #4CAF50;
            text-align: center;
            margin-bottom: 30px;
        }
		 h2 {
            color: #4CAF50;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }
        .form-group input:focus {
            border-color: #4CAF50;
            outline: none;
        }
        .btn-group {
            text-align: center;
        }
        .btn-group input {
            width: 45%;
            padding: 12px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .btn-submit {
            background-color: #4CAF50;
            color: white;
        }
        .btn-reset {
            background-color: #f44336;
            color: white;
        }
        .message {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
        }
        .message.success {
            color: green;
        }
        .message.error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Item Request Registration Form</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="rid">Request ID:</label>
                <input type="text" id="rid" name="rid" pattern="^[a-zA-Z0-9 ]+$" required placeholder="Enter request ID">
            </div>
            <div class="form-group">
                <label for="name">Item Name:</label>
                <input type="text" id="name" name="name" pattern="^[a-zA-Z0-9 ]+$" required placeholder="Enter item name">
            </div>
            <div class="form-group">
                <label for="sp">Specification:</label>
                <input type="text" id="sp" name="sp" pattern="^[a-zA-Z0-9 ]+$" required placeholder="Enter specification">
            </div>
            <div class="form-group">
                <label for="qu">Quantity:</label>
                <input type="number" id="qu" name="qu" required placeholder="Enter item quantity">
            </div>
            <div class="form-group">
                <label for="date">Date of Request:</label>
                <input type="text" id="date" name="date" value="<?php echo date('Y-m-d') ?>" readonly>
            </div>
            <div class="btn-group">
                <input type="submit" name="Send" value="Send" class="btn-submit">
                <input type="reset" value="Reset" class="btn-reset">
            </div>
        </form>

        <?php
        if(isset($_POST["Send"])) {
            $rid = $_POST["rid"];
            $name = $_POST["name"];
            $sp = $_POST["sp"];
            $qu = $_POST["qu"];
            
            if($con) {
                $sql = "SELECT * FROM request WHERE Request_ID='$rid'";
                $userexist = mysqli_query($con, $sql);
                if(mysqli_num_rows($userexist) > 0) {
                    echo "<p class='message error'>Request already exists!</p>";
                } else {
                    $sql1 = "INSERT INTO request (request_id,Employee_id, item_name, specification, quentity, Request_Date, Status) VALUES ('$rid', '$name', '$sp', '$qu', NOW(), 'Pending')";
                    $inserted = mysqli_query($con, $sql1);
                    if($inserted) {
                        echo "<p class='message success'>Request sent successfully!</p>";
                    } else {
                        echo "<p class='message error'>Unable to register the request.</p>";
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
