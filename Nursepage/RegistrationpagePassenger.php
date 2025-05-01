<?php
session_start();

// if(!isset($_POST['UserName']))
// {
// header('location:../html/Loginpage.php');
// }
// $username=$_SESSION['username'];
$connection=new mysqli("localhost","root","","Bus_Ticket_System");
if(isset($_POST["fullname1"] ,$_POST["phone1"], $_POST["address1"] , $_POST["age1"],$_POST["birr1"], $_POST["sex1"] )){

$fullname=$_POST["fullname1"];
$phone=$_POST["phone1"];
$age=$_POST["age1"];
$birr=$_POST["birr1"];
$address=$_POST["address1"];
$sex=$_POST["sex1"];

$username=uniqid($fullname,);
$password=uniqid("PASS",);

$fixed = '1000';

$accountNo = $fixed.mt_rand( 100000000, 999999999);
$md5=md5($password);
       if(!$connection)
   {
       echo "not connected";
   }
   else{
    $isinserted=false;
    $passengerInfo="insert into PassnegerTable values ('$username','$fullname','$phone','$address','$age','$sex')";  
    $passengerAccount="insert into AccountPassenger values('$username','$md5')";  
    $passengerbirr="insert into BirrPassenger values('$username','$birr','$accountNo')";  
    
    $resultinfo=mysqli_query($connection,$passengerInfo);
    $resultaccount=mysqli_query($connection,$passengerAccount);
    $resultbirr=mysqli_query($connection,$passengerbirr);
    if($resultbirr)
    {
        // echo 1;   
        echo  "Dear!  ".$fullname. "  Your UserName and Password is ". $username .' and  '.$password." Respectivly";
        $isinserted = true;  
    }
     if(!$isinserted)
     {
        echo  "Dear!  ".$fullname. "  You can not Registered successfully ";
     }
   }
}
?>
<!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title> well come to our System </title>
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/font-awesome.min.css">
     <link rel="stylesheet" href="../font_awesome/css/all.css">
    <link rel="stylesheet" href="../css/Regstrationpage.css">
    <script src="../CodeSeven-toastr-50092cc/build/toastr.min.js"></script>
<link rel="stylesheet" href="../CodeSeven-toastr-50092cc/build/toastr.min.css">

    <script src="../jquary/jquery.js"></script>

   <style>
   #fullname1,#age1,#address1,#phone1,#birr1,#sex1
   {
     height: 27px;
     font-size:10px;
     margin-top: 12px;
     border-color:#388ed1; 
     text-align:center;
     border-top-style:none;
     border-left-style:none;
     border-right-style:none; 
     margin-left: 10px; 
     font-size:10px;
     color:black;
     font-weight: bold;
   }
   .col-form-label{
       font-size:13px;
       color:#388ed1;
   }
   h3{
    color:#388ed1;
    font-weight:bold; 
    text-shadow:0px 0px 1px black;
    font-family:abel;
    margin-top:10px;
    font-size:15px;
  }

  .col-lg-6
{
 
   margin: auto;
  -webkit-box-shadow: 0 0 1px rgb(139, 126, 126);
  box-shadow: 0 0 1px rgb(158, 146, 146);
  background-color: whitesmoke; 
        
  }
  </style>
</head>
<body bgcolor="white">
    <!-- <form action="RegistrationpagePassenger.php" method="POST"> -->
<nav class="navbar navbar-expand-md navbar-light fixed-top bg- py-4" style="background:#388ed1 ;box-shadow: 2px 2px 2px black" > 
<center><span style="color:white;padding-left:520px;font-size:16px;;padding-right:5px;margin-top:80px;font-weight:bold;font-family:abel;text-transform:uppercase">REGISTRATION</span></center>

</nav>

<div class="container" style="background-color:  white;margin-top:50px">
<div class="py-5 text-center"><h3>Well Come To Registration Page</h3></div>
<center><h5 id="username"></h5></center>
        <div class="offset">
            <div class="row" style="background-color: white">
            
                <div class="col-lg-6" style="background-color:white;margin:auto;margin-top:-30px">
                <center><div class="first" style="width: 20%;height: 2px;display: inline-block;background-color: #388ed1"></div>
                <span style="color:#388ed1;padding-left:10px;padding-right:5px;font-weight:bold;font-family:abel;">Create Account</span>
                
                <div class="second" style="width: 20%;height: 2px;display: inline-block;background-color: #388ed1;"></div><br><br></center>
                <div class="offset-2">

        <div class="form-group row">
            <label for="inputEmail"  class="col-sm-2 col-form-label">FullName</label>
            <div class="col-sm-6">
                <input type="text" name="" class="form-control" id="fullname1" placeholder="enter your full name">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Phone<abbr title="Number ">No.</abbr></label>
        <div class="col-sm-6">
            <input type="text" name="" class="form-control" id="phone1" placeholder="enter your phone number" >
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-6">
                <input type="text" name="" class="form-control" id="address1" placeholder="enter your address">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Age</label>
            <div class="col-sm-6">
                <input type="text" name="" class="form-control" id="age1" placeholder="enter your age" >
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Birr</label>
            <div class="col-sm-6">
                <input type="text" name="" class="form-control" id="birr1" placeholder="enter your birr" >
            </div>
        </div>
