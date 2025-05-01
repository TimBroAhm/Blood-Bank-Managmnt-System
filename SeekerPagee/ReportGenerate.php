<?php
session_start();
include"../connection/connection.php";          
		  $sql = "SELECT * FROM  schedule ";
            if (isset($_POST['search'])) {
             $search_term = mysqli_real_escape_string($con,$_POST['search_box']);
             $sql .= "WHERE BORD_NUMBER = '{$search_term}' ";
            }
            $query = mysqli_query($con,$sql) or die(mysqli_error());
            ?>
            <form name="search_form" method="POST" action="ReportGenerate.php">
			<div align="right">
	 <input type="text" name="search_box"placeholder="Please Enter Bord Number " value=""required="required"/>
            <input type="submit" name="search" value="Search ...">
	<input type="button" name="" value="Print Report" onclick="Clickheretoprint()">
</div></br>
<style>
.content{
width:699px;
margin-left:55px;
height:500px;
}
</style>
<div class="content"align="center" style="background: white;height:auto; border: 1px solid black;" id="print_content">
<br><br>
<label style="color: black; font-size: 24px;"><i><u>Operator Schedule </u></i></label>
            </form>
            <table width="80%" cellpadding="6" border="1px">
            <tr>
               
                <td><strong>Oprator ID</strong></td>
				 <td><strong>Bord Number</strong></td>
				 <td width="58px"><strong>Level</strong></td>
				<td width="85px"><strong>From</strong></td>
                <td width="98px" ><strong>To</strong></td>
                <td><strong>Tariff</strong></td>
            </tr>
            <?php 
			if(mysqli_num_rows($query)>0)
			{
			while ($row = mysqli_fetch_array($query)) {?>
            <tr>
			  <td><?php echo $row['REQ_ID'];?></td>
               <td><?php echo $row['BORD_NUMBER'];?></td>
                <td><?php echo $row['LEVEL'];?></td>
				<td><?php echo $row['INITIAL_PLACE'];?></td>
                <td><?php echo $row['DESTINATION_PLACE'];?></td>
                <td><?php echo $row['TARIFF'];?></td>
            </tr>
            <?php 
			}
			}
      else echo "no such data";			
			?>
            </table>
					<div align="center" style="font-size: 20px;">
	<div>Generate By:<?php echo "&nbsp;&nbsp;<u>$_SESSION[USER_NAME]</u>"?></div>
	<div>Sign: _____________</div>
</div>
			</div>
	
			<script language="javascript">
	function Clickheretoprint()
		{ 
		    var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
		      disp_setting+="scrollbars=yes,width=600, height=350, left=320, top=250"; 
		    var content_vlue = document.getElementById("print_content").innerHTML; 
		  
		    var docprint=window.open("","",disp_setting); 
		    docprint.document.open(); 
		    docprint.document.write('<html><head><title>Schedule Report</title>'); 
		    docprint.document.write('</head><body onLoad="self.print()" style="width: 600px; font-size:12px; font-family:arial;">');          
		    docprint.document.write(content_vlue);          
		    docprint.document.write('</body></html>'); 
		    docprint.document.close(); 
		    docprint.focus(); 
		}
</script>