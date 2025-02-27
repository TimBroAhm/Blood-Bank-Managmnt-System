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
<style>
.tt table{
	margin-left:45px;
}
</style>
</head>
<body>
<div class="tt">
<table id="demoTable" style="border: 2px solid #ccc;" cellspacing="0" width="700" bgcolor="#FFFFFF">
        <thead >
                <tr>
                        <th sort="date"><span class="style7">User_ID</span></th>
                        <th sort="date"><span class="style7">UserName</span></th>
                        <th sort="description"><span class="style7">Password</span></th>
                    
                        <th sort="description"><span class="style7">Role</span></th>
                        <th sort="date"><span class="style7">Email</span></th>
                        <th sort="date"><span class="style7">status</span></th>
						<th sort="description"><span class="style7">Edit</span></th>
						
                        
						
                </tr>
        </thead>
       
		
                <?php		
				
			$result=mysqli_query($con,"SELECT * FROM Account");
			
			while($test = mysqli_fetch_array($result))
			{
				$id = $test['USER_ID'];	
				echo "<tr align='center'>";	
				
	           echo"<td><font color='black'>". $test['USER_ID']. "</font></td>";
				echo"<td><font color='black'>". $test['USER_NAME']. "</font></td>";
				echo"<td><font color='black'>". $test['PASSWORD']. "</font></td>";
                               
                                echo"<td><font color='black'>". $test['ROLE']. "</font></td>";
                                echo"<td><font color='black'>". $test['EMAIL']."</font></td>";
								echo"<td><font color='black'>". $test['STATUS']."</font></td>";
				
				echo"<td> <a href ='updateform.php?USER_ID=$id'>Edit</a>";								
				echo "</tr>";
			}
			mysqli_close($con);

			?>
</table>
</div>
</body>
</html>