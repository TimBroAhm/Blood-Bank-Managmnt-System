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
    <title>View Item</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .search-form {
            text-align: center;
            margin-bottom: 20px;
        }
        .search-form input[type="text"] {
            padding: 10px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .search-form input[type="submit"] {
            padding: 10px 20px;
            background: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .table-container {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>





<body>
    <div class="container">
        <h2>Search for an Item</h2>
        <form action="" method="post" class="search-form">
            <input type="text" name="searchkey" pattern="[a-zA-Z0-9/]+" placeholder="Enter Item Serial Number" required>
            <input type="submit" name="search" value="Search">
        </form>

        <?php
        if(isset($_POST["search"])) {
			$searchq = $_POST['searchkey'];
           $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq); // Sanitize input
		    $sql = "SELECT * FROM item WHERE serial_numbre LIKE '%" . mysqli_real_escape_string($con, $searchq) . "%'"; 
        $query = mysqli_query($con, $sql) or die("Could not search: " . mysqli_error($con));
        $count = mysqli_num_rows($query);
		 if ($count == 0) {
            $output = 'There is no search result.';
        } else {
			echo"<table border=1>";
	echo"<tr style='background-color:white';><th> Item Register ID</th><th> Srial Number</th><th> Model</th><th>Catagory</th><th>Description</th><th>ShelfNumber</th><th>Request_ID</th><th>Supplier_ID</th><th>Stockclerk_ID</th><th>Price</th>
	<th>Date_of_register</th></tr>";
            while ($row = mysqli_fetch_array($query)) {
				echo"<br>";
				echo"<br>";
               echo "<tr><td>".$row['item_Register_ID']."</td><td>".$row['serial_numbre']."</td><td>".$row['item_model']."</td><td>".$row['catagory'].
			"</td><td>".$row['description']."</td><td>".$row['shelf_number']."</td><td>".$row['request_id']."</td><td>".$row['supplier_id']."
			</td><td>".$row['stockclerk_id']."</td><td>".$row['price']."</td><td>".$row['date']."</td></tr>";	
            }
        }
           
        }

        echo "<h2>List of Items Registered in the Store</h2>";
        if($con) {
            $sql = "SELECT * FROM item ORDER BY date DESC";
            $result = mysqli_query($con, $sql);
            if($result) {
                echo "<div class='table-container'>";
                echo "<table>
                      <tr>
                          <th>Item Register ID</th>
                          <th>Serial Number</th>
                          <th>Model</th>
                          <th>Category</th>
                          <th>Description</th>
                          <th>Shelf Number</th>
                          <th>Request ID</th>
                          <th>Supplier ID</th>
                          <th>Stockclerk ID</th>
                          <th>Price</th>
                          <th>Date of Register</th>
                      </tr>";
                while($row = mysqli_fetch_array($result)) {
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
            } else {
                echo "<p style='color:red; text-align:center;'>No records found.</p>";
            }
        } else {
            echo "<p style='color:red; text-align:center;'>Connection Failed.</p>";
        }
        ?>
    </div>
</body>
</html>
