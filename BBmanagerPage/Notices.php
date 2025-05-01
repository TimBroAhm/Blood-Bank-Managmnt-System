<?php
session_start();
include("../connection/connection.php");

// Initialize session variables safely
$uid   = $_SESSION['USER_ID'] ?? '';
$uname = $_SESSION['USER_NAME'] ?? '';
$role  = $_SESSION['ROLE'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Post Notices</title>
    <link rel="stylesheet" type="text/css" href="setting.css">
    <link rel="stylesheet" href="stylesLogin.css">
    <style>
        input, textarea {
            width: 95%;
            padding: 6px;
            margin-top: 4px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        h2 {
            font-size: 24px;
            text-align: center;
            color: #2d4d74;
            margin-bottom: 20px;
        }

        .success-msg {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }

        .error-msg {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
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
                <td width="150"><div id="sideleft"></div></td>

                <td width="700">
                    <div style="width:600px; height:600px; border:solid 4px #dldbeg; overflow:auto;">
                        <div id="contentcenter">
                            <div class="loginBoxx">
                                <fieldset style="border-radius: 25px; background-color: #e2e6fe; padding: 20px;">
                                    <form action="" method="post">
                                        <h2>Admin Post Notices
                                            <span style="float:right;">
                                                <a href="Adminstrator.php" title="Close">
                                                    <img src="Images/close.jpg" alt="Close" />
                                                </a>
                                            </span>
                                        </h2>

                                        <table border="0" bgcolor="#fff9f9" width="100%">
                                            <tr>
                                                <td>User ID:</td>
                                                <td><input type="text" name="uid" value="<?php echo htmlspecialchars($uid); ?>" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>User Name:</td>
                                                <td><input type="text" name="username" value="<?php echo htmlspecialchars($uname); ?>" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>Role:</td>
                                                <td><input type="text" name="nrole" value="<?php echo htmlspecialchars($role); ?>" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>Title:</td>
                                                <td><input type="text" name="title" placeholder="Enter title" required></td>
                                            </tr>
                                            <tr>
                                                <td>Content:</td>
                                                <td><textarea name="content" placeholder="Please write your message here..." required></textarea></td>
                                            </tr>
                                            <tr>
                                                <td>Sent Date:</td>
                                                <td><input type="text" name="date" readonly value="<?php echo date('Y-m-d'); ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Expiry Date:</td>
                                                <td><input type="date" name="exdate" required></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input type="submit" name="submit" value="Send">
                                                    &nbsp;
                                                    <input type="reset" value="Reset">
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </fieldset>
                            </div>

<?php
if (isset($_POST['submit'])) {
    $uid     = $_POST['uid'];
    $nrole   = $_POST['nrole'];
    $title   = $_POST['title'];
    $content = $_POST['content'];
    $date    = $_POST['date'];
    $exdate  = $_POST['exdate'];
    $unread  = "yes";

    if ($con) {
        $sql = "INSERT INTO Notices (uid, uname, role, title, content, date, exdate, unread)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssssss", $uid, $uname, $nrole, $title, $content, $date, $exdate, $unread);
            $inserted = mysqli_stmt_execute($stmt);

            if ($inserted) {
                echo "<div class='success-msg'><img src='Images/success.jpg' width='20'> Notice sent successfully!</div>";
            } else {
                echo "<div class='error-msg'>Failed to send notice: " . mysqli_error($con) . "</div>";
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "<div class='error-msg'>Failed to prepare SQL statement.</div>";
        }
    } else {
        echo "<div class='error-msg'>Database connection failed: " . mysqli_connect_error() . "</div>";
    }
}
?>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>