<div class="form-group row">
 <div class="form-check form-check-inline">
 <label for="inputEmail" class="col-sm-7 col-form-label">Gendor</label>
  <input class="form-check-input col-sm-2" type="radio" name="gender" value="Male"/><label for="">Male</label>
  </div>
<div class="form-check form-check-inline">
  <input class="form-check-input col-sm-8" type="radio" name="gender"  value="Female"/><label for=""> Female</label>
</div>
</div>
       
<div class="col-lg-">
    <input type="button" name="" class="col-lg-12 form-control offset- btn-primary" id="register" style="font-weight:bold;color:white;font-weight:bold;font-family:abel;text-transform:uppercase" value="Register">
               </div>
               <div class="form-group row" style="margin-top: 0px;">
           <a class="offset-9" href="../html/Loginpage.php" style="color:#388ed1;padding-left:10px;padding-right:5px;font-weight:bold;font-family:abel;font-weight:bold;color:#388ed1;font-weight:bold;font-family:abel;text-transform:uppercase">Sign In</a>
           </div>
    <center><h6 id="msgpass1" style="color:green; font-weight:bold;font-family:abel;font-size:8px;text-shadow:0px 0px 1px red"></h6>
    <span style="color:#388ed1;padding-left:10px;padding-right:5px;font-weight:bold;font-family:abel;" id="account"></span></center>
        </div>

        </div>
        
         <br>
        </div>
         </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-md navbar-light fixed-bottom py-3" style="background:#388ed1">
         <div class="navbar-nav ml-auto">
            </div>
            </nav>
<script>
 $(document).ready(function(){
       $('#register').click(function() {

         var fullname1 = $("#fullname1").val();
         var phone1 = $("#phone1").val();
         var age1 = $("#age1").val();
         var address1 = $("#address1").val();
         var birr1 = $("#birr1").val();
         var sex1 = $("input[name='gender']:checked").val();


         var fullnamevalidate = /^[a-zA-Z\s]+$/; 
         var phonevalidate= /^[0-9]+$/; 
         var phoneno = /^\d{10}$/;
         var sexvalidate= /^[a-zA-Z\s]+$/; 
         var agevalidate= /^[1-9]+$/; 
         var agelength = /^\d{2}$/;
         var validateaddress= /^[a-zA-Z\s]+$/; 
         var birrvalidate= /^[0-9]+$/;


 if($.trim(fullname1).length == 0 || $.trim(phone1).length == 0 || $.trim(address1).length == 0 || $.trim(age1).length == 0 || $.trim(birr1).length == 0 || $.trim(sex1).length == 0 ){
      $("#msgpass1").html("Fill all fileds");
      $("#msgpass1").css("color","red");
 }
else if(!fullname1.match(fullnamevalidate)){
    $("#msgpass1").html("Please enter valid Name");
    $("#msgpass1").css("color","red");
}
else if( phone1.charAt(0) != 0 ) 
{ 
    $("#msgpass1").html("Please enter valid phone");
    $("#msgpass1").css("color","red");
} 
else if( phone1.charAt(1) !=9)
{ 
    $("#msgpass1").html("Please enter valid phone");
    $("#msgpass1").css("color","red");
} 
else if(!phone1.match(phoneno))
{ 
    $("#msgpass1").html("Please enter valid phone");
    $("#msgpass1").css("color","red");
} 
else if(!phone1.match(phonevalidate))
{ 
    $("#msgpass1").html("Please enter valid phone");
    $("#msgpass1").css("color","red");
} 
 else if(!address1.match(validateaddress))
{ 
    $("#msgpass1").html("Please enter valid address");
    $("#msgpass1").css("color","red");
}  
else if(!age1.match(agevalidate))
{
    $("#msgpass1").html("Please enter valid age");
    $("#msgpass1").css("color","red");
}  
else if(!age1.match(agelength)){
    $("#msgpass1").html("Please enter valid age");
    $("#msgpass1").css("color","red"); 
}
else if(!birr1.match(birrvalidate))
{
    $("#msgpass1").html("Please enter valid birr");
    $("#msgpass1").css("color","red");
}       
 else{
    $.ajax({  
    url: "../php/RegistrationpagePassenger.php",
    method: "POST",
    data: {fullname1:fullname1,phone1:phone1,address1:address1,age1:age1,birr1:birr1,sex1:sex1},  
    success:function(data){ 
        $("#msgpass1").html(data);
        $('#fullname1').val('');
        $('#age1').val('');
        $('#phone1').val('');
        $('#address1').val('');
        $('#birr1').val('');
        $('#sex').val('');

        if( data == 1)
          {  
            $("#msgpass1").html("successfully Registered");
          }
        if(data == 2)
           {
              $("#msgpass1").html("Not Reported");
           }
           } 
      });
    }
         
    });
     }) ;
</script>
</div>
</body>
</html>