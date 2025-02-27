<?php
include("../connection/connection.php");  
session_start();
if (isset($_SESSION['USER_ID'])) {
    $mail = $_SESSION['USER_ID'];
} else {
?>
<script>
    alert('You are not logged in! Please log in to access this page.');
    window.location = '../login.php';
</script>
<?php
    exit(); // Ensure script stops if not logged in
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Item</title>
    <link href="mystyles.css" rel="stylesheet" type="text/css">
    <style>
        /* General styling */
        body {
            background-color: #ffffff;
            font-family: 'Poppins', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background: #fff;
        }

        h5 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 20px;
            color: #1E90FF; /* Blue */
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #1E90FF; /* Blue */
            color: white;
            font-size: 18px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
            transition: 0.3s;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            table, th, td {
                font-size: 14px;
            }
        }

        /* Error message styling */
        .error-message {
            text-align: center;
            color: red;
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h5>View Comments</h5>
        
        <?php
        if ($con) {
            $sql = "SELECT * FROM comment";
            $result = mysqli_query($con, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr><th>Comment ID</th><th>Comment</th><th>Post ID</th></tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['comment_id']}</td>
                            <td>{$row['content']}</td>
                            <td>{$row['post_id']}</td>
                          </tr>";
                }

                echo "</table>";
            } else {
                echo "<p class='error-message'>No records found.</p>";
            }
        } else {
            echo "<p class='error-message'>Connection Failed: " . mysqli_connect_error() . "</p>";
        }
        ?>
    </div>
</body>

</html>
