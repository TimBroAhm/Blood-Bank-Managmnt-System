<?php
include("../connection/connection.php");  
 session_start();
if(isset($_SESSION['USER_ID']))
 {
  $mail=$_SESSION['USER_ID'];
 } else {
 ?>

<script>
  alert('You are not logged In !! Please Login to access this page');
  alert(window.location='../login.php');
 </script>
 <?php
 }
 ?>


<html>
<head>
    <title></title>
    <link href="mystyles.css" rel="stylesheet" type="text/css"/>
</head>
<body bgcolor="#B0C4DE">
<center>
    <div id="divWrapper">
        <table>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td>
                    <div id="divSideContentLeft"></div>
                </td>
                <td>
                    <br /><br />
                    <div id="divContentCenter">
                        <?php
                        function restoreDatabaseTables($dbHost, $dbUsername, $dbPassword, $dbName, $filePath) {
                            $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

                            if ($db->connect_error) {
                                return "Connection failed: " . $db->connect_error;
                            }

                            // Check if the file exists
                            if (!file_exists($filePath)) {
                                return "SQL file not found: " . $filePath;
                            }

                            // Read the SQL file
                            $sql = file_get_contents($filePath);

                            // Execute each SQL query
                            $queries = explode(";", $sql);
                            foreach ($queries as $query) {
                                $query = trim($query);
                                if (!empty($query)) {
                                    if (!$db->query($query)) {
                                        return "Error executing query: " . $query . " - " . $db->error;
                                    }
                                }
                            }

                            $db->close();
                            return true; 
                        }

                        $domain = "localhost";
                        $dbuser = "root";
                        $dbpass = "";
                        $dbname = "tms";

                        $filePath = 'C:/wamp64/www/tras/DB/tms.sql'; 

                        $restore = restoreDatabaseTables($domain, $dbuser, $dbpass, $dbname, $filePath);

                        if ($restore === true) {
                            echo "<br>Database is successfully restored";
                        } else {
                            echo "<br>Database restoration failed: " . $restore; 
                        }
                        ?>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</center>

</body>
</html>