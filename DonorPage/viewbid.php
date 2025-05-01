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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .bid-title {
            font-size: 1.5rem;
            color: #007bff;
            text-align: center;
        }
        .bid-content {
            font-size: 1rem;
            color: #333;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center text-primary">View Bids</h2>
        <?php include("print.php"); ?>
        <div class="mt-4">
            <?php
            if ($con) {
                $date = date('Y-m-d');
                $sql1 = "SELECT * FROM Bids WHERE end_date >= '$date' ORDER BY start_date DESC";
                $result = mysqli_query($con, $sql1);

                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<div class='mb-4 p-3 border rounded'>";
                            echo "<p class='text-end'><b>Date:</b> <u>" . $row['start_date'] . "</u></p>";
                            echo "<h3 class='bid-title'>" . $row['subject'] . "</h3>";
                            echo "<p class='bid-content'>" . nl2br($row['content']) . "</p>";
                            echo "</div>";
                        }
                    } else {
                        echo "<div class='alert alert-warning'>There are no active bids.</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Error executing query: " . mysqli_error($con) . "</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Connection Failed.</div>";
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
