<?php
include("../connection/connection.php");  
 session_start();
if(isset($_SESSION['USER_ID']))
 {
  $mail=$_SESSION['USER_ID'];
 } else {
 ?>

<script>
  alert('You are not logged In !! Please Login to access this page');
  alert(window.location='../login.php');
 </script>
 <?php
 }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Requests</title>
    <link href="mystyles.css" rel="stylesheet" type="text/css" />
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 2.5em; /* Larger font size */
            font-weight: 700;
        }

        h2 {
            color: #3498db;
            margin-bottom: 20px;
            font-size: 2em; /* Slightly smaller */
            font-weight: 600;
        }

        #divWrapper {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f4f4f4;
        }

        tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        .action-btn {
            background-color: #3498db;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .action-btn:hover {
            background-color: #2980b9;
        }

        @media screen and (max-width: 768px) {
            table {
                font-size: 14px;
            }

            th, td {
                padding: 10px;
            }

            #divWrapper {
                width: 95%;
            }
        }
    </style>
</head>

<body>

    <center>
        <div id="divWrapper">
            <div id="divNav">
                <!-- Include a navigation or date/time functionality here if needed -->
            </div>

           
            <h2>Request Details</h2> <!-- Subheading for Table Section -->

            <?php
            if ($con) {
                // SQL Query to fetch requests
                $sql = "SELECT * FROM request WHERE status != 'send by department' 
                        AND status != 'seen by procurement' 
                        AND status != 'Reject by college dean' 
                        AND status != 'Reject by procurement' 
                        ORDER BY date DESC";
                $sql1 = mysqli_query($con, $sql);

                if ($sql1) {
                    echo "<table>";
                    echo "<tr><th>Request ID</th><th>Employee ID</th><th>Item Name</th><th>Specification</th><th>Quantity</th><th>Request From</th><th>Date of Request</th><th>Request Status</th></tr>";

                    while ($row = mysqli_fetch_array($sql1)) {
                        // Initialize deptcollofficename to prevent undefined variable error
                        $deptcollofficename = "Unknown";

                        $deptcollid = $row['request_from'];

                        // Check if the request is from a department
                        $sql3 = "SELECT Dept_Name FROM department WHERE Did='$deptcollid'";
                        $resultset = mysqli_query($con, $sql3);
                        if ($resultset && $dept = mysqli_fetch_array($resultset)) {
                            $deptcollofficename = $dept['Dept_Name'];
                        } else {
                            // Check if the request is from a college
                            $sql3 = "SELECT collage_name FROM collage WHERE collage_id='$deptcollid'";
                            $resultset = mysqli_query($con, $sql3);
                            if ($resultset && $collage = mysqli_fetch_array($resultset)) {
                                $deptcollofficename = $collage['collage_name'];
                            } else {
                                // Check if the request is from an office
                                $sql3 = "SELECT office_name FROM office WHERE office_id='$deptcollid'";
                                $resultset = mysqli_query($con, $sql3);
                                if ($resultset && $office = mysqli_fetch_array($resultset)) {
                                    $deptcollofficename = $office['office_name'];
                                }
                            }
                        }

                        echo "<tr>
                            <td>".$row['request_id']."</td>
                            <td>".$row['Employee_id']."</td>
                            <td>".$row['item_name']."</td>
                            <td>".$row['specification']."</td>
                            <td>".$row['quentity']."</td>
                          <td>".$row['request_from']."</td>
                            <td>".$row['Date']."</td>
                            <td>".$row['status']."</td>
                        </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No records found.</p>";
                }
            } else {
                echo "<p>Connection Failed.</p>";
            }
            ?>
        </div>
    </center>

</body>

</html>

<?php
if (isset($_GET['UID'])) {
    $driver_id = $_GET['UID'];
    $sql = "UPDATE request SET status='seen by procurement' WHERE request_id='$driver_id'";
    $update = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con)) {
        header("Location: approverequestco.php");
    }
}
?>
