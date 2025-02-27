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
    <meta name="description" content="View items by searching serial number">
    <meta name="author" content="Your Name">
    <title>View Item</title>
    <link href="mystyles.css" rel="stylesheet" type="text/css" />

    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #B0C4DE;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #2c3e50;
            font-size: 2em;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 30px;
        }

        input[type="text"] {
            padding: 12px;
            width: 80%;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 12px 20px;
            background-color: #2980b9;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #3498db;
        }

        .responsive-table {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
            table-layout: auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        th {
            background-color: #2980b9;
            color: white;
            font-size: 16px;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #d3e9f8;
            transition: 0.3s ease-in-out;
        }

        .no-results {
            color: red;
            font-weight: bold;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            input[type="text"] {
                width: 100%;
            }

            .container {
                padding: 20px;
            }

            h1 {
                font-size: 1.5em;
            }

            table {
                font-size: 12px;
            }

            th, td {
                padding: 8px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Search for an Item</h1>
        <form action="" method="post">
            <input type="text" name="searchkey" placeholder="Enter Item Serial Number" pattern="[a-zA-Z0-9/]+" required>
            <input type="submit" name="search" value="Search">
        </form>

        <?php
        if (isset($_POST['search'])) {
            $searchq = $_POST['searchkey'];
            $searchq = preg_replace("#[^0-9a-zA-Z/]#i", "", $searchq);

            $sql = "SELECT * FROM item WHERE serial_numbre LIKE '%" . mysqli_real_escape_string($con, $searchq) . "%'";
            $query = mysqli_query($con, $sql) or die("Could not search: " . mysqli_error($con));
            $count = mysqli_num_rows($query);

            if ($count == 0) {
                echo "<p class='no-results'>There are no results for your search.</p>";
            } else {
                echo "<div class='responsive-table'><table>";
                echo "<tr>
                        <th>ID</th>
                        <th>Serial No</th>
                        <th>Model</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Shelf No</th>
                        <th>Request ID</th>
                        <th>Supplier ID</th>
                        <th>Clerk ID</th>
                        <th>Price</th>
                        <th>Date</th>
                      </tr>";

                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<tr>
                            <td>{$row['item_Register_ID']}</td>
                            <td>{$row['serial_numbre']}</td>
                            <td>{$row['item_model']}</td>
                            <td>{$row['catagory']}</td>
                            <td>{$row['description']}</td>
                            <td>{$row['shelf_number']}</td>
                            <td>{$row['request_id']}</td>
                            <td>{$row['supplier_id']}</td>
                            <td>{$row['stockclerk_id']}</td>
                            <td>{$row['price']}</td>
                            <td>{$row['date']}</td>
                          </tr>";
                }
                echo "</table></div>";
            }
        }
        ?>
    </div>
</body>
</html>
