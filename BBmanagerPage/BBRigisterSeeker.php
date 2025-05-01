<?php
session_start();
include("../connection/connection.php");

$photo = isset($_SESSION['photo']) ? $_SESSION['photo'] : 'Images/default.jpg';
$uname = isset($_SESSION['uname']) ? $_SESSION['uname'] : 'Guest';
$role  = isset($_SESSION['role']) ? $_SESSION['role'] : 'Unknown';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register Blood Seeker</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #f9f9f9, #e3f2fd);
        }
        #container {
            width: 100%;
            padding: 40px 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #content {
            background-color: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 90%;
            max-width: 700px;
        }
        h2 {
            text-align: center;
            color: #d32f2f;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 10px 8px;
            font-size: 16px;
            vertical-align: middle;
        }
        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="file"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #cfd8dc;
            border-radius: 8px;
            font-size: 16px;
            background-color: #f1f1f1;
        }
        select {
            cursor: pointer;
        }
        input[type="submit"],
        input[type="reset"] {
            padding: 12px 20px;
            font-size: 16px;
            margin-top: 10px;
            border: none;
            border-radius: 8px;
            background-color: #d32f2f;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #b71c1c;
        }
        #Success, #error {
            margin-top: 20px;
            padding: 15px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
        }
        #Success {
            background-color: #e8f5e9;
            color: #388e3c;
            border: 1px solid #66bb6a;
        }
        #error {
            background-color: #ffebee;
            color: #c62828;
            border: 1px solid #ef5350;
        }
        img {
            vertical-align: middle;
        }
    </style>
</head>
<body>
<div id="container">
    <div id="content">
        <form action="" method="post" enctype="multipart/form-data">
            <h2>
                <img src="Images/blood-icon.png" height="24px" style="margin-right:8px;">
                Register Blood Seeker
            </h2>
            <table>
                <tr><td>Seeker ID:</td><td><input type="text" name="uid" required></td></tr>
                <tr><td>First Name:</td><td><input type="text" name="fname" required></td></tr>
                <tr><td>Last Name:</td><td><input type="text" name="lname" required></td></tr>
                <tr><td>Age:</td><td><input type="number" name="sage" required></td></tr>
                <tr><td>Sex:</td>
                    <td>
                        <select name="ssex" required>
                            <option value="">Select sex</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </td>
                </tr>
                <tr><td>Email:</td><td><input type="email" name="semail" required></td></tr>
                <tr><td>Hospital Name:</td><td><input type="text" name="hname" required></td></tr>
                <tr><td>Photo:</td><td><input type="file" name="photo" accept="image/jpeg" required></td></tr>
                <tr><td></td>
                    <td>
                        <input type="submit" name="signup" value="Register">
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>

<?php
if (isset($_POST['signup'])) {
    $sid    = $_POST['uid'];
    $fname  = $_POST['fname'];
    $lname  = $_POST['lname'];
    $sage   = $_POST['sage'];
    $semail = $_POST['semail'];
    $ssex   = $_POST['ssex'];
    $hname  = $_POST['hname'];

    $ptmploc = $_FILES["photo"]["tmp_name"];
    $pname   = $_FILES["photo"]["name"];
    $psize   = $_FILES["photo"]["size"];
    $ptype   = $_FILES["photo"]["type"];

    $status = 1;
    $user_status = "Noaccount";

    if ($con) {
        if ($psize <= 90000 && $ptype == "image/jpeg") {
            if (!file_exists("Images")) mkdir("Images");
            $photopath = "Images/" . time() . "_" . basename($pname);

            if (move_uploaded_file($ptmploc, $photopath)) {

                $sql1 = "INSERT INTO BloodSeeker 
                         (sid, sfname, slname, sage, ssex, semail, hname, website, sstatus, UserPhoto) 
                         VALUES 
                         ('$sid', '$fname', '$lname', $sage, '$ssex', '$semail', '$hname', 'www.stpaul.com', $status, '$photopath')";

                $sql2 = "INSERT INTO user 
                         (uid, FName, LName, Uemail, UesrSex, Userage, UserPhoto) 
                         VALUES 
                         ('$sid', '$fname', '$lname', '$semail', '$ssex', $sage, '$photopath')";

                $inserted1 = mysqli_query($con, $sql1);
                $inserted2 = mysqli_query($con, $sql2);

                if ($inserted1 && $inserted2) {
                    echo "<div id='Success'>
                            <img src='Images/success.jpg' height='20px' width='30px'/>
                            You have registered the blood seeker successfully!
                          </div>";
                } else {
                    echo "<div id='error'>Registration failed:<br>" . mysqli_error($con) . "</div>";
                }
            } else {
                echo "<div id='error'>Unable to upload the photo!</div>";
            }
        } else {
            echo "<div id='error'>";
            echo $psize > 90000 ? "Photo size should not be greater than 90KB!" : "Photo should be in JPEG format!";
            echo "</div>";
        }
    } else {
        echo "<div id='error'>Database connection failed: " . mysqli_connect_error() . "</div>";
    }
}
?>
    </div>
</div>
</body>
</html>
