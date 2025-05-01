<?php
session_start();
include("../connection/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome - Blood Donation Questionnaire</title>
    <style>
        body {
            margin: 0;
            background: #f2f6fc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        #container {
            max-width: 1065px;
            margin: auto;
            padding: 20px;
        }

        .content-wrapper {
            background-color: #e2e6fe;
            border: 3px solid #c4c9dd;
            border-radius: 25px;
            padding: 40px 30px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
            width: 90%;
            margin: auto;
        }

        h2 {
            font-size: 24px;
            text-align: center;
            color: #0a3c5e;
            line-height: 1.6;
        }

        .info-text {
            margin-top: 20px;
            font-size: 16px;
            line-height: 1.7;
        }

        .info-text img {
            vertical-align: middle;
            margin-right: 10px;
        }

        .btn-container {
            text-align: right;
            margin-top: 30px;
        }

        .btn-container input[type="submit"] {
            background-color: #147d98;
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-container input[type="submit"]:hover {
            background-color: #0f6374;
        }

        marquee {
            color: white;
            font-weight: bold;
            padding: 5px;
            background-color: #147d98;
            border-radius: 8px;
            margin-bottom: 20px;
            display: block;
        }

        @media (max-width: 768px) {
            .content-wrapper {
                padding: 20px;
            }

            h2 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

<div id="container">
    <div class="content-wrapper">
        <form action="Questionaries.php" method="post">
            <marquee behavior="scroll" direction="left">TO SAVE LIFE, DONATE BLOOD!</marquee>

            <h2>
                <img src="../images/b.jpeg" height="30" width="40" alt="Success Icon" />
                Welcome to the Web-Based Blood Bank Management System
            </h2>

            <div class="info-text">
                <p><strong>Dear Donor,</strong></p>
                <p>Your contribution can save lives. To ensure safety, your participation in a brief eligibility questionnaire is required.</p>
                <p>Please be honest and accurate with your responses.</p>
                <p><img src="../images/blood.jpeg" height="30" width="40" alt="Blood Icon" /> The next page contains over 15 questions about your eligibility.</p>
                <p>Thank you for being part of this life-saving mission.</p>
                <p><strong>With best wishes,</strong><br/>Blood Bank Services</p>
            </div>

            <div class="btn-container">
                <input type="submit" value="Proceed to Questionnaire" name="submit">
            </div>
        </form>
    </div>
</div>

</body>
</html>
