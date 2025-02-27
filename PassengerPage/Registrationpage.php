<?php
include("../connection/connection.php");  
 ?>
 <?php
 if(isset($_POST['register']))
{
$fullname=$_POST['fullname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$gender=$_POST['gender'];
$password=uniqid();
$username="";
$type=$_POST['type'];
   
       if($type=='Passenger')
       {
        $insert="insert into Passengertable values('$fullname','$email','$address','$phone','$gender','$username','$password')";  
        $result=mysqli_query($con,$insert);
        // echo '<script>alert("An error occured !!");</script>';
        // echo 'script>document.getElementById("usernameholder").innerHTML=$username;</script>';
       }
       else
       {
        $insert="insert into Driver_Table values('$fullname','$email','$address','$phone','$gender','$username','$password')"; 
        $result=mysqli_query($connection,$insert);
       }
       
       
      
   }
?>
<!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap 4 Horizontal Form Layout</title>
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/font-awesome.min.css">
     <script src="../bootstrap/js/bootstrap.js"></script>
     <link rel="stylesheet" href="../font_awesome/css/all.css">
    <link rel="stylesheet" href="../css/Regstrationpage.css">
   <style>
  </style>
</head>
<body bgcolor="white">
    <form action="Registrationpage.php" method="POST">
<nav class="navbar navbar-expand-md navbar-light fixed-top bg- py-3 py-lg-4">
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark py-3 py-lg-4"></nav>
</nav>

<div class="container" style="background-color:  white">

<div class="py-5 text-center"><h3> Registration</h3></div>
<p id="usernameholder" style="float: right;"></p>
        <div class="offset">
            <div class="row" style="background-color: white">


                <div class="col-lg-6" style="background-color: white;margin:auto">
                <center><div class="first" style="width: 20%;height: 2px;display: inline-block;background-color: black"></div>
                <span style="color:black;padding-left:10px;padding-right:5px;font-weight:bold;font-family:abel;">Create Account</span>
                <div class="second" style="width: 20%;height: 2px;display: inline-block;background-color: black;"></div><br><br></center>
                <!-- <div class="py-5 text-center"><i class="fa fa-user"></i></div>  -->
        <div class="form-group row">
       
            <label for="inputEmail"  class="col-sm-2 col-form-label">FullName</label><br>
            <div class="col-sm-10">
                <input type="text" name="fullname" class="form-control" id="inputEmail" placeholder="enter your first name" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail"  class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="enter your email" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Phone<abbr title="Number ">No</abbr></label>
        <div class="col-sm-10">
            <input type="text" name="phone" class="form-control" id="inputEmail" placeholder="enter your phone number" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <input type="text" name="address" class="form-control" id="inputEmail" placeholder="enter your address" required>
            </div>
        </div>
<div class="form-group row">
 <div class="form-check form-check-inline">
 <label for="inputEmail" class="col-sm-7 col-form-label">Gender</label>
  <input class="form-check-input col-sm-2" type="radio" name="gender" id="inlineRadio1" value="Male"/><label for="">Male</label>
  </div>
<div class="form-check form-check-inline">
  <input class="form-check-input col-sm-8" type="radio" name="gender" id="inlineRadio2" value="Female"/><label for=""> Female</label>
</div>
</div>

<div class="form-group row offset" >
    <label for="inputEmail" class="col-sm-2 col-form-label">Type</label>
<select  id="" class="form-control" style="width: 300px;" name="type">
<option value="Driver"> Driver</option>
<option value="Passenger"> Passenger</option>
</select>

   </div>
        <div class="col-lg-">
                <input type="submit" name="register" class="col-lg-12 form-control offset- btn-primary" id="login" value="Register">
               </div>
               <br><br>
        </div>
     
        <div class="col-sm-6">
        <div class="card offset-2" style="margin-top: 30px;width: 224px;" id="card1">
            <div class="card-body">
                <h5 class="card-title">Before you Register you may aggree to our terms</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor.</p>
            </div>
        </div>
    </div>


               <br>
        </div>
         </div>
        </div>
    </div>

</div>
</form>
</body>
</html>