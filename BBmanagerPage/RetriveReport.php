<?php
session_start();
include("../connection/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Date Encoder - Blood Report</title>
    <link rel="stylesheet" href="setting.css">
    <link rel="stylesheet" href="stylesLogin.css">
    <link rel="stylesheet" href="Setting11.css">
    
    <!-- Google Fonts + Modern Base Styling -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f5f8fc;
            color: #333;
        }
        #container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }
        .header-img {
            width: 100%;
            max-height: 140px;
            object-fit: cover;
            border-radius: 10px;
        }
        #content {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }
        #main {
            flex: 1;
        }
        fieldset {
            background: #ffffff;
            border: 1px solid #dfe3f0;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 0 12px rgba(0,0,0,0.05);
        }
        h3 {
            text-align: center;
            margin-top: 10px;
            color: #2d4059;
        }
        table.report-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
        }
        table.report-table th, table.report-table td {
            border: 1px solid #ccc;
            padding: 8px 12px;
            text-align: center;
        }
        table.report-table th {
            background-color: #e9f1ff;
            font-weight: 600;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group select, .form-group input[type="submit"] {
            padding: 8px 14px;
            font-size: 14px;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
        }
        .form-group input[type="submit"] {
            background-color: #47c3c1;
            color: white;
            cursor: pointer;
        }
        .summary-row td {
            font-weight: bold;
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

<div id="container">
   

    <div id="content">
        <div id="main">
            <fieldset>
                <div id="customers">
                    <?php if(!isset($_POST['search'])): ?>
                        <form method="post">
                            <div class="form-group">
                                <label><strong>Select Time Period to View Blood Report</strong></label><br>
                                <select name="selecttime" required>
                                    <option value="">Select Time</option>
                                    <option value="Daily">Daily</option>
                                    <option value="Month">Month</option>
                                    <option value="Year">Year</option>
                                </select>
                                <input type="submit" name="search" value="View">
                            </div>
                        </form>
                    <?php endif; ?>

                    <?php
                    if(isset($_POST['search'])) {
                        $selecttime = $_POST["selecttime"];
                        $tod = date("d");
                        $month = date("M");
                        $year = date("Y");

                        if($selecttime == 'Daily') {
                            $query2 = "SELECT * FROM blood WHERE rdate = '$tod'";
                            $recordfound1 = mysqli_query($con, $query2);
                            if($recordfound1) {
                                $count = "SELECT * FROM blood WHERE bstatus='Available' AND rdate='$tod'";
                                $querycount = mysqli_query($con, $count);
                                $Available = mysqli_num_rows($querycount);
                                $count2 = "SELECT * FROM blood WHERE bstatus='Expaired' AND rdate='$tod'";
                                $querycount2 = mysqli_query($con, $count2);
                                $Expaired = mysqli_num_rows($querycount2);
                                $total = $Available + $Expaired;
                                ?>
                                <h3>Report for the Day: <?php echo $tod; ?></h3>
                                <table class="report-table">
                                    <tr>
                                        <th>Blood ID</th><th>Donor ID</th><th>Blood Group</th><th>Pack No</th>
                                        <th>Registered Date</th><th>Expired Date</th><th>Quantity</th><th>Status</th>
                                    </tr>
                                    <?php while($row2 = mysqli_fetch_assoc($recordfound1)): ?>
                                        <tr>
                                            <td><?= $row2["bid"]; ?></td>
                                            <td><?= $row2["bdid"]; ?></td>
                                            <td><?= $row2["bg"]; ?></td>
                                            <td><?= $row2["packno"]; ?></td>
                                            <td><?= $row2["rdate"]; ?></td>
                                            <td><?= $row2["edate"]; ?></td>
                                            <td><?= $row2["bqty"]; ?></td>
                                            <td><?= $row2["bstatus"]; ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                    <tr class="summary-row">
                                        <td colspan="2">Available Blood = <?= $Available; ?></td>
                                        <td colspan="2">Expired Blood = <?= $Expaired; ?></td>
                                        <td colspan="4">Total Blood Units = <?= $total; ?></td>
                                    </tr>
                                </table>
                                <?php
                            }
                        } elseif($selecttime == 'Month') {
                            $query2 = "SELECT * FROM blood WHERE month = '$month'";
                            $month1 = mysqli_query($con, $query2);
                            if($month1) {
                                $count = "SELECT * FROM blood WHERE bstatus='Available' AND month='$month'";
                                $Available = mysqli_num_rows(mysqli_query($con, $count));
                                $count2 = "SELECT * FROM blood WHERE bstatus='Expaired' AND month='$month'";
                                $Expaired = mysqli_num_rows(mysqli_query($con, $count2));
                                $total = $Available + $Expaired;
                                ?>
                                <h3>Report for the Month: <?php echo $month; ?></h3>
                                <table class="report-table">
                                    <tr>
                                        <th>Blood ID</th><th>Donor ID</th><th>Blood Group</th><th>Pack No</th>
                                        <th>Registered Date</th><th>Expired Date</th><th>Quantity</th><th>Status</th>
                                    </tr>
                                    <?php while($row2 = mysqli_fetch_assoc($month1)): ?>
                                        <tr>
                                            <td><?= $row2["bid"]; ?></td>
                                            <td><?= $row2["bdid"]; ?></td>
                                            <td><?= $row2["bg"]; ?></td>
                                            <td><?= $row2["packno"]; ?></td>
                                            <td><?= $row2["rdate"]; ?></td>
                                            <td><?= $row2["edate"]; ?></td>
                                            <td><?= $row2["bqty"]; ?></td>
                                            <td><?= $row2["bstatus"]; ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                    <tr class="summary-row">
                                        <td colspan="2">Available Blood = <?= $Available; ?></td>
                                        <td colspan="2">Expired Blood = <?= $Expaired; ?></td>
                                        <td colspan="4">Total Blood Units = <?= $total; ?></td>
                                    </tr>
                                </table>
                                <?php
                            }
                        } elseif($selecttime == 'Year') {
                            $query2 = "SELECT * FROM blood WHERE year = '$year'";
                            $totalyear = mysqli_query($con, $query2);
                            if($totalyear) {
                                $count = "SELECT * FROM blood WHERE bstatus='Available' AND year='$year'";
                                $Available = mysqli_num_rows(mysqli_query($con, $count));
                                $count2 = "SELECT * FROM blood WHERE bstatus='Expaired' AND year='$year'";
                                $Expaired = mysqli_num_rows(mysqli_query($con, $count2));
                                $total = $Available + $Expaired;
                                ?>
                                <h3>Blood Information for Year: <?php echo $year; ?></h3>
                                <table class="report-table">
                                    <tr>
                                        <th>Blood ID</th><th>Donor ID</th><th>Blood Group</th><th>Pack No</th>
                                        <th>Registered Date</th><th>Expired Date</th><th>Quantity</th><th>Status</th>
                                    </tr>
                                    <?php while($row2 = mysqli_fetch_assoc($totalyear)): ?>
                                        <tr>
                                            <td><?= $row2["bid"]; ?></td>
                                            <td><?= $row2["bdid"]; ?></td>
                                            <td><?= $row2["bg"]; ?></td>
                                            <td><?= $row2["packno"]; ?></td>
                                            <td><?= $row2["rdate"]; ?></td>
                                            <td><?= $row2["edate"]; ?></td>
                                            <td><?= $row2["bqty"]; ?></td>
                                            <td><?= $row2["bstatus"]; ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                    <tr class="summary-row">
                                        <td colspan="2">Available Blood = <?= $Available; ?></td>
                                        <td colspan="2">Expired Blood = <?= $Expaired; ?></td>
                                        <td colspan="4">Total Blood Units = <?= $total; ?></td>
                                    </tr>
                                </table>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </fieldset>
        </div>
    </div>
</div>

</body>
</html>
