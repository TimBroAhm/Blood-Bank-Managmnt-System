<?php 
session_start();
include("../connection/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dateencoder Register Blood</title>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            color: #333;
        }

        #container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            font-size: 28px;
            color: #4a4a4a;
            text-align: center;
            padding-bottom: 20px;
        }

        table {
            width: 100%;
            border-spacing: 0;
            padding: 20px;
        }

        td {
            padding: 10px;
        }

        /* Header Styles */
        #container img {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Content Section */
        #content {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        #contentcenter {
            width: 100%;
            max-width: 650px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            background: #fff;
            padding: 40px;
            border-radius: 10px;
        }

        .loginBoxx {
            background-color: #fff;
            padding: 30px;
        }

        fieldset {
            border-radius: 10px;
            border: 2px solid #d1d7f0;
            background-color: #f9f9f9;
            padding: 20px;
            margin-top: 20px;
        }

        legend {
            font-size: 22px;
            font-weight: bold;
            color: #2c3e50;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 48%;
            margin-top: 10px;
            transition: all 0.3s ease;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #45a049;
        }

        /* Success and Error Messages */
        #Success, #error {
            text-align: center;
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
        }

        #Success {
            background-color: #d4edda;
            color: #155724;
        }

        #error {
            background-color: #f8d7da;
            color: #721c24;
        }

        /* Close button */
        #navigationmenu a {
            text-decoration: none;
            color: #333;
            font-size: 18px;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            #container {
                padding: 15px;
            }

            .loginBoxx {
                width: 100%;
                padding: 15px;
            }

            h2 {
                font-size: 22px;
            }

            input[type="submit"],
            input[type="reset"] {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            table td {
                padding: 10px;
            }

            .loginBoxx {
                width: 100%;
                padding: 10px;
            }
        }
    </style>
</head>
<body>

<div id="container">
    <div id="content">
        <div id="contentcenter">
            <div class="loginBoxx">
                <fieldset>
                    <legend>Register Blood Details</legend>
                    <form action="" method="post">
                        <table border="0" width="100%">
                            <tr>
                                <td>BloodID:</td>
                                <td><input type="text" name="bid" placeholder="Blood ID" maxlength="10" required></td>
                            </tr>
                            <tr>
                                <td>DonorID:</td>
                                <td><input type="text" name="bdid" placeholder="Donor ID" maxlength="10" required></td>
                            </tr>
                            <tr>
                                <td>Blood Group:</td>
                                <td>
                                    <select name="bg" required>
                                        <option value="">Select Blood Group</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>RH Type:</td>
                                <td>
                                    <select name="rhtype" required>
                                        <option value="">Select RH Type</option>
                                        <option value="Positive">RH+</option>
                                        <option value="Negative">RH-</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Pack No:</td>
                                <td><input type="text" name="packno" placeholder="Pack Number" required></td>
                            </tr>
                            <tr>
                                <td>Reg. Date:</td>
                                <td><input type="text" name="rdate" value="<?php echo date('d-m-Y'); ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Exp. Date:</td>
                                <td><input type="text" name="edate" value="<?php echo date('d-m-Y', strtotime('+35 days')); ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Quantity (mL):</td>
                                <td><input type="text" name="bqty" placeholder="Blood Quantity" required></td>
                            </tr>
                            <tr>
                                <td>Status:</td>
                                <td>
                                    <select name="bstatus" required>
                                        <option value="">Select Status</option>
                                        <option value="Available">Available</option>
                                        <option value="Expired">Expired</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" value="Register" name="Register">
                                    <input type="reset" value="Reset">
                                </td>
                            </tr>
                        </table>
                    </form>
                </fieldset>
            </div>

            <?php
            // Check for existing expired blood records
            if ($con) {
                $tod = date("Y-m-d");
                $sql2 = "SELECT * FROM blood";
                $recordfound = mysqli_query($con, $sql2); 
                while ($row = mysqli_fetch_array($recordfound)) {
                    $bdate = $row['edate'];
                    if ($tod == $bdate) {
                        // Update expired blood status
                        $sql1 = "UPDATE blood SET bstatus='Expired' WHERE edate='$bdate'";
                        $updated = mysqli_query($con, $sql1);
                    }
                }
            }

            // Handle form submission to register blood details
            if (isset($_POST['Register'])) { 
                $bid = $_POST["bid"];
                $bdid = $_POST['bdid'];
                $bg = $_POST['bg'];
                $packno = $_POST['packno'];
                $rhtype = $_POST['rhtype'];
                $rdate = $_POST['rdate'];
                $edate = $_POST['edate'];
                $bqty = $_POST['bqty'];
                $bstatus = $_POST['bstatus'];
                $status = "YES";
                $Today = date("d-m-Y");
                $NewDate = date("d-m-Y", strtotime("+35 days"));

                if ($con) {
                    $sql = "INSERT INTO Blood (bid, did, bg, packno, rdate, edate, bqty, bstatus, rhtype) 
                            VALUES ('$bid', '$bdid', '$bg', '$packno', '$Today', '$NewDate', '$bqty', '$bstatus', '$rhtype')";
                    $inserted = mysqli_query($con, $sql);
                    if ($inserted) {
                        echo "<div id='Success'><img src='Images/success.jpg' height='20px' width='50px'/> You have registered the blood successfully!</div>";
                    } else {
                        echo "<div id='error'><img src=' Images/err.png' height='20px' width='30px'/> You haven't registered the blood!</div>" . mysqli_error($con);
                    }
                }
            }
            ?>
        </div>
    </div>
</div>

</body>
</html>
