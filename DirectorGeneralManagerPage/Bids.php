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
    <title>Post Bid Form</title>
    <link href="mystyles.css" rel="stylesheet" type="text/css" />
    <style>
        body {
            background-color: #f0f4f8;
            font-family: 'Arial', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #2980b9;
            font-size: 2.5em;
            font-weight: 700;
            margin-bottom: 20px;
        }

        h3 {
            color: #2980b9;
            font-size: 1.8em;
            font-weight: 600;
            text-decoration: underline;
            margin-bottom: 10px;
        }

        #divWrapper {
            width: 70%;
            margin: 30px auto;
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        fieldset {
            border: 2px solid #3498db;
            padding: 20px;
            border-radius: 8px;
        }

        legend {
            font-size: 1.8em;
            font-weight: bold;
            color: #2980b9;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
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
            background-color: #ecf0f1;
            cursor: pointer;
        }

        input[type="text"],
        input[type="date"],
        textarea,
        input[type="submit"],
        input[type="reset"] {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            width: 100%;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
            width: auto;
            padding: 10px 20px;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #2980b9;
        }

        .message {
            font-size: 1.2em;
            margin-top: 20px;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }

        @media screen and (max-width: 768px) {
            #divWrapper {
                width: 90%;
                padding: 20px;
            }

            table,
            input[type="text"],
            input[type="date"],
            textarea {
                font-size: 14px;
            }

            th,
            td {
                padding: 10px;
            }

            input[type="submit"],
            input[type="reset"] {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div id="divWrapper">
        <fieldset>
            <legend align="center">
                <h3>Post Bid Form</h3>
            </legend>

            <?php
            if ($con) {
                if (isset($_POST['Register'])) {
                    // Process form submission and insert into bids table
                    $subjects = $_POST['subject'];
                    $contents = $_POST['content'];
                    $start_dates = $_POST['start_date'];
                    $end_dates = $_POST['end_date'];

                    for ($i = 0; $i < count($subjects); $i++) {
                        $subject = mysqli_real_escape_string($con, $subjects[$i]);
                        $content = mysqli_real_escape_string($con, $contents[$i]);
                        $start_date = mysqli_real_escape_string($con, $start_dates[$i]);
                        $end_date = mysqli_real_escape_string($con, $end_dates[$i]);
                        $status = 'Pending';  // Default status

                        $insert_sql = "INSERT INTO bids (subject, content, start_date, end_date, status) 
                                       VALUES ('$subject', '$content', '$start_date', '$end_date', '$status')";
                        
                        if (mysqli_query($con, $insert_sql)) {
                            echo "<p class='message success'>Bid for '$subject' submitted successfully.</p>";
                        } else {
                            echo "<p class='message error'>Error: " . mysqli_error($con) . "</p>";
                        }
                    }
                }

                echo "<form action='' method='post'>";
                echo "<table>";
                echo "<tr>
                        <th>Subject</th>
                        <th>Content</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>";

                $sql1 = "SELECT * FROM request WHERE status='seen by procurement'";
                $result1 = mysqli_query($con, $sql1);

                if (mysqli_num_rows($result1) > 0) {
                    while ($row = mysqli_fetch_assoc($result1)) {
                        echo "<tr>";
                        echo "<td><input type='text' name='subject[]' value='" . htmlspecialchars($row['item_name']) . "' readonly></td>";
                        echo "<td><textarea name='content[]' rows='5' cols='70'>" . htmlspecialchars($row['specification']) . "</textarea></td>";
                        echo "<td><input type='date' name='start_date[]' required></td>";
                        echo "<td><input type='date' name='end_date[]' required></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No records found.</td></tr>";
                }

                echo "</table>";
                echo "<input type='submit' name='Register' value='Register'>";
                echo "<input type='reset' value='Reset'>";
                echo "</form>";
            } else {
                echo "<p class='message error'>Connection failed.</p>";
            }
            ?>
        </fieldset>
    </div>

</body>

</html>
