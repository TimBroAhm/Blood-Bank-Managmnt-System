<?php
session_start();
include("../connection/connection.php");

// Ensure that the user ID is fetched from the session
$uid = $_SESSION['uid'] ?? '';  // This fetches the user ID from the session, defaulting to an empty string if not set

$id = $_GET['id'];
$sq = mysqli_query($con, "SELECT * FROM appointment WHERE appid='$id'");
$ro = mysqli_fetch_array($sq);
$did = $ro['uid'];
$query1 = mysqli_query($con, "UPDATE appointment SET nursereject_status='yes' WHERE appid='$id'");

if ($query1) {
    ?>
    <div class="loginBoxx">
        <fieldset style="border-radius: 25px; background-color: #e2e6fe; height:400px; width: 550px; margin-left:35px;">
            <form action="nursereject.php" method="post">
                <table border="0px" bgcolor="#fff9f9" width="500px">
                    <tr>
                        <td colspan="2">
                            <h3 style="font-size:20px; text-align: center;">
                                Send Description for Appointment
                                <div style="float:right; margin-left:40px;"></div>
                            </h3>
                        </td>
                    </tr>
                    <tr>
                        <td>User ID:</td>
                        <td><input type="text" name="id" value="<?php echo htmlspecialchars($uid); ?>" readonly></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="hidden" name="uid" value="<?php echo htmlspecialchars($did); ?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td><textarea name="message" rows="5" cols="33" placeholder="Please write your description here !!!" required></textarea></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input type="submit" name="submit" size="100" value="Send" />
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="reset" class="submit" size="100" value="Reset" />
                        </td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </div>
    <?php
} else {
    echo "<div id='error'>Error updating the appointment status.</div>";
}
?>

</body>
</html>
