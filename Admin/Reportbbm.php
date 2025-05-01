<?php 
session_start();
include("../connection/connection.php");

// Optional: Show all errors except notices (like undefined index)
error_reporting(E_ALL & ~E_NOTICE);
?>
<html>
<head>
    <title>Receiver Request</title>
    <link rel="stylesheet" type="text/css" href="setting.css">
    <link rel="stylesheet" href="stylesLogin.css">
    <link rel="stylesheet" type="text/css" href="Setting11.css">
</head>
<body>
<div id="container">
    <table><tr><td>
        <img src="images/logoo.jpg" width="1065" height="135">
    </td></tr></table>

    <div id="navigationmenu">
        <table width="1040"><tr><td></td></tr></table>
    </div>

    <div id="content">
        <table border="0" width="1000" height="500">
            <tr>
                <td width="150"></td>
                <td width="300">
                    <div style="width:640px;height: 600px;border:solid 4px #dldbeg;overflow: auto;">
                        <div id="contentcenter">

<?php
$sexnumber = 0;
$male = 0;
$female = 0;
$totaluser = 0;
$active = 0;
$inactive = 0;
$total = 0;
?>

<fieldset style="border-radius: 25px;background-color: #e2e6fe;color:#147d98;height:auto;width:500px;margin-left:23px;">
    <div id="customers">
<?php
if ($con) {
    $sql = "SELECT * FROM user";
    $result = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($result)) {
        echo "<table border='1' style='border-collapse: collapse;'>";
        echo "<h2><center>The Total Number of Bank Users</center></h2>";
        echo "<tr><td>User_ID</td><td>First_Name</td><td>Last_Name</td><td>User Email</td><td>User Sex</td><td>User Age</td></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['uid']}</td>
                <td>{$row['FName']}</td>
                <td>{$row['LName']}</td>
                <td>{$row['Uemail']}</td>
                <td>{$row['UesrSex']}</td>
                <td>{$row['Userage']}</td>
            </tr>";

            $sexnumber++;
            $usex = $row["UesrSex"];
            if ($usex == 'Male') $male++;
            else $female++;

            $totaluser = $male + $female;
        }

        $sql1 = "SELECT * FROM account";
        $result1 = mysqli_query($con, $sql1);
        while ($row1 = mysqli_fetch_assoc($result1)) {
            $status = isset($row1['status']) ? $row1['status'] : null;
            if ($status == '1') $active++;
            else $inactive++;
            $total = $active + $inactive;
        }

        echo "<tr><td colspan='6'>&nbsp;</td></tr>";
        echo "<tr><td colspan='6' style='text-align: center;font-weight: bold;color:green;'>Total Users</td></tr>";
        echo "<tr><td colspan='3'><b>Total Users Based on Sex</b></td><td colspan='3'><b>Total Users Based on Status</b></td></tr>";
        echo "<tr><td colspan='2'>Male Users</td><td>$male</td><td colspan='2'><b>Active</b></td><td>$active</td></tr>";
        echo "<tr><td colspan='2'>Female Users</td><td>$female</td><td colspan='2'><b>Inactive</b></td><td>$inactive</td></tr>";
        echo "<tr><td colspan='2'>Total Users</td><td>$totaluser</td><td colspan='2'><b>Total</b></td><td>$total</td></tr>";
        echo "</table>";
    } else {
        echo "<div id='error'>Sorry, no record found!</div>";
    }
} else {
    echo "<div id='error'>Sorry! Connection failed!</div>";
}
?>
    </div>
</fieldset>
</div></div>
</td>
<td width="150">
    <div id="sideright">
        <div style="margin-left:0%; text-shadow: 2px Blue;">
            <?php
            $photo = $_SESSION['photo'] ?? 'images/default.jpg';
            $uname = $_SESSION['uname'] ?? 'Guest';
            $role = $_SESSION['role'] ?? 'Unknown';
            ?>
            <img src="<?php echo $photo; ?>" width="90" height="100" alt="image" style="float: left;"/>
            <p style="color:#ffffff;margin-right:1px;font-weight: bolder;">
                User: <?php echo htmlspecialchars($uname); ?><br>
                You Login As: <?php echo htmlspecialchars($role); ?>
            </p>
        </div><br>

        <?php
        if (file_exists("Calendar.php")) {
            include("Calendar.php");
        } else {
            echo "<div style='color:red;'>Calendar file not found.</div>";
        }
        ?>
    </div>
</td>
</tr>
</table>
</div>

<table width="1000"><tr><td>
<?php
if (file_exists("footer.php")) {
    include("footer.php");
} else {
    echo "<div style='color:red;'>Footer file not found.</div>";
}
?>
</td></tr></table>
</div>
</body>
</html>
