<?php
session_start();
include("../connection/connection.php");

if (!isset($_SESSION['USER_NAME'])) {
    header("Location: Index.php");
    exit();
}

$uid = $_SESSION['USER_ID'];
$uname = $_SESSION['USER_NAME'];
$role = $_SESSION['ROLE'];
$ipaddress = $_SERVER['REMOTE_ADDR'];
$login_time = $_SESSION['start'];
$start_time = date("Y-m-d H:i:s");
$work_date = date("Y-m-d");

$bg = "";
$bqty = "";
$bid = "";

// Fetch selected blood info
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['bid'])) {
    $bid = $_POST['bid'];
    $query = mysqli_prepare($con, "SELECT bg, bqty FROM blood WHERE bid = ?");
    mysqli_stmt_bind_param($query, 's', $bid);
    mysqli_stmt_execute($query);
    mysqli_stmt_bind_result($query, $bg, $bqty);
    mysqli_stmt_fetch($query);
    mysqli_stmt_close($query);
}

// Handle form submission
if (isset($_POST['register'])) {
    $Hname = $_POST['Hname'];
    $Hemail = $_POST['Hemail'];
    $Rqdate = date("Y-m-d");
    $unread = "no";
    $status = "";

    $activity = "Seeker sent a request [Seeker ID: $uid, Name: $uname, Hospital: $Hname, Blood: $bg, Qty: $bqty, Date: $Rqdate]";
    $logsql = "INSERT INTO logfile VALUES (NULL, '$uid', '$uname', '$role', '$login_time', 'empty', '$start_time', 'Request', '$activity', '$ipaddress', '$work_date')";

    $sql = "INSERT INTO bloodrequest VALUES (NULL, '$uid', '$uname', '$Hname', '$Hemail', '$bid', '$bg', '$bqty', '$Rqdate', '$unread', '$status')";

    if (mysqli_query($con, $sql) && mysqli_query($con, $logsql)) {
        $success = "✅ Request sent successfully!";
    } else {
        $error = "❌ Request failed: " . mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blood Request Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f3f7fc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: white;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h2 {
            text-align: center;
            color: #003366;
        }

        label {
            display: block;
            margin-top: 1rem;
            font-weight: 600;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-top: 0.3rem;
        }

        .form-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
        }

        button {
            padding: 10px 20px;
            background-color: #1c4186;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2e5dba;
        }

        .message {
            margin-top: 1rem;
            text-align: center;
            font-weight: bold;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }

        a.close-link {
            text-decoration: none;
            color: #999;
            float: right;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Blood Request Form <a href="SeekerPage.php" class="close-link">✖</a></h2>

    <?php if (!empty($success)): ?>
        <div class="message success"><?= htmlspecialchars($success) ?></div>
    <?php elseif (!empty($error)): ?>
        <div class="message error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST">
        <label for="uid">Seeker ID</label>
        <input type="text" id="uid" name="uid" value="<?= htmlspecialchars($uid) ?>" readonly>

        <label for="uname">User Name</label>
        <input type="text" id="uname" name="uname" value="<?= htmlspecialchars($uname) ?>" readonly>

        <label for="bid">Select Blood ID</label>
        <select name="bid" id="bid" onchange="this.form.submit()" required>
            <option value="">-- Select --</option>
            <?php
            $result = mysqli_query($con, "SELECT bid FROM blood WHERE bstatus='Available'");
            while ($row = mysqli_fetch_assoc($result)) {
                $selected = ($row['bid'] == $bid) ? "selected" : "";
                echo "<option value='{$row['bid']}' $selected>{$row['bid']}</option>";
            }
            ?>
        </select>

        <label for="Hname">Hospital Name</label>
        <input type="text" id="Hname" name="Hname" placeholder="Hospital Name" required>

        <label for="Hemail">Email</label>
        <input type="email" id="Hemail" name="Hemail" placeholder="email@example.com" required>

        <label for="bg">Blood Group</label>
        <input type="text" id="bg" name="bg" value="<?= htmlspecialchars($bg) ?>" readonly>

        <label for="bqty">Quantity</label>
        <input type="text" id="bqty" name="bqty" value="<?= htmlspecialchars($bqty) ?>" readonly>

        <label for="Rqdate">Request Date</label>
        <input type="text" id="Rqdate" name="Rqdate" value="<?= date("Y-m-d") ?>" readonly>

        <div class="form-buttons">
            <button type="submit" name="register">Send</button>
            <button type="reset">Reset</button>
        </div>
    </form>
</div>

</body>
</html>
