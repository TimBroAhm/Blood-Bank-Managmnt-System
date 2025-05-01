<?php
session_start();
include("../connection/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Questionnaires</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }
        body {
            background-color: #f4f6fb;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        header img {
            max-width: 100%;
            height: auto;
        }
        .card {
            background: #fff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            max-width: 700px;
            width: 100%;
            margin-top: 40px;
        }
        h2 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 20px;
            color: #2e3a59;
        }
        form label {
            font-weight: 600;
            display: block;
            margin: 15px 0 5px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 16px;
        }
        textarea {
            resize: vertical;
        }
        .form-row {
            margin-bottom: 15px;
        }
        .actions {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
        .actions input {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        .actions input[type="submit"] {
            background-color: #4CAF50;
            color: white;
        }
        .actions input[type="reset"] {
            background-color: #f44336;
            color: white;
        }
        .message {
            margin-top: 20px;
            padding: 15px;
            border-radius: 8px;
            font-weight: 600;
        }
        .message#Success {
            background-color: #e0f7e9;
            color: #2e7d32;
        }
        .message#error {
            background-color: #fdecea;
            color: #c62828;
        }
    </style>
</head>
<body>

<header>
    <img src="Images/logoo.jpg" alt="Logo">
</header>

<div class="card">
    <h2>Register Questionnaires</h2>
    <form action="" method="post">
        <div class="form-row">
            <label>User ID:</label>
            <input type="text" name="uid" required>
        </div>
        <div class="form-row">
            <label>User Name:</label>
            <input type="text" name="uname" required>
        </div>
        <div class="form-row">
            <label>Questionnaires:</label>
            <textarea name="Quetion" rows="4" required></textarea>
        </div>
        <div class="form-row">
            <label>Option 1:</label>
            <input type="text" name="Option1" value="YES" readonly>
        </div>
        <div class="form-row">
            <label>Option 2:</label>
            <input type="text" name="Option2" value="NO" readonly>
        </div>
        <div class="form-row">
            <label>Correct Option:</label>
            <input type="text" name="correct" value="YES" readonly>
        </div>
        <div class="form-row">
            <label>Prepared Date:</label>
            <input type="text" name="padte" readonly value="<?php echo date('d-M-Y'); ?>">
        </div>

        <div class="actions">
            <input type="submit" name="create" value="Create">
            <input type="reset" value="Cancel">
        </div>
    </form>

    <?php
    if (isset($_POST['create'])) {
        $uid = $_POST['uid'];
        $uname = $_POST['uname'];
        $Quetion = $_POST['Quetion'];
        $Option1 = $_POST['Option1'];
        $Option2 = $_POST['Option2'];
        $correct = $_POST['correct'];
        $padte = $_POST['padte'];

        if ($con) {
            $stmt = mysqli_prepare($con, "INSERT INTO Quetionaries (NO, uid, uname, Quetion, Option1, Option2, correct, Pdate) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)");

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'sssssss', $uid, $uname, $Quetion, $Option1, $Option2, $correct, $padte);
                $inserted = mysqli_stmt_execute($stmt);

                if ($inserted) {
                    echo "<div class='message' id='Success'>You have created the questionnaire successfully!</div>";
                } else {
                    echo "<div class='message' id='error'>Failed to create questionnaire: " . mysqli_error($con) . "</div>";
                }
            } else {
                echo "<div class='message' id='error'>Statement preparation failed: " . mysqli_error($con) . "</div>";
            }
        } else {
            echo "<div class='message' id='error'>Database connection failed.</div>";
        }
    }
    ?>
</div>

</body>
</html>
