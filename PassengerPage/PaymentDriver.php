<?php
    // $posted=$_SESSION['username'];
   
$connection=new mysqli("localhost","root","","Bus_Ticket_System");
if(isset($_POST["username1"] ,$_POST["phone1"], $_POST["fee"],$_POST["account"])){
  $username1=$_POST['username1'];
  $fee=$_POST['fee'];
  $phone1=$_POST['phone1'];
  $account=$_POST['account'];
   if(!$connection)
   {
       echo mysqli_connect_error();
   }
   else {
    // echo '<script type="text/javascript>alert("hi");</script>';
      $selectbirrDriver="SELECT * FROM BirrDriver";
      $selectbirrAdmin="SELECT * FROM AdminBirr";
      
      $resultDriver=mysqli_query($connection,$selectbirrDriver);
      $resultAdmin=mysqli_query($connection,$selectbirrAdmin);
     $ispayed=false;
      if(mysqli_num_rows($resultAdmin) == 1){
        while($row=mysqli_fetch_array($resultAdmin)){
          $adminbirr=$row['Birr'];
          $username=$row['UserName'];
          $birrminus=$adminbirr - $fee;
          $update="UPDATE AdminBirr set Birr='$birrminus'  where UserName='$username'";
          mysqli_query($connection,$update);
         
          if(mysqli_num_rows($resultDriver) > 0){
            while($row=mysqli_fetch_array($resultDriver)){
               $driverusername=$row['UserName'];
               $driverbirr=$row['Birr'];
               if($driverusername == $username1){
                $driveradd=$driverbirr + $fee;
                $updatedriver="UPDATE BirrDriver set Birr='$driveradd' where UserName='$driverusername'";  
               if(mysqli_query($connection,$updatedriver)){
               $ispayed=true;
                  echo 1;
               
               }
              }
             }
          }
        }
        if(!$ispayed)
        {
          echo 2;
        }
      }

    }
  }
?>