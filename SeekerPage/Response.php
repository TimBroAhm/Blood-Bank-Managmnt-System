<?php
session_start();
include("../connection/connection.php");

// ✅ Define $uid from session
$uid = $_SESSION['USER_ID']; // Make sure this session variable is set during login
?>
<html>
<head>
    <title>Request Response</title>
    <link rel="stylesheet" type="text/css" href="setting.css">
    <link rel="stylesheet" href="stylesLogin.css">
    <link rel="stylesheet" type="text/css" href="Setting11.css">
</head>
<body>

<div id="container">
    

    <div style="width:660px; height: 600px; border:solid 4px #dldbeg; overflow: auto; margin: auto;">
        <div class="loginBoxx">
            <fieldset style="border-radius: 25px; background-color: #e2e6fe; color:#147d98; height:auto; width:580px; margin: 20px auto; padding: 20px;">

<?php
// ✅ Check for ACCEPTED requests (unread)
$sql = "SELECT * FROM bloodrequest WHERE uid=? AND status='yes' AND Unread='yes'";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, 's', $uid);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$count = mysqli_num_rows($result);

// ✅ Check for REJECTED requests (unread)
$sql1 = "SELECT * FROM bloodrequest WHERE uid=? AND status IS NOT NULL AND Unread='no'";
$stmt1 = mysqli_prepare($con, $sql1);
mysqli_stmt_bind_param($stmt1, 's', $uid);
mysqli_stmt_execute($stmt1);
$result1 = mysqli_stmt_get_result($stmt1);
$count1 = mysqli_num_rows($result1);

// ✅ Handle accepted requests
if ($count > 0) {
    // ✅ Update read status for accepted
    $update = "UPDATE bloodrequest SET status='seekerseenaccept', Unread='not' WHERE uid=? AND status='yes' AND Unread='yes'";
    $stmt2 = mysqli_prepare($con, $update);
    mysqli_stmt_bind_param($stmt2, 's', $uid);
    mysqli_stmt_execute($stmt2);

    echo "<br><br><center><h3>✅ Success! You can come and take your requested blood.</h3></center>";

// ❌ Handle rejected requests
} elseif ($count1 > 0) {
    $row = mysqli_fetch_assoc($result1);
    $re = $row['status'];

    // ✅ Update read status for rejected
    $update = "UPDATE bloodrequest SET status='seekerseenreject', Unread='not' WHERE uid=? AND Unread='no'";
    $stmt3 = mysqli_prepare($con, $update);
    mysqli_stmt_bind_param($stmt3, 's', $uid);
    mysqli_stmt_execute($stmt3);

    echo "<center><h3>Status: $re</h3></center>";
    echo "<br><br><center><h3>❌ Sorry! There is not sufficient blood in our stock. Please try again later.</h3></center>";

// ⏳ No response yet
} else {
    echo "<br><br><center><h3>⏳ There is no response at the moment.</h3></center>";
}
?>

            </fieldset>
        </div>
    </div>
</div>

</body>
</html>
