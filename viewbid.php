<?php
session_start();
include("connection/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bids</title>
    <link rel="stylesheet" href="mystyles.css">
    <style>
        /* General Body Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Centered Wrapper */
        .container {
            max-width: 1000px;
            margin: 50px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        /* Header Styling */
        .header {
            text-align: center;
            padding: 20px 0;
            background: #007bff;
            color: white;
            font-size: 28px;
            font-weight: bold;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        /* Bid Section */
        .bid-item {
            border-bottom: 1px solid #ddd;
            padding: 20px 0;
        }

        .bid-item:last-child {
            border-bottom: none;
        }

        .bid-date {
            text-align: right;
            font-weight: bold;
            color: #555;
        }

        .bid-title {
            text-align: center;
            font-size: 22px;
            color: #007bff;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .bid-content {
            font-size: 16px;
            color: #444;
            line-height: 1.6;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 20px;
            background: #007bff;
            color: white;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 90%;
                margin: 20px auto;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">View Active Bids</div>

    <?php
    if ($con) {
        $date = date('Y-m-d');
        $stmt = $con->prepare("SELECT * FROM Bids WHERE end_date >= ? ORDER BY start_date DESC");
        $stmt->bind_param("s", $date);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="bid-item">';
                echo '<p class="bid-date">Date: <u>' . htmlspecialchars($row['start_date']) . '</u></p>';
                echo '<p class="bid-title">' . htmlspecialchars($row['subject']) . '</p>';
                echo '<p class="bid-content">' . nl2br(htmlspecialchars($row['content'])) . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p style="text-align: center; font-size: 18px; color: red;">No active bids available.</p>';
        }
    } else {
        echo '<p style="text-align: center; font-size: 18px; color: red;">Database connection failed.</p>';
    }
    ?>

    <div class="footer">
        <?php include("footer.php"); ?>
    </div>
</div>

</body>
</html>
