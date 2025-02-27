<?php 
session_start();
include("connection/connection.php");
?>

<?php
if (isset($_POST['create'])) {
    // Collect form data
    $fn = $_POST['username'];   // Username
    $mn = $_POST['email'];      // Email

    // Query the database to find the user based on username and email
    $result = mysqli_query($con, "SELECT * FROM Account WHERE USER_NAME='$fn' AND EMAIL='$mn'");

    // Check if the query was successful and if any user was found
    if (!$result) {
        die("Error: Query failed - " . mysqli_error($con));
    }

    // Check if no data was found matching the username and email
    if (mysqli_num_rows($result) == 0) {
        die("Error: Data not found..");
    }

    // Fetch user details from the database
    $test = mysqli_fetch_array($result);
    $username = $test['USER_NAME'];
    $password = $test['PASSWORD']; // Password
    $usertype = $test['ROLE']; // Role
    $id = $test['USER_ID']; // We need the user ID for updating the record

    // Display the user details in a table format
    echo "<div class='container'>
            <h2>User Details</h2>
            <table class='user-table'>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Role</th>
                </tr>
                <tr>
                    <td>" . htmlspecialchars($username) . "</td>
                    <td>" . htmlspecialchars($password) . "</td>
                    <td>" . htmlspecialchars($usertype) . "</td>
                </tr>
            </table>
          </div>";

    // Handle 'edit' action when the user wants to change the password
    if (isset($_POST['edite'])) {
        $username_save = $_POST['username'];
        $password_save = $_POST['password'];  // Plain text password from the form

        // Update the user details in the database with the new password
        $update_query = "UPDATE Account SET USER_NAME='$username_save', PASSWORD='$password_save' WHERE USER_ID='$id'";

        // Execute the update query
        if (mysqli_query($con, $update_query)) {
            echo "Password updated successfully!";
            header("Location: AccountUpdate.php");  // Redirect after successful update
            exit();  // Ensure the script stops after redirection
        } else {
            die("Error updating password: " . mysqli_error($con));
        }
    }
}

mysqli_close($con);
?>
