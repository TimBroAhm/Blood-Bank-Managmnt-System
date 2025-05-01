<?php 
include("../connection/connection.php");
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Profile List</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> <!-- Link to new styles.css -->
</head>
<body>

<div id="container">
    <header>
        <img src="images/logoo.jpg" alt="Logo" class="logo">
    </header>

    <main>
        <div class="table-container">
            <h2>Donor Profiles</h2>
            <table>
                <thead>
                    <tr>
                        <th>Donor ID</th><th>First Name</th><th>Last Name</th>
                        <th>Email</th><th>Occupation</th><th>Date of Birth</th>
                        <th>Sex</th><th>Age</th><th>City</th><th>Region</th><th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php	
                    if ($con) { 
                        $sql = "SELECT * FROM blooddonor";                            
                        $result = mysqli_query($con, $sql);

                        if ($result && mysqli_num_rows($result) > 0) {	
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                        <td>" . htmlspecialchars($row['did']) . "</td>
                                        <td>" . htmlspecialchars($row['fname']) . "</td>
                                        <td>" . htmlspecialchars($row['lname']) . "</td>
                                        <td>" . htmlspecialchars($row['email']) . "</td>
                                        <td>" . htmlspecialchars($row['occp']) . "</td>
                                        <td>" . htmlspecialchars($row['dbdate']) . "</td>
                                        <td>" . htmlspecialchars($row['dsex']) . "</td>
                                        <td>" . htmlspecialchars($row['dage']) . "</td>
                                        <td>" . htmlspecialchars($row['city']) . "</td>
                                        <td>" . htmlspecialchars($row['region']) . "</td>
                                        <td><a href='Updatedonor1.php?bdid=" . urlencode($row['did']) . "' class='edit-button'>Edit</a></td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='11'>No records found.</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='11'>Connection failed!</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</div>

</body>
</html>
