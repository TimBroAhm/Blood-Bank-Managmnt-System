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
                        
                        <th sort="date"><span class="style7">Association ID</span></th>
                        <th sort="description"><span class="style7">Association Name</span></th>
                    
                   
                        <th sort="date"><span class="style7">Formed Date</span></th>
                       
						<th sort="description"><span class="style7">Phone Number</span></th>
						
                        <th sort="description"><span class="style7">Manager Name</span></th>
						<th sort="description"><span class="style7">Level</span></th>
                </tr>
        </thead>
        </tbody>
		
                <?php
	include("connection/connection.php");  
     session_start();		
				
			$result=mysqli_query($con,"SELECT * FROM association ");
			
			while($test = mysqli_fetch_array($result))
			{
					echo"<td><font color='black'>". $test['ASSOCIATION_ID']. "</font></td>";
                                echo"<td><font color='black'>". $test['ASSOCIATION_NAME']."</font></td>";
								echo"<td><font color='black'>". $test['FORMED_DATE']."</font></td>";
				                echo"<td><font color='black'>". $test['PHONE_NO']."</font></td>";
								echo"<td><font color='black'>". $test['MANGER_NAME']."</font></td>";
								echo"<td><font color='black'>". $test['LEVEL']."</font></td>";	
				
	      
				
				
                               
                                			
				echo "</tr>";
			}
			mysqli_close($con);

			?>
</table>
</div>
</body>
</html>