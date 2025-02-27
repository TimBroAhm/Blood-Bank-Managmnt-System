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
    <title>View Item</title>
    <link href="mystyles.css" rel="stylesheet" type="text/css"/>
    <style>
        body {
            background-color: white; /* Changed background to white */
            font-family: Arial, sans-serif;
        }
        #divWrapper {
            margin: 50px auto;
            padding: 20px;
            max-width: 1000px; /* Centered wrapper */
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 90%;
            border-collapse: collapse;
            margin-bottom: 20px;
            margin-left: auto;
            margin-right: auto;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px 15px;
            text-align: left;
        }
        th {
            background-color: #007BFF; /* International blue color */
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .search-form {
            text-align: center;
            margin-bottom: 20px;
        }
        .search-form input[type="text"] {
            padding: 8px;
            font-size: 14px;
            width: 300px;
        }
        .search-form input[type="submit"] {
            padding: 8px 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        .no-records {
            text-align: center;
            color: #ff5733;
            font-size: 18px;
        }
    </style>
</head>

<body>

    <div id="divWrapper">
        <h1>View Item Details</h1>

        <div class="search-form">
            <form action="" method="post">
                <label for="searchkey">Enter Item Serial Number:</label>
                <input type="text" name="searchkey" pattern="[a-zA-Z0-9/]+" required>
                <input type="submit" name="search" value="Search">
            </form>
        </div>

        <?php
        $output = '';
        if (isset($_POST['search'])) {
            $searchq = $_POST['searchkey'];
            $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq); // Sanitize input

            $sql = "SELECT * FROM item WHERE serial_numbre LIKE '%" . mysqli_real_escape_string($con, $searchq) . "%'"; 
            $query = mysqli_query($con, $sql) or die("Could not search: " . mysqli_error($con));
            $count = mysqli_num_rows($query);

            if ($count == 0) {
                $output = 'There is no search result.';
            } else {
                echo "<table>";
                echo "<tr><th>Item Register ID</th><th>Serial Number</th><th>Model</th><th>Category</th><th>Description</th>
                      <th>Shelf Number</th><th>Request ID</th><th>Supplier ID</th><th>Stock Clerk ID</th><th>Price</th>
                      <th>Date of Register</th></tr>";
                while ($row = mysqli_fetch_array($query)) {
                    echo "<tr><td>".$row['item_Register_ID']."</td><td>".$row['serial_numbre']."</td><td>".$row['item_model']."</td>
                          <td>".$row['catagory']."</td><td>".$row['description']."</td><td>".$row['shelf_number']."</td>
                          <td>".$row['request_id']."</td><td>".$row['supplier_id']."</td><td>".$row['stockclerk_id']."</td>
                          <td>".$row['price']."</td><td>".$row['date']."</td></tr>";
                }
                echo "</table>";
            }
        }

        echo $output;

        // Display all items if no search or if search returns no result
        echo "<h3>List of Item Registered in the Store</h3>";

        if ($con) {
            $sql = "SELECT * FROM item ORDER BY date DESC";
            $sql1 = mysqli_query($con, $sql);
            if ($sql1) {
                echo "<table>";
                echo "<tr><th>Item Register ID</th><th>Serial Number</th><th>Model</th><th>Category</th><th>Description</th>
                      <th>Shelf Number</th><th>Request ID</th><th>Supplier ID</th><th>Stock Clerk ID</th><th>Price</th>
                      <th>Date of Register</th></tr>";
                while ($row = mysqli_fetch_array($sql1)) {
                    echo "<tr><td>".$row['item_Register_ID']."</td><td>".$row['serial_numbre']."</td><td>".$row['item_model']."</td>
                          <td>".$row['catagory']."</td><td>".$row['description']."</td><td>".$row['shelf_number']."</td>
                          <td>".$row['request_id']."</td><td>".$row['supplier_id']."</td><td>".$row['stockclerk_id']."</td>
                          <td>".$row['price']."</td><td>".$row['date']."</td></tr>";
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
