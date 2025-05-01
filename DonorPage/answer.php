<?php
session_start();
include("../connection/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeekerPage</title>
    <link rel="stylesheet" type="text/css" href="setting.css">
    <link rel="stylesheet" href="stylesLogin.css">
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }

        #container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        header {
            background-color: #147d98;
            padding: 15px;
            text-align: center;
        }

        header img {
            max-width: 100%;
            height: auto;
        }

        /* Content Container */
        #content {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .side {
            flex: 0 0 150px;
        }

        .main-content {
            flex: 1;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .main-content h2 {
            text-align: center;
            font-size: 24px;
            color: #1c2b36;
        }

        .loginBoxx {
            margin-top: 20px;
        }

        fieldset {
            border: none;
            background-color: #e2e6fe;
            border-radius: 15px;
            padding: 20px;
        }

        table {
            width: 100%;
            margin-top: 20px;
        }

        table caption {
            font-size: 18px;
            font-weight: bold;
            color: #147d98;
            margin-bottom: 10px;
        }

        table td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        input[type="submit"], input[type="reset"] {
            background-color: #147d98;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #105c72;
        }

        marquee {
            color: white;
            font-size: 18px;
        }

        @media screen and (max-width: 768px) {
            #content {
                flex-direction: column;
                padding: 10px;
            }

            .side {
                display: none;
            }

            .main-content {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<?php
if (isset($_SESSION['USER_NAME'])) {
    $uid = $_SESSION['USER_ID'];
?>

<header>
    <img src="Images/logoo.jpg" alt="Logo" width="1065" height="135">
</header>

<div id="container">
    <div id="content">
        <div class="side"></div>
        <div class="main-content">
            <div class="loginBoxx">
                <fieldset>
                    <form action="" method="post">
                        <table>
                            <caption>
                                <marquee behavior="scroll" direction="left" bgcolor="#147d98" scrollamount="1" height="20">
                                    MEDICAL HISTORY QUESTIONNAIRES
                                </marquee>
                            </caption>
                            <tr>
                                <td>
                                    <table style="background-color: #e2e6fe; color: #0d0000;">
                                        <?php
                                        // Use mysqli_query instead of mysql_query
                                        $sq = "SELECT * FROM quetionaries";
                                        $result = mysqli_query($con, $sq); // Use mysqli_query here

                                        $Wronganswer = 0;
                                        $Correctanswer = 0;
                                        $total = mysqli_num_rows($result); // Use mysqli_num_rows here

                                        // Check if any records are returned
                                        if ($total > 0) {
                                            while ($row = mysqli_fetch_array($result)) { // Use mysqli_fetch_array here
                                                $Ans = $row["correct"];
                                                $qid = $row["NO"];
                                                $selected = $_POST[$qid]; // Get selected answer
                                                if ($selected == $Ans) {
                                                    $Correctanswer++;
                                                } else {
                                                    $Wronganswer++;
                                                }
                                            }

                                            // Redirect to the Donor appointment page if all answers are correct
                                            if ($Correctanswer == $total) {
                                                header('Location: Donorappointment.php');
                                            } else {
                                                // Display an alert and redirect back to the questionnaire page
                                                echo '<script type="text/javascript">
                                                        alert("Sorry!!Dear:- Customer You are Not Well Today. Try again at another time. Thank you for your participation!");
                                                        window.location="Questionaries.php";
                                                      </script>';
                                            }
                                        } else {
                                            echo "No questions available";
                                        }
                                        ?>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </form>
                </fieldset>
            </div>
        </div>
        <div class="side"></div>
    </div>
</div>

<?php
} else {
    header("location:Index.php");
}
?>

</body>
</html>
