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
                        
                        <th sort="date"><span class="style7">UserName</span></th>
                        <th sort="description"><span class="style7">Password</span></th>
                    
                   
                        <th sort="date"><span class="style7">Email</span></th>
                       
						<th sort="description"><span class="style7">Edit</span></th>
						
                        
						
                </tr>
        </thead>
        </tbody>
		
                <?php
	include("connection/connection.php");  
     session_start();
	$r=$_SESSION['USER_ID'];		
				
			$result=mysqli_query($con,"SELECT USER_ID,USER_NAME,PASSWORD,EMAIL FROM Account where USER_ID='$r'");
			
			while($test = mysqli_fetch_array($result))
			{
				$id = $test['USER_ID'];	
				echo "<tr align='center'>";	
				
	      
				echo"<td><font color='black'>". $test['USER_NAME']. "</font></td>";
				echo"<td><font color='black'>". $test['PASSWORD']. "</font></td>";
                               
                        
                                echo"<td><font color='black'>". $test['EMAIL']."</font></td>";
								
				
				echo"<td> <a href ='indivualupdateform.php?USER_ID=$id'>Edit</a>";								
				echo "</tr>";
			}
			mysqli_close($con);

			?>
</table>
</div>
</body>
</html>