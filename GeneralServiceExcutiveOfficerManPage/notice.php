<?php
include("../connection/connection.php");
session_start();

// Check if user is logged in
if (!isset($_SESSION['USER_ID'])) {
    echo "<script>
        alert('You are not logged in! Please log in to access this page.');
        window.location='../login.php';
    </script>";
    exit(); // Stop further execution if not logged in
}

$mail = $_SESSION['USER_ID']; // Store the logged-in user's ID
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post Notice Form</title>
    <link rel="stylesheet" type="text/css" href="Requestformstyle.css">
    <script src="js/jquery-3.3.1.js" type="text/javascript"></script>
    <script src="js/requestform.js" type="text/javascript"></script>

    <style>
        /* General styles */
        body {
            background-color: #f4f4f9;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #1E90FF; /* Blue */
            color: white;
            padding: 1px 0;
            text-align: center;
        }

        #wrapper {
            width: 10%;
            margin: 30px auto;
            padding: 10px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        fieldset {
            border: 1px solid #ddd;
            padding: 20px;
        }

        legend {
            font-size: 1.5em;
            font-weight: bold;
            color: #1E90FF; /* Blue */
        }

        .textInput {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 14px;
            box-sizing: border-box;
        }

        .textInput:focus {
            border-color: #1E90FF; /* Blue */
        }

        label {
            font-weight: bold;
            font-size: 14px;
            margin: 5px 0;
            display: block;
        }

        .btn {
            background-color: #1E90FF; /* Blue */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            margin: 10px 5px;
        }

        .btn:hover {
            background-color: #1C86EE; /* Darker Blue on hover */
        }

        .val_error {
            color: red;
            font-size: 12px;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            #wrapper {
                width: 90%;
            }

            .header h1 {
                font-size: 1.5em;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Post Notice Form</h2>
    </div>

    <div id="wrapper">
        <fieldset>
            <legend>Notice Details</legend>
            <form method="POST" action="notice.php" onsubmit="return validate()" name="vfrom" id="cform">

                <div>
                    <label for="sub">Subject</label>
                    <input type="text" name="sub" id="sub" class="textInput" required>
                    <span><i id="sub_error" class="val_error"></i></span>
                </div>

                <div>
                    <label for="cont">Content</label>
                    <input type="text" name="cont" id="cont" class="textInput" required>
                    <span><i id="cont_error" class="val_error"></i></span>
                </div>

                <div>
                    <label for="sdate">Start Date</label>
                    <input type="text" name="sdate" id="sdate" class="textInput" value="<?php echo date('Y-m-d'); ?>" readonly>
                    <span><i id="sdate_error" class="val_error"></i></span>
                </div>

                <div>
                    <label for="enddate">End Date</label>
                    <input type="date" name="enddate" id="enddate" class="textInput" required>
                    <span><i id="enddate_error" class="val_error"></i></span>
                </div>

                <div>
                    <input type="submit" value="Submit" class="btn" name="register">
                    <input type="reset" value="Reset" class="btn">
                </div>

            </form>
        </fieldset>
    </div>

</body>
</html>

<?php
if (isset($_POST["register"])) {
    // Sanitize inputs to prevent SQL injection
    $sub = mysqli_real_escape_string($con, $_POST["sub"]);
    $cont = mysqli_real_escape_string($con, $_POST["cont"]);
    $end = mysqli_real_escape_string($con, $_POST["enddate"]);

    if ($con) {
        $sql = "INSERT INTO notice (Subject, Content, startDate, endDate, Status) 
                VALUES ('$sub', '$cont', NOW(), '$end', 'Active')";
        $inserted = mysqli_query($con, $sql);

        if ($inserted && mysqli_affected_rows($con) > 0) {
            echo "<script>alert('Notice posted successfully!');</script>";
        } else {
            echo "<script>alert('Unable to post notice: " . mysqli_error($con) . "');</script>";
        }
    } else {
        echo "<script>alert('Database connection failed');</script>";
    }
}
?>
