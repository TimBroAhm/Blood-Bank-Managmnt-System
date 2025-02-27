<?php
    // $posted=$_SESSION['username'];
session_start();
$connection=new mysqli("localhost","root","","Bus_Ticket_System");
if(isset($_POST["username"] ,$_POST["start"], $_POST["end"],$_POST["seatno"] ,$_POST["sideno"], $_POST["price"], $_POST["accountno"] ,$_POST["date"],$_POST["phone"])){
  $username=$_POST['username'];
  $start=$_POST['start'];
  $destination=$_POST['end'];
  $seatno=$_POST['seatno'];
  $date=$_POST['date'];
  $price=$_POST['price'];
  $sideno=$_POST['sideno'];
  $accountno=$_POST['accountno'];
  $phone=$_POST['phone'];
  $_SESSION['back']=$price;
  $_SESSION['backusername']=$username;
   if(!$connection)
   {
       echo mysqli_connect_error();
   }
   else {
     $route="select * from RouteDetail";
     $res=mysqli_query($connection,$route);
     if(mysqli_num_rows($res)>0){
      while($row=mysqli_fetch_assoc($res)){
          $start1=$row['Start'];
          $end=$row['Destination'];
          $depprice=$row['DepPrice'];
          $sno=$row['SideNo'];
      if($start1 == $start && $end==$destination && $depprice==$price && $sno==$sideno){

      $selectAddbus="SELECT * FROM AddBuss";
      $selectRoute="SELECT * FROM RouteDetail";
      $select="select * from Booking";

      $resultAddbus=mysqli_query($connection,$selectAddbus);
      $resultRoute=mysqli_query($connection,$selectRoute);
      $booking=mysqli_query($connection,$select);
     
      if(mysqli_num_rows($booking) ==0){
        $insertInfo="insert into Booking values('$username','$start','$destination','$seatno','$sideno','$price','$accountno','$date','$phone')";
          if (mysqli_query($connection,$insertInfo)) {
           $passengerminus=$passengerbirr - $price;
           $updatepassenger="UPDATE BirrPassenger set Birr='$passengerminus' where UserName='$passengerusername'";  
           echo 1;
          }
      }
      else {
          $counter=0;
          $isfound1=false;
          $isfound2=false;
        while($row=mysqli_fetch_assoc($resultAddbus))  {
             $sidenobus=$row['SideNo'];
             $seatnobus=$row['SeatNo'];
             $counter++;
          if($sidenobus==$sideno) {
              $i=0;
              
              
            while($i < $seatnobus) {
              $i++;
                $select="select * from Booking";
                $result=mysqli_query($connection,$select);
                if(mysqli_num_rows($result) > 0){
                  while($row=mysqli_fetch_assoc($result)){
                    $seatsingle=$row['SeatNo'];

                    if($seatsingle != $seatno && $seatno >0 && $seatnobus >= $seatno ){
                      $selectpassenger="SELECT * FROM BirrPassenger";
                      $resultpassenger=mysqli_query($connection,$selectpassenger);
                      if(mysqli_num_rows($resultpassenger) > 0){
                        while($row=mysqli_fetch_assoc($resultpassenger)){

                          $passengerbirr=$row['Birr'];
                          $passengerusername=$row['UserName'];
                          if($passengerusername==$username && $passengerbirr >= $price){
                          $insertInfo="insert into Booking values('$username','$start','$destination','$seatno','$sideno','$price','$accountno','$date','$phone')";
                          if (mysqli_query($connection,$insertInfo)) {
                           $passengerminus=$passengerbirr - $price;
                           $updatepassenger="UPDATE BirrPassenger set Birr='$passengerminus' where UserName='$passengerusername'";  
                           mysqli_query($connection,$updatepassenger);
                           
                           $selectadmin="SELECT * FROM AdminBirr";
                           $resultadmin=mysqli_query($connection,$selectadmin);
                           if(mysqli_num_rows($resultadmin) > 0){
                            while($row=mysqli_fetch_assoc($resultadmin)){
                              $isfound1=true;
                              $adminbirr=$row['Birr'];
                              $adminusername=$row['UserName'];
                              $adminminus=$adminbirr + $price;
                              $updateadmin="UPDATE AdminBirr set Birr='$adminminus' where UserName='$adminusername'";  
                              mysqli_query($connection,$updateadmin);
                              echo 1;
                            }
                          }

                          }
                         
                         }
                        }
                        }
                      }
                    }
                  }
                 
                }                  
              }
          }
        }
      }
    }
  }
          if(!$isfound1)
          {
            echo 2;
          }
       }
}
?>