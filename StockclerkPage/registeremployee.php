<?php
include("../connection/connection.php");  
session_start();

// Check if the user is logged in
if (!isset($_SESSION['USER_ID'])) {
    echo '<script>
        alert("You are not logged In !! Please Login to access this page");
        window.location.href = "../login.php";
    </script>';
    exit();
}

$con = mysqli_connect("localhost", "root", "", "tms");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);  // Enable detailed error reporting

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST["register"])) {
    $id = $_POST["id"];
    $fn = $_POST["fnn"];
    $mn = $_POST["fathername"];
    $ln = $_POST["mnn"];
    $sex = $_POST["sexx"];
    $email = $_POST["email"];
    $po = $_POST["postion"];
    $date = $_POST["date"];

    // Check if the employee already exists
    $sql_check = "SELECT * FROM `employee` WHERE `Employee_id` = '$id'";
    $userexist = mysqli_query($con, $sql_check);

    if (mysqli_num_rows($userexist) > 0) {
        echo "Employee already exists.";
    } else {
        // Insert new employee with backticks to avoid case sensitivity issues
        $sql_insert = "INSERT INTO `employee` 
        (`Employee_id`, `First_Name`, `Middle_Name`, `Last_Name`, `Email`, `Sex`, `Dept_Office_collage_Id`, `Employe_status`, `Date`) 
        VALUES ('$id', '$fn', '$mn', '$ln', '$email', '$sex', '$po', 'onduty', '$date')";

        if (mysqli_query($con, $sql_insert)) {
            echo "Employee registered successfully!";
        } else {
            echo "Unable to register the user: " . mysqli_error($con);
        }
    }
}
?>

<html>
<head>
    <title>Register Employee</title>
    <link rel="stylesheet" type="text/css" href="../css/emloyeestyle.css">
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script src="../js/jquery-3.3.1.js" type="text/javascript"></script>
<script type="text/JavaScript" src="../js/employeeregister.js"> </script>
<meta charset="utf-8">
</head>
<body bgcolor="white">
    <div class="header">
        <h1>Employee Registration Form</h1>
    </div>

    <div id="wrapper">
       
            <form method="POST" action="registeremployee.php" onsubmit="return validate()" name="vfrom" id="cform">
                <div>
                    <label>Employee ID</label><br>
                    <input type="text" name="id" class="textInput" id="idd" required>
                    <span><i id="fname_error" class="val_error"></i></span>
                </div>

                <div>
                    <label>First Name</label><br>
                    <input type="text" name="fnn" class="textInput" id="ffn" required>
                    <span><i id="fathername_error" class="val_error"></i></span>
                </div>

                <div>
                    <label>Middle Name</label><br>
                    <input type="text" name="fathername" class="textInput" id="fathername" required>
                    <span><i id="fathername_error" class="val_error"></i></span>
                </div>

                <div>
                    <label>Last Name</label><br>
                    <input type="text" name="mnn" class="textInput" id="mnn" required>
                    <span><i id="grandfather_error" class="val_error"></i></span>
                </div>

                <div>
                    <label>Sex</label><br>
                    <select name="sexx" id="sex" class="textInput" required>
                        <option value="">Select Sex</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <span><i id="kebele_error" class="val_error"></i></span>
                </div>

                <div>
                    <label>Email</label><br>
                    <input type="email" name="email" class="textInput" id="email" required>
                    <span><i id="grandfather_error" class="val_error"></i></span>
                </div>

                <div>
                    <label>College/Dept/Office</label><br>
                    <select name="postion" required style='width: 30%; height: 15%; border-radius: 4px; font-size: 15px; border: 1px solid #060907; padding: 0px;'>
                        <option selected="selected" value="">Choose</option>
                        <?php
                        $courses = mysqli_query($con, "SELECT * FROM office");
                        $courses1 = mysqli_query($con, "SELECT * FROM collage");
                        $courses2 = mysqli_query($con, "SELECT * FROM department");

                        while ($getcourses = mysqli_fetch_array($courses)) {
                            echo "<option value='{$getcourses['office_id']}'>{$getcourses['office_name']} (Office)</option>";
                        }

                        while ($getcourses1 = mysqli_fetch_array($courses1)) {
                            echo "<option value='{$getcourses1['collage_id']}'>{$getcourses1['collage_name']} (College)</option>";
                        }

                        while ($getcourses2 = mysqli_fetch_array($courses2)) {
                            echo "<option value='{$getcourses2['Did']}'>{$getcourses2['Dept_Name']} (Department)</option>";
                        }
                        ?>
                    </select>
                    <br>
                    <span id="request_error" class="val_error"></span>
                </div>

                <div>
                    <label>Date of Registration</label><br>
                    <input type="text" name="date" class="textInput" value="<?php echo date('Y-m-d'); ?>" id="ln" readonly>
                    <span><i id="grandfather_error" class="val_error"></i></span>
                </div>

                <div>
                    <input type="submit" value="Submit" class="btn" name="register">
                    <input type="reset" value="Reset" class="btn">
                </div>
            </form>
       
    </div>
</body>
</html>
