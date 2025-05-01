<?php
session_start();
include("../connection/connection.php"); // Ensure $con is defined and connected

if (!isset($_SESSION['USER_ID']) || !isset($_SESSION['USER_NAME'])) {
    header("Location: Index.php");
    exit();
}

$uid = $_SESSION['USER_ID'];
$uname = $_SESSION['USER_NAME'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blood Donation</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        #container {
            width: 100%;
            max-width: 1065px;
            margin: 0 auto;
            padding: 20px;
        }

        #container img {
            width: 100%;
            max-height: 135px;
            object-fit: contain;
        }

        #navigationmenu {
            margin: 20px 0;
            padding: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        #content {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        #contentcenter {
            width: 100%;
            max-width: 660px;
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            overflow: auto;
        }

        fieldset {
            border: none;
            padding: 20px;
            background-color: #e2e6fe;
            border-radius: 15px;
        }

        h2 {
            text-align: center;
            font-size: 24px;
            color: #147d98;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background-color: #fff;
        }

        table th, table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #147d98;
            color: #fff;
        }

        table td {
            background-color: #f9f9f9;
        }

        .Available { color: green; font-weight: bold; }
        .Expired { color: red; font-weight: bold; }

        input[type="button"] {
            background-color: #147d98;
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="button"]:hover {
            background-color: #105f75;
        }

        #error {
            color: #ff4d4d;
            font-size: 16px;
            text-align: center;
            margin-top: 20px;
        }

        #customers {
            margin-top: 30px;
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #147d98;
            font-size: 18px;
        }

        hr {
            margin: 20px 0;
        }
    </style>
</head>
<body>

<div id="container">
    <div id="content">
        <div id="contentcenter">
            <div class="loginBoxx">
                <fieldset>
                    <div id="customers">

                        <?php
                        // Fetch available blood
                        $sql = "SELECT * FROM blood WHERE bstatus='Available'";
                        $recordfound = mysqli_query($con, $sql);

                        if ($recordfound && mysqli_num_rows($recordfound) > 0) {
                            echo "<h2>The Available Bloods In our Stock are</h2>";
                            echo "<table>
                                    <tr>
                                        <th>Blood Group</th>
                                        <th>Pack No</th>
                                        <th>Quantity</th>
                                        <th>Blood Status</th>
                                        <th>Request</th>
                                    </tr>";

                            while ($row = mysqli_fetch_assoc($recordfound)) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['bg']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['packno']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['bqty']) . "</td>";

                                $statusClass = ($row['bstatus'] === "Available") ? "Available" : "Expired";
                                echo '<td class="' . $statusClass . '">' . htmlspecialchars($row['bstatus']) . '</td>';

                                echo '<td><a href="Requestform.php?bid=' . urlencode($row['bid']) . '">
                                        <input type="button" value="Send" />
                                      </a></td>';
                                echo "</tr>";
                            }

                            echo "</table>";
                        } else {
                            echo "<div id='error'>Sorry, no record is found!</div>";
                        }

                        // Notification logic
                        $sqlNotify = "SELECT * FROM bloodrequest WHERE uid='$uid' AND status='yes' AND Unread='yes'";
                        $query = mysqli_query($con, $sqlNotify) or die(mysqli_error($con));
                        $count = mysqli_num_rows($query);

                        $sqlNotify1 = "SELECT * FROM bloodrequest WHERE uid='$uid' AND status!='' AND Unread='no'";
                        $query1 = mysqli_query($con, $sqlNotify1) or die(mysqli_error($con));
                        $count1 = mysqli_num_rows($query1);

                        echo "<br><hr>";
                        if ($count > 0) {
                            echo '<a href="Response.php">View Response <font size="4px" color="#16f40b">(' . $count . ')</font></a><hr>';
                        } else {
                            echo '<a href="Response.php">View Response <font size="4px" color="#16f40b">(' . $count1 . ')</font></a><hr>';
                        }

                        include("Print.php");
                        ?>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>

</body>
</html>
