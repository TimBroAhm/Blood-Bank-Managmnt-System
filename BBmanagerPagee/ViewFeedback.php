<?php
session_start();
include("../connection/connection.php");

$uname = $_SESSION['USER_NAME'] ?? '';
$role  = $_SESSION['ROLE'] ?? '';
$uid   = $_SESSION['USER_ID'] ?? '';
?>
<html>
<head>
    <title>View Feedback</title>
    <link rel="stylesheet" type="text/css" href="setting.css">
    <link rel="stylesheet" href="stylesLogin.css">
    <link rel="stylesheet" type="text/css" href="Setting11.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }
        .read-button {
            background-color: #7a8584;
            color: #49f816;
            padding: 4px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .success-msg {
            color: green;
            font-weight: bold;
            margin-top: 10px;
        }
        .error-msg {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div id="container">
    <div id="navigationmenu"></div>

    <div id="content">
        <table border="0" width="100%" height="500">
            <tr>
                <td width="150"></td>
                <td width="600">
                    <div style="width:625px; height:600px; border:solid 4px #dldbeg; overflow:auto;">
                        <div id="contentcenter">
                            <div class="loginBoxx">
                                <fieldset style="border-radius: 25px; background-color: #e2e6fe; color:#147d98; padding: 20px;">
                                    <div id="customers">
<?php
if ($con) {
    // Handle marking feedback as read
    if (isset($_GET['did'])) {
        $fid = $_GET['did'];

        $stmt = mysqli_prepare($con, "UPDATE feedback SET status = 'No' WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $fid);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "<div class='success-msg'>Marked as read successfully!</div>";
        } else {
            echo "<div class='error-msg'>Failed to update status or already marked as read.</div>";
        }
        mysqli_stmt_close($stmt);
    }

    // Display feedbacks with status 'yes' (i.e. unread)
    $sql = "SELECT * FROM feedback WHERE status = 'yes'";
    $recordfound = mysqli_query($con, $sql);

    if (mysqli_num_rows($recordfound) > 0) {
        echo "<h2 align='center'>Feedbacks from Users</h2>";
        echo "<table>
                <tr>
                    <th>Comment ID</th>
                    <th>User Comment</th>
                    <th>Sent Date</th>
                    <th>Mark as Read</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($recordfound)) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['id']) . "</td>
                    <td>" . htmlspecialchars($row['message']) . "</td>
                    <td>" . htmlspecialchars($row['date_sent']) . "</td>
                    <td>
                        <a href='ViewFeedback.php?did=" . urlencode($row['id']) . "'>
                            <button class='read-button'>YES</button>
                        </a>
                    </td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "<div class='error-msg'>Sorry, no feedback records found.</div>";
    }
} else {
    echo "<div class='error-msg'>Sorry! Database connection failed.</div>";
}
?>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>
