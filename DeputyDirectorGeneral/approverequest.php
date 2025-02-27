<?php
include("../connection/connection.php");  
session_start();
if (isset($_SESSION['USER_ID'])) {
    $mail = $_SESSION['USER_ID'];
} else {
    echo "<script>
            alert('You are not logged In !! Please Login to access this page');
            window.location='../login.php';
          </script>";
}
?>

<html>

<head>
    <title>Approve Request</title>
    <link href="mystyles.css" rel="stylesheet" type="text/css"/>
    <style>
        body {
            background-color: white; /* Set the background to white */
            font-family: Arial, sans-serif;
        }
        #divContentCenter {
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 1000px; /* Adjusted container width */
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 90%; /* Reduced table width */
            border-collapse: collapse;
            margin-bottom: 20px;
            margin-left: auto;
            margin-right: auto;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px 12px; /* Reduced padding */
            text-align: left;
        }
        th {
            background-color: #007BFF; /* International blue color */
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            color: #fff;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
        }
        .approve {
            background-color: #007BFF; /* International blue for approve */
        }
        .reject {
            background-color: #f44336;
        }
        a:hover {
            opacity: 0.8;
        }
        .response-buttons {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }
        .no-records {
            text-align: center;
            color: #ff5733;
            font-size: 18px;
        }
    </style>
</head>

<body>

    <div id="divContentCenter">

        <?php
        if ($con) {
            echo "<h1>List of Requests from Different Offices</h1>";
            $sql = "SELECT * FROM request WHERE status != 'send by department' 
                            AND status != 'seen by procurement' 
                            AND status != 'Reject by college dean' 
                            AND status != 'Reject by procurement' 
                            ORDER BY date DESC";
            $sql1 = mysqli_query($con, $sql);
            if ($sql1) {
                echo "<table>";
                echo "<tr><th>Request_ID</th><th>Employee_id</th><th>Item Name</th><th>Specification</th><th>Quantity</th>
                      <th>Request_from</th><th>DateOfRequest</th><th>Request_status</th><th>Response</th></tr>";
                while ($row = mysqli_fetch_array($sql1)) {
                    // Initialize the department, college, or office name
                    $deptcollofficename = null;
                    $deptcollid = $row['request_from'];

                    // Check if it’s a department
                    $sql3 = "SELECT Dept_Name FROM department WHERE Did='$deptcollid'";
                    $resultset = mysqli_query($con, $sql3);
                    if ($resultset && $result = mysqli_fetch_array($resultset)) {
                        $deptcollofficename = $result['Dept_Name'];
                    }
                    // Check if it's a college
                    if (!$deptcollofficename) {
                        $sql3 = "SELECT college_name FROM college WHERE college_id='$deptcollid'";
                        $resultset = mysqli_query($con, $sql3);
                        if ($resultset && $result = mysqli_fetch_array($resultset)) {
                            $deptcollofficename = $result['college_name'];
                        }
                    }
                    // Check if it's an office
                    if (!$deptcollofficename) {
                        $sql3 = "SELECT office_name FROM office WHERE office_id='$deptcollid'";
                        $resultset = mysqli_query($con, $sql3);
                        if ($resultset && $result = mysqli_fetch_array($resultset)) {
                            $deptcollofficename = $result['office_name'];
                        }
                    }

                    echo "<tr><td>" . $row['request_id'] . "</td><td>" . $row['Employee_id'] . "</td><td>" . $row['item_name'] . "</td>
                          <td>" . $row['specification'] . "</td><td>" . $row['quentity'] . "</td><td>" . $deptcollofficename . "</td>
                          <td>" . $row['Date'] . "</td><td>" . $row['status'] . "</td>";
                    ?>
                    <td class="response-buttons">
                        <a href="approverequest.php?UID=<?php echo $row['request_id']; ?>" class="approve">Approve</a>
                        <a href="approverequest.php?UID1=<?php echo $row['request_id']; ?>" class="reject">Reject</a>
                    </td>
                    </tr>
                    <?php
                }
                echo "</table>";
            } else {
                echo "<p class='no-records'>No records found.</p>";
            }
        } else {
            echo "<p class='no-records'>Connection Failed.</p>";
        }
        ?>

    </div>

</body>
</html>

<?php
if (isset($_GET['UID'])) {
    $driver_id = $_GET['UID'];
    $sql = "UPDATE request SET status='seen by procurement' WHERE request_id='$driver_id'";
    $update = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con)) {
        header("location:approverequest.php");
    }
}

if (isset($_GET['UID1'])) {
    $driver_id = $_GET['UID1'];
    $sql = "UPDATE request SET status='Reject by procurement' WHERE request_id='$driver_id'";
    $update = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con)) {
        header("location:approverequest.php");
    }
}
?>
