<?php
include("../connection/connection.php"); 
session_start();

if (!isset($_SESSION['USER_ID'])) {
    ?>
    <script>
        alert('You are not logged In !! Please Login to access this page');
        window.location = '../login.php'; 
    </script>
    <?php
    exit(); // Stop further execution if not logged in
}

// Fetch data from 'Requestt' table
$query = "SELECT REQUAST_ID, FIRST_NAME, MIDDLE_NAME, PHONE_NO 
          FROM Requestt 
          WHERE ACCEPTED = 'accepted' 
          AND APPROVED = 'Approved' 
          ORDER BY REQUASTED_DATE DESC 
          LIMIT 9";
$result = mysqli_query($con, $query);

if (!$result) { 
    die("Query execution failed: " . mysqli_error($con)); 
}

if (mysqli_num_rows($result) == 0) {
    echo '<script type="text/javascript">alert("There is no such data in the database !! ");</script>';
} else {
    echo "<table id='vtable' style='width:700px;border:1px solid #336699;border-radius:10px;' align='center'><font color=white>";
    echo "<tr>";
    echo "<th bgcolor='#336699'><font color='white' size='2'>ID Number</th>";
    echo "<th bgcolor='#336699'><font color='white' size='2'>First Name</th>";
    echo "<th bgcolor='#336699'><font color='white' size='2'>Middle Name</th>";
    echo "<th bgcolor='#336699'><font color='white' size='2'>Phone number</th></tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row["REQUAST_ID"] . "</td>";
        echo "<td>" . $row["FIRST_NAME"] . "</td>";
        echo "<td>" . $row["MIDDLE_NAME"] . "</td>";
        echo "<td>" . $row["PHONE_NO"] . "</td>";
        echo "</tr>";
    }

    // Fetch data from 'employee' table
    $sql2 = "SELECT EID, FIRST_NAME, MIDDLE_NAME, PHONE_NO 
            FROM employee1 
            ORDER BY EID DESC 
            LIMIT 13";
    $result2 = mysqli_query($con, $sql2);

    if (!$result2) { 
        die("Query execution failed: " . mysqli_error($con)); 
    }

    while ($rr = mysqli_fetch_array($result2)) {
        echo "<tr>";
        echo "<td>" . $rr["EID"] . "</td>";
        echo "<td>" . $rr["FIRST_NAME"] . "</td>";
        echo "<td>" . $rr["MIDDLE_NAME"] . "</td>";
        echo "<td>" . $rr["PHONE_NO"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}

mysqli_close($con); // Close the database connection
?>