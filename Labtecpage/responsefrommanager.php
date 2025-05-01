<?php
session_start();
include("../connection/connection.php");

$uid = $_SESSION['USER_ID'];
$uname = $_SESSION['USER_NAME'];
$role = $_SESSION['ROLE'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DateencoderRegisterBlood</title>
    <link rel="stylesheet" href="setting.css">
    <link rel="stylesheet" href="stylesLogin.css">
    <link rel="stylesheet" href="Setting11.css">
</head>
<body>

<div id="container">
    <div id="navigationmenu"></div>

    <div id="content">
        <table border="0" width="100%" height="500">
            <tr>
                <td width="150"></td>
                <td width="300">
                    <div style="width:660px; height:600px; border:solid 4px #dldbeg; overflow:auto;">
                        <div id="contentcenter">
                            <fieldset style="border-radius: 25px; background-color: #e2e6fe; color:#147d98; height:500px; width:620px;">
                                <?php
                                if ($con) {
                                    // Using prepared statements to prevent SQL injection
                                    $stmt = $con->prepare("SELECT * FROM Bloodrequest WHERE status = ? AND Unread = ?");
                                    $status = 'seekerseenaccept';
                                    $unread = 'yes';
                                    $stmt->bind_param('ss', $status, $unread);  // 'ss' for string parameters
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    if ($result->num_rows > 0) {
                                        echo "<h2 align='center'>The Blood Details Are</h2>";
                                        echo "<table border='1'>
                                                <tr>
                                                    <th>UID</th>
                                                    <th>Username</th>
                                                    <th>Hospital Name</th>
                                                    <th>Blood ID</th>
                                                    <th>Blood Group</th>
                                                    <th>Quantity</th>
                                                    <th>Action</th>
                                                </tr>";

                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>
                                                    <td>{$row['uid']}</td>
                                                    <td>{$row['sid']}</td>
                                                    <td>{$row['hname']}</td>
                                                    <td>{$row['bid']}</td>
                                                    <td>{$row['bg']}</td>
                                                    <td>{$row['bqty']}</td>
                                                    <td><a href='AcceptedResponse3.php?id={$row['bid']}'>Send</a></td>
                                                  </tr>";
                                        }

                                        echo "</table>";
                                    } else {
                                        echo "<div id='error'>Sorry, no record found!</div>";
                                    }

                                    // Close the prepared statement
                                    $stmt->close();
                                } else {
                                    echo "<div id='error'>Sorry, connection failed!</div>";
                                }
                                ?>
                            </fieldset>
                        </div>
                    </div>
                </td>
                <td width="150"></td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>
