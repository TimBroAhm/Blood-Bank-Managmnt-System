<?php
include("../connection/connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeekerPage</title>
    <link rel="stylesheet" type="text/css" href="setting.css">
    <link rel="stylesheet" href="stylesLogin.css">
    <link rel="stylesheet" type="text/css" href="Setting11.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
        }

        #container {
            width: 100%;
            max-width: 1065px;
            margin: auto;
            padding: 20px;
        }

        #content {
            margin: 30px 0;
            padding: 10px;
            background-color: #fff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .loginBoxx {
            padding: 20px;
            background-color: #e2e6fe;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }

        td, th {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        td input[type="radio"] {
            margin-right: 10px;
        }

        caption {
            font-size: 18px;
            font-weight: bold;
            color: #147d98;
            background-color: #fff;
            padding: 10px;
        }

        input[type="submit"], input[type="reset"] {
            background-color: #147d98;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #0f6374;
        }

        .sideright, .sideleft {
            width: 150px;
        }

        @media screen and (max-width: 768px) {
            #content {
                margin: 10px;
            }

            table, td, th {
                font-size: 14px;
                padding: 8px;
            }
        }

        /* Change the marquee text color to white */
        marquee {
            color: white;
        }
    </style>
</head>
<body>

<?php
if (isset($_SESSION['USER_NAME'])) {
    $uid = $_SESSION['USER_ID'];
?>

<div id="container">
    <div id="content">
        <table border="0" width="100%">
            <tr>
                <td class="sideleft"></td>
                <td>
                    <div style="width:640px;height: 600px; border: solid 4px #dldbeg; overflow: scroll;">
                        <div id="contentcenter">
                            <div class="loginBoxx">
                                <fieldset style="border-radius: 25px; background-color: #e2e6fe; height: auto; width: auto;">
                                    <div id="customers">
                                        <table style="background-color: #e2e6fe; color: #fffbfb; width: 570px;" height="270" border="0">
                                            <caption>
                                                <marquee behavior="scroll" direction="left" bgcolor="#147d98" scrollamount="2" height="20">Medical History Questionnaires</marquee>
                                            </caption>
                                            <tr>
                                                <td>
                                                    <table width="600px" style="background-color: #e2e6fe; color: #0d0000;" border="1">
                                                        <?php
                                                        $number = 0;
                                                        // Fetch questionaries from the database
                                                        $sql = "SELECT * FROM quetionaries";
                                                        $result = mysqli_query($con, $sql); 

                                                        if ($result && mysqli_num_rows($result) > 0) {
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                $qid = $row["NO"];
                                                                $question = $row["Quetion"];
                                                                $option1 = $row["Option1"];
                                                                $option2 = $row["Option2"];
                                                                $number++;
                                                        ?>
                                                        <form action="answer.php" method="post">
                                                            <tr>
                                                                <td><?php echo $number; ?>.</td>
                                                                <td width="400"><?php echo $question; ?></td>
                                                                <td><input type="radio" name="<?php echo $qid; ?>" value="YES" /> <?php echo $option1; ?></td>
                                                                <td><input type="radio" name="<?php echo $qid; ?>" value="NO" /> <?php echo $option2; ?></td>
                                                            </tr>
                                                        <?php
                                                            }
                                                        ?>
                                                        <tr>
                                                            <td></td>
                                                            <td><input type="submit" name="Submit" value="Submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="reset" name="reset" value="Cancel" />
                                                            </td>
                                                            <td colspan="2"></td>
                                                        </tr>
                                                        </form>
                                                        </table>
                                                        <?php
                                                        } else {
                                                            echo "No questionnaires found.";
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                        </table>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="sideright"></td>
            </tr>
        </table>
    </div>
</div>

<?php
} else {
    header("location:Index.php");
}
?>

</body>
</html>
