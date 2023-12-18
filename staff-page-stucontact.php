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
				padding-top: 10px;
			}
			#sidebar {
				height: 1450px;
				padding-top: 10px;
			}
			table {
				width: 600px;
				height: 300px;
				overflow: auto;
				display: block;
			}
			table th {
				padding-right: 20px;
			}
			#regulation {
				color: red;
				margin-left: 5px;
			}
			#regulation ul li {
				padding-bottom: 10px;
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
						<li class="selected"><a href="staff-page-stucontact.php">Contact Students</a></li>
						<li><a href="staff-page-managecourses.php">Manage Courses</a></li>
						<li style="border-bottom:none;"><a href="staff-page-outsidemsg.php">Outside Messages</a></li>
					</ul>
	
					
					<!-- END of SIDEBAR -->
				</div>


	
				<div id="content">

					<p align="center">Here you will be able  to contact currently registered students in case of any update, issues, whatsoever..</p>

					<br />
					<hr />

					<table align="center">
						<caption>All Students</caption>
						<thead>
							<tr>
								<th>Student ID</th>
								<th>Student Name</th>
								<th>Student Email</th>
								<th>Student Phone</th>
							</tr>
						</thead>
						<tbody>
							<?php
								include ('partials/connectDb.php');

								$sql = "SELECT * FROM student_table;";
								$run_query = mysqli_query($conn, $sql);

								while ($row = mysqli_fetch_array($run_query)) {
									# code...
									echo "<tr>";
									echo "<td>$row[student_id]</td>";
									echo "<td>$row[student_name]</td>";
									echo "<td><a href='mailto:$row[student_email]'>$row[student_email]</a></td>";
									echo "<td>$row[student_phone]</td>";
									echo "</tr>";
								}
							?>
						</tbody>
					</table>

					<div id="regulation">
						<h3>Student Contact Regulation:</h3>
						<ul>
							<li>* If a student does not respond after a requested important message, then another message will be sent as a notice to request an immediate respond.</li>
							<li>* If a student added a wrong email, he should be contacted by his/her phone number to adjust email.</li>
							<li>* SPAM messages are strictly prohibited.</li>
							<li>* Administrator must send polite messages to the students.</li>
							<li>* Messages MUST BE stricted to professional.</li>
						</ul>
					</div>

					<img align="right" src="images/contact.jpg" alt="contact-img" width="400" height="400" />
					
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