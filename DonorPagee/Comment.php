<?php
include("../connection/connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Seeker Feedback</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f4f7fc;
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
            display: block;
        }

        .form-container {
            background-color: #e2e6fe;
            border-radius: 25px;
            padding: 30px;
            margin: 40px auto;
            max-width: 600px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            font-size: 26px;
            color: #0d4d6c;
            margin-bottom: 20px;
        }

        textarea, input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #bbb;
            border-radius: 8px;
            resize: vertical;
            font-size: 14px;
            margin-top: 5px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        .form-actions {
            margin-top: 25px;
            text-align: center;
        }

        .form-actions input[type="submit"],
        .form-actions input[type="reset"] {
            background-color: #147d98;
            color: white;
            border: none;
            padding: 10px 25px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            margin: 0 10px;
        }

        .form-actions input[type="submit"]:hover,
        .form-actions input[type="reset"]:hover {
            background-color: #0d5e74;
        }

        .close-icon {
            float: right;
        }

        .close-icon img {
            width: 25px;
            height: 25px;
            cursor: pointer;
        }

        .feedback-message {
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
            font-weight: bold;
        }

        .feedback-message.success {
            color: green;
        }

        .feedback-message.error {
            color: red;
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
                margin: 20px;
            }

            h2 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>

<div id="container">
    <header>
        <img src="images/logoo.jpg" alt="Logo">
    </header>

    <div class="form-container">
        <h2>
            Give Your Comment Here
            <span class="close-icon">
                <a href="DonorPage.php" title="Close"><img src="Images/close.jpg" alt="Close"></a>
            </span>
        </h2>

        <form method="post">
            <label for="message">Comment:</label>
            <textarea name="message" id="message" rows="5" placeholder="Please write your comment here!" required></textarea>

            <label for="date">Date Sent:</label>
            <input type="text" name="date" id="date" value="<?php echo date('d-m-Y'); ?>" readonly />

            <div class="form-actions">
                <input type="submit" name="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>
        </form>

        <?php
        // Handle form submission
        if (isset($_POST["submit"])) {
            $message = mysqli_real_escape_string($con, $_POST["message"]);
            $date = $_POST["date"];
            $unread = "yes";

            if ($con) {
                $sql = "INSERT INTO feedback (message, date_sent, status) VALUES (?, ?, ?)";
                $stmt = mysqli_prepare($con, $sql);
                mysqli_stmt_bind_param($stmt, 'sss', $message, $date, $unread);
                $inserted = mysqli_stmt_execute($stmt);

                if ($inserted) {
                    echo "<div class='feedback-message success'>✅ You have sent the comment successfully!</div>";
                } else {
                    echo "<div class='feedback-message error'>❌ Failed to send your comment. Please try again.</div>";
                }
            } else {
                echo "<div class='feedback-message error'>❌ Database connection failed!</div>";
            }
        }
        ?>
    </div>
</div>

</body>
</html>
