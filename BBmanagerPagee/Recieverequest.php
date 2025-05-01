<?php
session_start();
include("../connection/connection.php");

$photo = isset($_SESSION['photo']) ? $_SESSION['photo'] : 'Images/default.jpg';
$uname = isset($_SESSION['uname']) ? $_SESSION['uname'] : 'Unknown';
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'Guest';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Receive Request</title>
    <link rel="stylesheet" href="setting.css">
    <link rel="stylesheet" href="stylesLogin.css">
    <link rel="stylesheet" href="Setting11.css">
    <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="src/jquery.js" type="text/javascript"></script>
    <script src="src/facebox.js" type="text/javascript"></script>

    <!-- Google Font + Custom Modern Styling -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6fb;
            color: #333;
        }
        #container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }
        img.header-img {
            width: 100%;
            max-height: 150px;
            object-fit: cover;
        }
        #content {
            margin-top: 20px;
            display: flex;
            gap: 20px;
        }
        #sideleft {
            width: 150px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            min-height: 500px;
        }
        #contentcenter {
            flex: 1;
        }
        fieldset {
            background-color: #ffffff;
            border-radius: 16px;
            border: 1px solid #e0e0e0;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        h2 {
            text-align: center;
            color: #2c3e50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
        }
        table th, table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        table th {
            background-color: #f0f4ff;
            color: #333;
        }
        .action-button {
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }
        .accept-btn {
            background-color: #2ecc71;
            color: white;
        }
        .reject-btn {
            background-color: #e74c3c;
            color: white;
        }
        #error {
            text-align: center;
            color: red;
            margin-top: 20px;
        }
    </style>

    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $('a[rel*=facebox]').facebox({
            loadingImage: 'src/loading.gif',
            closeImage: 'src/closelabel.png'
        });
    });
    </script>
</head>
<body>

<div id="container">
    <img src="Images/logoo.jpg" class="header-img" alt="Logo">

    <div id="navigationmenu"></div>

    <div id="content">
        <div id="sideleft"></div>

        <div id="contentcenter">
            <fieldset>
                <h2>Requests from Seekers</h2>
                <div id="customers">
                    <?php
                    if ($con) {
                        $sql = "SELECT * FROM bloodrequest WHERE Unread='no' AND status=''";
                        $recordfound = mysqli_query($con, $sql);

                        if (mysqli_num_rows($recordfound) > 0) {
                            echo "<table>
                                    <tr>
                                        <th>Request ID</th>
                                        <th>Seeker ID</th>
                                        <th>Hosp Name</th>
                                        <th>Hosp-Email</th>
                                        <th>Blood ID</th>
                                        <th>Blood Group</th>
                                        <th>Blood Quantity</th>
                                        <th>Request Date</th>
                                        <th colspan='2'>Request Status</th>
                                    </tr>";

                            while ($row = mysqli_fetch_assoc($recordfound)) {
                                echo "<tr>
                                        <td>{$row['Rqid']}</td>
                                        <td>{$row['uid']}</td>
                                        <td>{$row['hname']}</td>
                                        <td>{$row['Hemail']}</td>
                                        <td>{$row['bid']}</td>
                                        <td>{$row['bg']}</td>
                                        <td>{$row['bqty']}</td>
                                        <td>{$row['Rqdate']}</td>
                                        <td>
                                            <a href='AcceptedResponse.php?id={$row['Rqid']}'>
                                                <button class='action-button accept-btn'>Accept</button>
                                            </a>
                                        </td>
                                        <td>
                                            <a rel='facebox' href='sekerrejectt.php?id={$row['Rqid']}'>
                                                <button class='action-button reject-btn'>Reject</button>
                                            </a>
                                        </td>
                                    </tr>";
                            }

                            echo "</table>";
                        } else {
                            echo "<div id='error'>Sorry, no record is found!</div>";
                        }
                    } else {
                        echo "<div id='error'>Sorry! Connection failed.</div>";
                    }
                    ?>
                </div>
            </fieldset>
        </div>
    </div>
</div>

</body>
</html>
