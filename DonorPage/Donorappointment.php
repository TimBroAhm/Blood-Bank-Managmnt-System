<?php
session_start();
include("../connection/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Appointment</title>
    <link rel="stylesheet" type="text/css" href="setting.css">
    <link rel="stylesheet" href="stylesLogin.css">
    <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="src/jquery.js" type="text/javascript"></script>
    <script src="src/facebox.js" type="text/javascript"></script>
    <script src="src/validation.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('a[rel*=facebox]').facebox({
                loadingImage : 'src/loading.gif',
                closeImage   : 'src/closelabel.png'
            });
        });
    </script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }
        #container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }
        header {
            background-color: #147d98;
            padding: 15px;
            text-align: center;
        }
        header img {
            width: 100%;
            height: auto;
        }
        #content {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        .main-content {
            width: 100%;
            max-width: 800px;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .loginBoxx {
            margin-top: 20px;
        }
        fieldset {
            border: none;
            background-color: #e2e6fe;
            border-radius: 15px;
            padding: 20px;
        }
        table {
            width: 100%;
            margin-top: 20px;
        }
        table td {
            padding: 10px;
            font-size: 14px;
        }
        input[type="text"], input[type="date"], input[type="time"], input[type="submit"], input[type="reset"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }
        input[type="submit"], input[type="reset"] {
            background-color: #147d98;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #105c72;
        }
        .error, .success {
            padding: 10px;
            margin-top: 20px;
            font-size: 14px;
            border-radius: 5px;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        @media screen and (max-width: 768px) {
            #content {
                flex-direction: column;
                padding: 10px;
            }
        }
    </style>
</head>
<body>

<?php
if (isset($_SESSION['USER_NAME'])) {
    $uid = $_SESSION['USER_ID'];
    $username = $_SESSION['USER_NAME'];
    $role = $_SESSION['ROLE'];
    $login_time = $_SESSION['start'] ?? date("H:i:s");
?>

<header>
    <img src="Images/logoo.jpg" alt="Logo">
</header>

<div id="container">
    <div id="content">
        <div class="main-content">
            <h2 style="font-size: 25px; text-align: center;">Make Appointment</h2>
            <div class="loginBoxx">
                <fieldset>
                    <form action="" method="post">
                        <table>
                            <tr>
                                <td colspan="2">
                                    <img src="../images/b.jpeg" height="40px" width="50px"/> First See Reserved Dates Click 
                                    <a rel="facebox" href="ViewReservedDates.php">Here</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Donor ID:</td>
                                <td><input type="text" name="uid" value="<?php echo $uid; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>User Name:</td>
                                <td><input type="text" name="fname" value="<?php echo $username; ?>" readonly/></td>
                            </tr>
                            <tr>
                                <td>Telephone:</td>
                                <td><input type="text" name="phone" placeholder="Phone" id="phon" value="+2519" maxlength="13" pattern="^[0-9+ ]+" /></td>
                            </tr>
                            <script type="text/javascript">
                                var f1 = new LiveValidation('phon');
                                f1.add(Validate.Presence, {alertMessage: "It cannot be empty"});
                                f1.add(Validate.Format, {pattern: /^[0-9+]+$/, failureMessage: "Only numbers and + allowed"});
                                f1.add(Validate.Length, { minimum: 13, maximum: 13, failureMessage: "Must be 13 characters"});
                            </script>
                            <tr>
                                <td>Appointment Time:</td>
                                <td><input type="time" name="aptime" required></td>
                            </tr>
                            <tr>
                                <td>Appointment Date:</td>
                                <td><input type="date" name="apadate" required></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" value="Appointment" />
                                    <input type="reset" value="Reset" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
</div>

<?php
    if (isset($_POST['submit'])) {
        $uid = $_POST['uid'];
        $fname = $_POST['fname'];
        $phone = $_POST['phone'];
        $aptime = $_POST['aptime'];

        $minutes_to_add = 15;
        $time = new DateTime($aptime);
        $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
        $stamp = $time->format('H:i');
        $t = $aptime . '-' . $stamp;

        $apadate = $_POST['apadate'];
        $tod = date("Y-m-d");

        if ($apadate < $tod) {
            echo "<div class='error'>Reserved date must be today or later.</div>";
        } else {
            $check = mysqli_query($con, "SELECT * FROM Appointment WHERE apdate='$apadate' AND aptime='$t'");
            if (mysqli_num_rows($check) > 0) {
                echo "<div class='error'>This time slot is already reserved. Please choose another.</div>";
            } else {
                // Define required variables
                $logout_time = ""; // Track this in session if available
                $start_time = date("H:i:s");
                $activity_type = "Appointment";
                $ipaddress = $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN';
                $work_date = date("Y-m-d");
                $activity = "Blood Donor Make Appointment [ Appt NO:' ',User ID:$uid,User Name:$fname,App Date:$apadate]";

                // Insert into Appointment and logfile
                $sql = "INSERT INTO Appointment VALUES(' ','$uid','$fname','$phone','$t','$apadate','unread','unread','no')";
                $logsql = "INSERT INTO logfile VALUES(' ','$uid','$fname','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')";

                if (mysqli_query($con, $sql) && mysqli_query($con, $logsql)) {
                    echo "<div class='success'>You have Sent Appointment Successfully!!</div>";
                } else {
                    echo "<div class='error'>Failed to send appointment: " . mysqli_error($con) . "</div>";
                }
            }
        }
    }
} else {
    header("location:Index.php");
}
?>

</body>
</html>
