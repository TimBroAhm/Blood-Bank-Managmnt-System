<html>
<head>
<meta charset="utf-8">
<title>Login form</title>
<link rel="stylesheet"
type="text/css"
href="style.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script src="js/jquery-3.3.1.js" type="text/javascript"></script>
 <script src="js/login.js" type="text/javascript"></script>
 <style type="text/css">
#unameerror{
color:red;
margin-left:145px;
font-size:17px;
}
#passError{
	color:red;
	margin-left:145px;
	font-size:17px;
}
</style>
<?php include'Language/lang.php';?>
<meta charset="utf-8">
</head>
<body bgcolor="#bbb">
<div class="loginBox">
 <div class="glass">
   <img src="images/2.png" class="user">
   <form action="login.php" method="post" onSubmit = "return validate()" name="myform"target="_top" id="userlog">
   <div class="inputBox">
   <input type="text"name="uname"autocomplete="off"placeholder="<?php echo htmlspecialchars($lang['username']);?>"id="uname"> <!--autocomplete="off"-->
   <span><i class="fa fa-user" aria-hidden="true" id="unameerror"></i></span>
   </div>
      <div class="inputBox">
   <input type="password"name="upassword"placeholder="<?php echo htmlspecialchars($lang['pass']);?>"id="password">
   <span><i class="fa fa-user" aria-hidden="true"id="passError"></i></span>
   </div>
   <input type="submit"name="login"value="<?php echo htmlspecialchars($lang['log']);?>">
   <a href="forgetpassword.php"target="myframe"style="color:white;padding-left:5px;padding-right:5px;font-weight:bold;font-family:abel;font-weight:bold;color:black;font-weight:bold;font-family:abel;"><center><?php echo htmlspecialchars($lang['ff']);?></center></a>
   
   </form>
   </div>
   </div>
</body>
</html> 

<?php
session_start();
include 'connection/connection.php';
if (isset($_POST['login'])) {
    $username = $_POST['uname'];
   $password = $_POST['upassword'];
  // $pas = base64_encode($password);
    $query = mysqli_query($con,"SELECT *FROM Account where USER_NAME='$username' and PASSWORD='$password'");
    if (!$query) {
        echo mysql_error();
    }
    if (mysqli_num_rows($query) > 0) {
        $activate = mysqli_query($con,"select *from Account where USER_NAME='$username' &&STATUS='0'");
        if (mysqli_num_rows($activate) > 0) {
            $result = mysqli_query($con,"SELECT * FROM Account WHERE USER_NAME='$username' &&PASSWORD='$password'");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $_SESSION['USER_NAME'] = $username;
                    $_SESSION['ROLE'] = $row['ROLE'];
                    $_SESSION['USER_ID'] = $row['USER_ID'];
					//$_SESSION['last_time'] = time();
					$_SESSION['start']=time();
	                $_SESSION['expire']=$_SESSION['start']+(4*60);
                    if ($row['ROLE'] == 'sysadmin') {
                  
					 echo "<script>window.location='Admin/Adminpage.php';</script>";
                    } 
					
					else if
					($row['ROLE'] == 'BBmanager') {
                     header("Location:BBmanagerPage/BBmanagerPage.php");
                    } 
					else if ($row['ROLE'] == 'Donor') {
                        header("Location:DonorPage/DonorPage.php");
                    }
					else if ($row['ROLE'] == 'Employee') {
                        header("Location:Employee/Employeepage.php");
                    }
					else if ($row['ROLE'] == 'Seeker') {
                        header("Location:SeekerPage/SeekerPage.php");
                    }
					else if ($row['ROLE'] == 'Labtecn') {
                        header("Location:Labtecpage/Labtecpage.php");
                    }
					
					
					else if ($row['ROLE'] == 'Nurse') {
                        header("Location:Nursepage/Nursepage.php");
                    }
                }
            }
                    else {
	                 echo '<script type="text/javascript">alert("You are entered incorrect password!");window:location=\'index.php\';</script>';
                   }			
        } 
		else {
            echo '<script type="text/javascript"> alert("Sorry Your Account is Deactivated Contact With Adminstrator!");window:location=\'index.php\';</script>';
              }
    } 
	else {
        echo '<script type="text/javascript"> alert("user name not exist!");window:location=\'index.php\';</script>';
    }
}
mysqli_close($con);
?>