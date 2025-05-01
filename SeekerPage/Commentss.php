<?php
include("../connection/connection.php");
session_start();
?>
<html>
<head>
    <title>Seeker Page</title>
    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        /* Container Styling */
        #container {
            width: 100%;
            max-width: 1065px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Logo Styling */
        #container img {
            width: 100%;
            max-height: 135px;
            object-fit: contain;
        }

        /* Navigation Menu */
        #navigationmenu {
            margin: 20px 0;
            padding: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Main Content Layout */
        #content {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        /* Left Sidebar */
        #sideleft {
            width: 150px;
            background-color: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin-right: 10px;
        }

        /* Form Section */
        #contentcenter {
            width: 100%;
            max-width: 630px;
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            overflow: auto;
        }

        /* Form Box */
        .loginBoxx {
            width: 100%;
        }

        /* Fieldset Styling */
        fieldset {
            border: none;
            padding: 20px;
            background-color: #e2e6fe;
            border-radius: 15px;
        }

        /* Heading Styling */
        h2 {
            text-align: center;
            font-size: 22px;
            color: #147d98;
            margin-bottom: 20px;
        }

        /* Form Table Styling */
        table {
            width: 100%;
            margin-top: 20px;
        }

        table td {
            padding: 12px;
            text-align: left;
        }

        /* Textarea Styling */
        textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            resize: vertical;
            font-size: 16px;
        }

        /* Input Styling */
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        /* Button Styling */
        input[type="submit"] {
            background-color: #147d98;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #105f75;
        }

        /* Success/Error Message Styling */
        #Success, #error {
            color: white;
            padding: 10px;
            margin-top: 20px;
            text-align: center;
            border-radius: 5px;
        }

        #Success {
            background-color: green;
        }

        #error {
            background-color: red;
        }
    </style>
</head>
<body>

<div id="container">
    

    <div id="content">
        <table border="0" width="100%" height="500">
            <tr>
                
                <td width="300">
                    <div style="width:630px;height: 600px;margin-left:5px;border:solid 4px #dldbeg;overflow:scroll;overflow-x:scroll">
                        <div id="contentcenter">
                            <div class="loginBoxx">
                                <fieldset style="border-radius: 25px;background-color: #e2e6fe;height:540px;">
                                    <form action="" method="post">
                                        <table border="0px" bgcolor="#fff9f9" width="550px">
                                            <tr><td colspan="2"><h2>Give Your Comment Here</h2></td></tr>
                                            <tr>
                                                <td>Comment:</td>
                                                <td><textarea name="message" rows="5" cols="33" placeholder="comment here !!!" required></textarea></td>
                                            </tr>
                                            <tr>
                                                <td>Date Sent:</td>
                                                <td><input type="text" name="date" value="<?php echo date('d-m-Y'); ?>" readonly /></td>
                                            </tr>
                                            <tr><td colspan="2">&nbsp;</td></tr>
                                            <tr><td colspan="2">&nbsp;</td></tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td><input type="submit" value="Submit" name="submit">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset" /></td>
                                            </tr>
                                        </table>
                                    </form>
                                </fieldset>
                            </div>

<?php 
if(isset($_POST["submit"])){ 
    $message = $_POST["message"];
    $date = $_POST["date"];
    $unread = "yes";
    
    if($con){
        $sql = "INSERT INTO feedback VALUES ('', '$message', '$date', '$unread')";
        $inserted = mysqli_query($con, $sql);
        if($inserted)
            echo "<div id='Success'>You have sent the comment successfully!!</div>";
        else    
            echo "<div id='error'>You haven't sent the comment successfully!! " . mysqli_error($con) . "</div>";
    }
    else
        die("<div id='error'>Connection Failed!!!</div>");
}
?>

                        </div>
                    </div>
                </td>
                <td width="150"></td>
            </tr>
        </table>
    </div>

</div>

</body>
</html>
