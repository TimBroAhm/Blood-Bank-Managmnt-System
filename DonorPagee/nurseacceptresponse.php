<?php
session_start();
include("../connection/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Donor Appointment</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        #container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
        }
        .card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #fff;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: center;
        }
        th {
            background: #f0f4ff;
            font-weight: bold;
        }
        #error {
            color: #e74c3c;
            background: #ffecec;
            padding: 15px;
            text-align: center;
            margin-top: 20px;
            border-radius: 8px;
        }
        .success {
            color: #2ecc71;
            background: #e9fff3;
            padding: 15px;
            text-align: center;
            margin-top: 20px;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<?php
if (isset($_SESSION['USER_NAME'])) {
    $uid = $_SESSION['USER_ID'];

    echo '<div id="container"><div class="card">';
    
    // Appointment query
    $sql = mysqli_query($con, "SELECT * FROM appointment WHERE nurse_status='read' AND (donor_status='unread' OR donor_status='read') AND uid='$uid'");
    $count = $sql ? mysqli_num_rows($sql) : 0;

    // Nurse description query
    $sq = mysqli_query($con, "SELECT * FROM nursedescription WHERE nurse_status='read' AND donor_status='unread' AND did='$uid'");
    $count1 = $sq ? mysqli_num_rows($sq) : 0;

    // Show appointment
    if ($count > 0) {
        $r = mysqli_fetch_array($sql);
        $at = $r['aptime'];
        $ad = $r['apdate'];

        echo "<h2>Appointment Details</h2>";
        echo "<div class='success'>Time: <strong>$at</strong><br>Date: <strong>$ad</strong></div>";

        mysqli_query($con, "UPDATE appointment SET donor_status='read' WHERE uid='$uid'");
        echo "<div class='success'>Ok!! Dear Customer, you can come and donate blood freely.<br>Thank you for your participation!!!</div>";
    }

    // Show nurse description
    if ($count1 > 0) {
        mysqli_query($con, "UPDATE appointment SET nursereject_status='donorseereject' WHERE uid='$uid'");

        $recordfound = mysqli_query($con, "SELECT * FROM nursedescription WHERE did='$uid' AND (donor_status='unread' OR donor_status='read')");

        if ($recordfound && mysqli_num_rows($recordfound) > 0) {
            echo "<h2>Descriptions From Nurse</h2>";
            echo "<table><tr><th>Appointment ID</th><th>User ID</th><th>Description</th></tr>";
            while ($row = mysqli_fetch_assoc($recordfound)) {
                echo "<tr><td>{$row['appid']}</td><td>{$row['did']}</td><td>{$row['description']}</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<div id='error'>No description records found.</div>";
        }

        mysqli_query($con, "UPDATE nursedescription SET donor_status='read' WHERE did='$uid'");
    }

    // Nothing found
    if ($count === 0 && $count1 === 0) {
        echo "<div id='error'>Sorry!!! There is no sent response!!</div>";
    }

    echo '</div></div>'; // close card & container
} else {
    header("location:Index.php");
}
?>

</body>
</html>
