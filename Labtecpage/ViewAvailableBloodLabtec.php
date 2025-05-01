<?php
session_start();
include("../connection/connection.php");
?>
<html>
<head>
<title>Available Blood</title>
<link rel="stylesheet" type="text/css" href="setting.css">
<link rel="stylesheet" href="stylesLogin.css">
<link rel="stylesheet" type="text/css" href="Setting11.css">
</head>
<body>

<div id="container">


	<div id="navigationmenu"></div>

	<div id="content">
		<table border="0" width="100%" height="500">
			<tr>
				<td width="150"></td>
				<td width="300">
					<div style="width:660px; height:600px; border:solid 4px #dldbeg; overflow:auto;">
						<div id="contentcenter">
							<div class="loginBoxx">
								<fieldset style="border-radius: 25px; background-color: #e2e6fe; color:#147d98; width:580px; margin:auto;">
									<div id="customers">
										<?php
										if ($con) {
											$sql = "SELECT * FROM blood WHERE bstatus='Available'";
											$recordfound = mysqli_query($con, $sql);

											if (mysqli_num_rows($recordfound) > 0) {
												echo "<h2 align='center'>The Available Bloods In Our Stock</h2>";
												echo "<table border='1' align='center' cellpadding='8'>
														<tr>
															<th>Blood ID</th>
															<th>Blood Group</th>
															<th>Pack No</th>
															<th>Register Date</th>
															<th>Expired Date</th>
															<th>Quantity</th>
															<th>Blood Status</th>
														</tr>";

												while ($row = mysqli_fetch_assoc($recordfound)) {
													echo "<tr>
															<td>{$row['bid']}</td>
															<td>{$row['bg']}</td>
															<td>{$row['packno']}</td>
															<td>{$row['rdate']}</td>
															<td>{$row['edate']}</td>
															<td>{$row['bqty']}</td>";

													if ($row['bstatus'] == "Available")
														echo "<td class='Available'>{$row['bstatus']}</td>";
													elseif ($row['bstatus'] == "Expaired")
														echo "<td class='Expaired'>{$row['bstatus']}</td>";

													echo "</tr>";
												}
												echo "</table>";
											} else {
												echo "<div id='error'>Sorry, no records found!</div>";
											}
										} else {
											echo "<div id='error'>Sorry!! Connection failed!</div>";
										}
										?>
										<?php include("Print.php"); ?>
									</div>
								</fieldset>
							</div>
						</div>
					</div>
				</td>
				<td width="150"></td>
			</tr>
		</table>
	</div>
</div>

</body>
</html>
