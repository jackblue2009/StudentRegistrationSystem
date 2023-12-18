<?php
	session_start();
	include ('partials/connectDb.php');
	if (!isset($_SESSION['staff_id'])) {
		header ('Location:staff-login.php');
		exit();
	} else {
		$id = $_SESSION['staff_id'];
		
		$query = mysqli_query($conn, "SELECT * FROM staff_table WHERE staff_id = '$id';");
		$row = mysqli_fetch_array($query);
		
		$staffname = $row['staff_username'];
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Applied Studies</title>
		<link rel="stylesheet" type="text/css" href="styles/main.css" />
		<style type="text/css">
			#content {
				width: 750px;
				height: 1450px;
				padding-top: 15px;
				padding-left: 10px;
			}
			#sidebar {
				height: 1450px;
				padding-top: 15px;
			}
			table {
				width: 600px;
				height: 950px;
				overflow: auto;
				display: block;
			}
			table tr th {
				padding-right: 50px;
			}
		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	</head>
	
	<body>
		
		<div id="container">
			
			<div class="fixedWidth">
				
				<div id="header">
					<h1>University of Bahrain</h1>
					<h3>College of Applied Studies</h3>
					<!-- END of HEADER -->
				</div>
	
				<div id="logBar">
					<a href="staff-logout.php"><img src="images/logoff.jpg" height="30" align="right" /></a>
				</div>
	
				<div class="break"></div>
				
				
				<div id="sidebar">
	
	
					<ul id="nav">
						<li><a href="staff-page.php">Home Administrative</a></li>
						<li><a href="staff-page-sections.php">View Sections</a></li>
						<li><a href="staff-page-rejstu.php">Rejected Students</a></li>
						<li><a href="staff-page-stucontact.php">Contact Students</a></li>
						<li><a href="staff-page-managecourses.php">Manage Courses</a></li>
						<li style="border-bottom:none;" class="selected"><a href="staff-page-outsidemsg.php">Outside Messages</a></li>
					</ul>
	
					
					<!-- END of SIDEBAR -->
				</div>


	
				<div id="content">

					<h1>Message Box:</h1>
					<p style="color: #7C7C7C;"><em>This page is specified for reviewing outside messages that been sent through the <a href="contact.html">contact</a> page. You can see the messages here, and respond to a specific user to his/her provided email address.</em></p>

					<hr />
					<br />

					<table align="center" cellpadding="7">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Message</th>
							</tr>
						</thead>
						<tbody>
							<!-- PHP CODE START -->
							<?php

								include ('partials/connectDb.php');

								$sql = "SELECT * FROM contact_table;";
								$run_query = mysqli_query($conn, $sql);

								while ($row = mysqli_fetch_array($run_query)) {
									# code...
									echo "<tr>";
									echo "<td>$row[name]</td>";
									echo "<td><a href='mailto:$row[email]'>$row[email]</a></td>";
									echo "<td>$row[phone]</td>";
									echo "<td>$row[message]</td>";
									echo "</tr>";
								}
							?>
							<!-- PHP CODE END -->
						</tbody>
					</table>

					

					
					<!-- End of CONTENT -->
				</div>
	
				<div id="footer" style="text-align: center;">
					Copyright&copy; 2016, University of Bahrain. <em>College of Applied Studies</em> || <u>BETA VERSION</u>
					<!-- END of FOOTER -->
				</div>
				
				<!-- END of FIXED WIDTH -->
			</div>

		</div>

		<script type="text/javascript">
		</script>
		
	</body>
</html>