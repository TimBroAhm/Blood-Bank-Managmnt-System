<?php
session_start();
include("../connection/connection.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check database connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch withdraw items
$sql = "SELECT * FROM item_withdraw ORDER BY DateOf_Register DESC";
$result = mysqli_query($con, $sql);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Item Withdraw</title>
    <link href="mystyles.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <center>
        <div id="divWrapper">
            <h1>List of Withdrawed Items</h1>
            <table border='1'>
                <tr>
                    <th>Withdraw ID</th>
                    <th>Item Name with Serial Number</th>
                    <th>Stock Clerk Employee ID</th>
                    <th>Receiver Employee Name</th>
                    <th>Date of Register</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    $itemname = $itemserial = $empname = $empmname = 'Unknown';

                    $itemid = $row['item_Register_ID'];
                    $itemQuery = "SELECT * FROM item WHERE item_Register_ID='$itemid'";
                    $itemResult = mysqli_query($con, $itemQuery);

                    if ($itemData = mysqli_fetch_array($itemResult)) {
                        $itemname = $itemData['item_model'];
                        $itemserial = $itemData['serial_numbre'];
                    }

                    $empid = $row['Employee_id'];
                    $empQuery = "SELECT * FROM employee WHERE Employee_id='$empid'";
                    $empResult = mysqli_query($con, $empQuery);

                    if ($empData = mysqli_fetch_array($empResult)) {
                        $empname = $empData['First_Name'];
                        $empmname = $empData['Middle_Name'];
                    }

                    echo "<tr>
                            <td>{$row['withdraw_id']}</td>
                            <td>{$itemname} ({$itemserial})</td>
                            <td>{$row['stockclerk_employee_ID']}</td>
                            <td>{$empname} {$empmname}</td>
                            <td>{$row['DateOf_Register']}</td>
                          </tr>";
                }
                ?>
            </table>
        </div>
    </center>
</body>
</html>
