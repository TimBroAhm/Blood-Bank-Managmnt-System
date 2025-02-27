<?php
session_start();
// $username1=$_SESSION['backusername'];
// $back=$_SESSION['back'];
// $backadmin=$_SESSION['usernameadmin'];
$connection=new mysqli("localhost","root","","Bus_Ticket_System");
$username=$_POST['id'];

$deletepass="DELETE from PassnegerTable where UserName='$username'";
$reslut1=mysqli_query($connection,$deletepass);
if($reslut1)
{
  // $selectbirrpassenger="SELECT * FROM BirrPassenger";
  // $selectbirrAdmin="SELECT * FROM AdminBirr";
  // $resultPassenger=mysqli_query($connection,$selectbirrpassenger);
  // $resultAdmin=mysqli_query($connection,$selectbirrAdmin); 

  // if(mysqli_num_rows($resultPassenger) > 0){
  //   while($row=mysqli_fetch_array($resultPassenger)){
  //     $passbirr=$row['Birr'];
  //     $operation1=$passbirr + $back;
  //     $resultp="UPDATE PassnegerTable SET Birr = '$operation1' where UserName='$username1'";
  //     mysqli_query($connection,$resultp);

  //     if(mysqli_num_rows($resultAdmin) > 0){
  //       while($row=mysqli_fetch_array($resultAdmin)){
  //         $adminbirr=$row['Birr'];
  //         $operation2=$adminbirr - $back;
  //         $resultp="UPDATE AdminTable SET Birr = '$operation2' where UserName='$backadmin'";
  //         mysqli_query($connection,$resultp);
  //         echo 1;
  //       }
  //     }
  //   }
  // }

  // $resultp="UPDATE PassnegerTable SET Birr = '$operation1' where UserName='$username1'";
  // $resulta="UPDATE AdmiTable SET Birr = '$back' where UserName='$username1'";

  // $selectbirrpassenger="SELECT * FROM BirrPassenger";
  // $selectbirrAdmin="SELECT * FROM AdminBirr";
  
  // $resultPassenger=mysqli_query($connection,$selectbirrpassenger);
  // $resultAdmin=mysqli_query($connection,$selectbirrAdmin);  

   
  echo 1;

}
else {
  echo 0;
}
?>