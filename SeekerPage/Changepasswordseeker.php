<?php
session_start();
include("../connection/connection.php");

// Get user details from session
if (isset($_SESSION['uid']) && isset($_SESSION['uname'])) {
    $uid = $_SESSION['uid'];
    $uname = $_SESSION['uname'];
} else {
    die("<div style='color:red; text-align:center;'>User is not logged in properly. Please login again.</div>");
}

// Optional: password encryption function (modernized if needed)
function encryptpassword($password) {
    $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
    return base64_encode(openssl_encrypt($password, 'aes-256-cbc', md5($cryptKey), 0, md5(md5($cryptKey))));
}
?>

<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="setting.css">
    <link rel="stylesheet" href="stylesLogin.css">
</head>
<body>
<div id="container">
    <table><tr><td>
        <img src="Images/logoo.jpg" width="1065" height="135">
    </td></tr></table>

    <div id="content">
        <div style="width:660px; height: 600px; border:solid 4px #dldbeg; overflow: auto; margin:auto;">
            <div class="loginBoxx">
                <fieldset style="border-radius: 25px; background-color: #e2e6fe; color:#147d98; width:580px; margin: 20px auto; padding: 20px;">
                    <form method="POST" action="">
                        <h2 style="text-align:center;">Change Your Password</h2><br>
                        <table width="100%">
                            <tr><td><strong>User ID:</strong></td><td><input type="text" name="uid" value="<?php echo htmlspecialchars($uid); ?>" readonly></td></tr>
                            <tr><td><strong>User Name:</strong></td><td><input type="text" name="uname" value="<?php echo htmlspecialchars($uname); ?>" readonly></td></tr>
                            <tr><td><strong>Old Password:</strong></td><td><input type="password" name="olpw" required></td></tr>
                            <tr><td><strong>New Password:</strong></td><td><input type="password" name="newp" required></td></tr>
                            <tr><td><strong>Confirm Password:</strong></td><td><input type="password" name="confermp" required></td></tr>
                            <tr><td colspan="2" align="center"><br><input type="submit" name="change" value="Change Password">
                            &nbsp;&nbsp;<input type="reset" value="Cancel"></td></tr>
                        </table>
                    </form>
                </fieldset>

<?php
if (isset($_POST['change'])) {
    $oldPassword = $_POST['olpw'];
    $newPassword = $_POST['newp'];
    $confirmPassword = $_POST['confermp'];

    if (strlen($newPassword) < 6) {
        echo "<div style='color:red; text-align:center;'>Password must be at least 6 characters long.</div>";
    } elseif ($newPassword !== $confirmPassword) {
        echo "<div style='color:red; text-align:center;'>New password and confirmation do not match.</div>";
    } else {
        $encryptedOld = encryptpassword($oldPassword);
        $encryptedNew = encryptpassword($newPassword);

        $stmt = mysqli_prepare($con, "SELECT password FROM account WHERE uid = ?");
        mysqli_stmt_bind_param($stmt, "s", $uid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        if ($row && $row['password'] === $encryptedOld) {
            $updateStmt = mysqli_prepare($con, "UPDATE account SET password = ?, pw_status = 'YES' WHERE uid = ?");
            mysqli_stmt_bind_param($updateStmt, "ss", $encryptedNew, $uid);
            if (mysqli_stmt_execute($updateStmt)) {
                echo "<script>alert('Your password has been changed successfully!'); window.location.href='LoginPage.php';</script>";
            } else {
                echo "<div style='color:red; text-align:center;'>Failed to update password. Try again later.</div>";
            }
        } else {
            echo "<div style='color:red; text-align:center;'>Old password is incorrect.</div>";
        }
    }
}
?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
