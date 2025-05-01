<?php
session_start();
include("../connection/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dateencoder Register Blood</title>
    <link rel="stylesheet" type="text/css" href="setting.css">
    <link rel="stylesheet" href="stylesLogin.css">
    <link rel="stylesheet" type="text/css" href="Setting11.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #bbb;
            padding: 8px;
            text-align: center;
        }
        h2 {
            margin: 20px 0;
            text-align: center;
            color: #2e4a62;
        }
    </style>
</head>
<body>

<div id="container">
   

    <div id="navigationmenu"></div>

    <div id="content">
        <table border="0" width="1000" height="500">
            <tr>
                <td width="150"></td>
                <td width="700">
                    <div style="width:625px; height:600px; border:solid 4px #dldbeg; overflow:auto;">
                        <div id="contentcenter">
                            <div class="loginBoxx">
                                <fieldset style="border-radius: 25px; background-color: #e2e6fe; color:#147d98; width:580px;">
                                    <div id="customers">
<?php
if ($con) {
    $sql = "SELECT * FROM blooddonor";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<h2>Blood Donors Profile</h2>";
        echo "<table>
                <tr>
                    <th>Donor ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Occupation</th>
                    <th>Date of Birth</th>
                    <th>Sex</th>
                    <th>Age</th>
                    <th>City</th>
                    <th>Region</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['did']}</td>
                    <td>{$row['fname']}</td>
                    <td>{$row['lname']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['occp']}</td>
                    <td>{$row['dbdate']}</td>
                    <td>{$row['dsex']}</td>
                    <td>{$row['dage']}</td>
                    <td>{$row['city']}</td>
                    <td>{$row['region']}</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "<div id='error'>Sorry, no blood donor records found!</div>";
    }
} else {
    echo "<div id='error'>Database connection failed. Please try again later.</div>";
}
?>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>
