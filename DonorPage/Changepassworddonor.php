<?php
session_start();
include("../connection/connection.php");

// Check if session variables are set
if (isset($_SESSION['USER_ID']) && isset($_SESSION['USER_NAME'])) {
    $uid = $_SESSION['USER_ID'];
    $uname = $_SESSION['USER_NAME'];
} else {
    echo "<div id='error'>Error: User not logged in!</div>";
    exit;
}

function encryptpassword($password) {
    $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
    return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $password, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
    <style>
        body {
            margin: 0;
            background: #f2f5f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        #container {
            max-width: 1065px;
            margin: auto;
        }

        header img {
            width: 100%;
            height: auto;
        }

        .form-wrapper {
            background-color: #e0effe;
            border: 2px solid #a8abb7;
            border-radius: 25px;
            margin: 40px auto;
            padding: 30px;
            max-width: 600px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            font-size: 26px;
            color: #0d4d6c;
            margin-bottom: 30px;
            position: relative;
        }

        .close-icon {
            position: absolute;
            right: 0;
            top: 0;
        }

        .close-icon img {
            width: 25px;
            cursor: pointer;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-top: 5px;
            font-size: 14px;
        }

        .form-actions {
            margin-top: 30px;
            text-align: center;
        }

        input[type="submit"], input[type="reset"] {
            padding: 10px 20px;
            background-color: #147d98;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            margin: 0 10px;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #0d5e74;
        }

        .message {
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
            font-weight: bold;
        }

        .success { color: green; }
        .error { color: red; }

        @media (max-width: 768px) {
            .form-wrapper {
                padding: 20px;
                margin: 20px;
            }

            h2 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
<div id="container">
    <header>
        <img src="Images/logoo.jpg" alt="Banner">
    </header>

    <div class="form-wrapper">
        <h2>
            Change Your Password
            
        </h2>

        <form method="POST">
            <label>User ID:</label>
            <input type="text" name="uid" value="<?php echo $uid; ?>" readonly>

            <label>User Name:</label>
            <input type="text" name="UName" value="<?php echo $uname; ?>" readonly>

            <label>Old Password:<span style="color:red">*</span></label>
            <input type="password" name="olpw" placeholder="Old Password" required>

            <label>New Password:<span style="color:red">*</span></label>
            <input type="password" name="newp" placeholder="New Password" required>

            <label>Confirm Password:<span style="color:red">*</span></label>
            <input type="password" name="confermp" placeholder="Confirm Password" required>

            <div class="form-actions">
                <input type="submit" name="change" value="Change">
                <input type="reset" value="Cancel">
            </div>
        </form>

        <?php 
        if (isset($_POST['change'])) {
            $password = $_POST['olpw'];
            $npsw = $_POST['newp'];
            $cpw = $_POST['confermp'];
            $acceptold = encryptpassword($password);

            if (strlen($npsw) <= 5) {
                echo "<div class='message error'>⚠️ Your Password Must Be Longer Than 5 Characters!</div>";
            } elseif (strlen($npsw) >= 20) {
                echo "<div class='message error'>⚠️ Password Must Be Less Than 20 Characters!</div>";
            } else {
                $sql = "SELECT * FROM account WHERE uid = '$uid'";
                $result = mysqli_query($con, $sql);

                if ($result) {
                    $r = mysqli_fetch_array($result);
                    $old = $r["password"];

                    if ($old === $acceptold) {
                        if ($npsw === $cpw) {
                            $newpassword = encryptpassword($npsw);
                            $sql = "UPDATE account SET password = '$newpassword', pw_status = 'YES' WHERE uid = '$uid'";
                            $update = mysqli_query($con, $sql);

                            if ($update) {
                                echo "<script>alert('Your Password Has Been Changed Successfully!'); window.location='LoginPage.php';</script>";
                            } else {
                                echo "<div class='message error'>❌ Password Change Failed! ".mysqli_error($con)."</div>";
                            }
                        } else {
                            echo "<div class='message error'>❌ New Password and Confirm Password Do Not Match!</div>";
                        }
                    } else {
                        echo "<div class='message error'>❌ Old Password is Incorrect!</div>";
                    }
                } else {
                    echo "<div class='message error'>❌ Failed to Fetch Account Info: ".mysqli_error($con)."</div>";
                }
            }
        }
        ?>
    </div>
</div>
</body>
</html>
