<?php
session_start();
include("../connection/connection.php");
$uid = $_SESSION['USER_ID'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation</title>
    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f6fb;
            color: #333;
            padding: 20px;
        }

        #container {
            max-width: 1200px;
            margin: auto;
        }

        #content {
            margin-top: 20px;
        }

        .loginBoxx {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        fieldset {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 24px;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
            font-size: 16px;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #45a049;
        }

        #error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
        }

        #Success {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
        }

        .close-button {
            float: right;
            cursor: pointer;
        }
    </style>

    <script>
        function cal_bmi(weight, height) {
            let m = height / 100;
            let bmi = weight / (m * m);
            let result = Math.round(bmi * 10) / 10;
            document.adm.bmi.value = result;
        }
    </script>

</head>
<body>
<div id="container">
    <div id="content">
        <table border="0" width="1000" height="500">
            <tr><td width="150"></td><td width="700">
                <div style="width:600px; height:650px; border:solid 4px #dldbeg; overflow:auto;">
                    <div class="loginBoxx">
                        <fieldset>
                            <form method="post" name="adm">
                                <table border="0" bgcolor="#fff9f9" width="500px">
                                    <tr><td colspan="2">
                                        <h2>Blood Donation
                                           
                                        </h2>
                                    </td></tr>
                                    <tr><td>Blood ID:</td><td><input type="text" name="bid" required></td></tr>
                                    <tr><td>Donor ID:</td><td><input type="text" name="bdid" required></td></tr>
                                    <tr><td>User ID:</td><td><input type="text" name="uid" value="<?php echo htmlspecialchars($uid); ?>" readonly></td></tr>
                                    <tr><td>Height (cm):</td><td><input type="number" name="Height" required></td></tr>
                                    <tr><td>Weight (kg):</td><td><input type="number" name="Weight" required onkeyup="cal_bmi(this.value, adm.Height.value)"></td></tr>
                                    <tr><td>BMI:</td><td><input type="text" name="bmi" readonly></td></tr>
                                    <tr><td>Blood Pressure:</td><td><input type="text" name="BP" required></td></tr>
                                    <tr><td>Quantity (ml):</td><td><input type="number" name="bqty" required></td></tr>
                                    <tr><td>Reg. Date:</td><td><input type="text" name="rdate" value="<?php echo date('Y-m-d'); ?>" readonly></td></tr>
                                    <tr><td>Exp. Date:</td><td><input type="text" name="edate" value="<?php echo date('Y-m-d', strtotime('+90 days')); ?>" readonly></td></tr>
                                    <tr><td>Status:</td><td>
                                        <select name="bstatus" required>
                                            <option value="">Select status</option>
                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                    </td></tr>
                                    <tr><td></td><td>
                                        <input type="submit" name="Register" value="Register">
                                        <input type="reset" value="Reset">
                                    </td></tr>
                                </table>
                            </form>
                        </fieldset>

<?php
if (isset($_POST['Register'])) {
    $bid = $_POST["bid"];
    $bdid = $_POST['bdid'];
    $uid = $_POST['uid'];
    $height = $_POST['Height'];
    $weight = $_POST['Weight'];
    $bmi = $_POST['bmi'];
    $bp = $_POST['BP'];
    $bqty = $_POST['bqty'];
    $rdate = $_POST['rdate'];
    $edate = $_POST['edate'];
    $bstatus = $_POST['bstatus'];

    // Check previous donation by donor ID
    $check = mysqli_query($con, "SELECT * FROM donation WHERE did = '$bdid' ORDER BY ExpDate DESC LIMIT 1") or die(mysqli_error($con));
    
    $allowInsert = true;

    if (mysqli_num_rows($check) > 0) {
        $row = mysqli_fetch_array($check);
        if ($rdate <= $row['ExpDate']) {
            $date1 = new DateTime($rdate);
            $date2 = new DateTime($row['ExpDate']);
            $diff = $date1->diff($date2);
            echo "<div id='error'><img src='Images/err.png' height='20' width='20'/> Sorry! You have " . $diff->format('%a') . " days left before next donation.</div>";
            $allowInsert = false;
        }
    }

    if ($allowInsert) {
        $sql = "INSERT INTO donation (DonID, bid, did, uid, Height, Weight, BMI, Quantity, BloodP, ReDate, ExpDate, Status)
                VALUES (NULL, '$bid', '$bdid', '$uid', '$height', '$weight', '$bmi', '$bqty', '$bp', '$rdate', '$edate', '$bstatus')";

        if (mysqli_query($con, $sql)) {
            echo "<div id='Success'><img src='Images/success.jpg' height='20' width='30'/> Donation registered successfully!</div>";
        } else {
            echo "<div id='error'>Error registering donation: " . mysqli_error($con) . "</div>";
        }
    }
}
?>
                    </div>
                </div>
            </td><td width="150"></td></tr>
        </table>
    </div>
</div>
</body>
</html>
<?php
			$sql="select * from appointment WHERE nurse_status='unread' and donor_status='unread' and nursereject_status='no'";
			$query= mysqli_query($con,$sql);
			$count=mysqli_num_rows($query);
			?>	