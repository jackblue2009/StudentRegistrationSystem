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
				
			}
			#sidebar {
				height: 1450px;
			}
			table {
				width: 650px;
				height: 650px;
				overflow: auto;
				display: block;
				padding: 15px;
			}
			table th {
				padding-right: 5px;
			}
			table td {
				padding-bottom: 5px;
			}
			#regulation {
				padding: 15px;
			}
		</style>

		<script>
		</script>
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
						<li class="selected"><a href="staff-page-sections.php">View Sections</a></li>
						<li><a href="staff-page-rejstu.php">Rejected Students</a></li>
						<li><a href="staff-page-stucontact.php">Contact Students</a></li>
						<li><a href="staff-page-managecourses.php">Manage Courses</a></li>
						<li style="border-bottom:none;"><a href="staff-page-outsidemsg.php">Outside Messages</a></li>
					</ul>
	
					
					<!-- END of SIDEBAR -->
				</div>


	
				<div id="content">

					<table>
						<caption>All Sections</caption>
						<thead>
							<tr>
								<th>Course</th>
								<th>Section Number</th>
								<th>Start Time</th>
								<th>End Time</th>
								<th>Days</th>
								<th>Location</th>
								<th>Instructor</th>
								<th>Students</th>
							</tr>
						</thead>
						<tbody>
							<?php
								include ('partials/connectDb.php');

								$sql = "SELECT section_table.id, section_table.section_number,
										course_table.course_name, section_table.time_start,
										section_table.time_end, section_table.days,
										section_table.location, staff_table.staff_username,
										section_table.students FROM section_table INNER JOIN course_table ON section_table.course_id = course_table.course_id
										INNER JOIN staff_table ON section_table.instructor = staff_table.staff_id
										ORDER BY section_table.id ASC;";
								$run_query = mysqli_query($conn, $sql);

								while ($row = mysqli_fetch_array($run_query)) {
									# code...
									echo "<tr>";
									echo "<td>$row[course_name]</td>";
									echo "<td>$row[section_number]</td>";
									echo "<td>$row[time_start]</td>";
									echo "<td>$row[time_end]</td>";
									echo "<td>$row[days]</td>";
									echo "<td>$row[location]</td>";
									echo "<td>$row[staff_username]</td>";
									echo "<td>$row[students]</td>";
									echo "</tr>";
								}
							?>
						</tbody>
					</table>

					<br />
					<hr />

					<div id="regulation">
					<h3 style="color: red;">Sections Regulations:</h3>
					<ul style="color: red;">
						<li>* Each section MUST NOT exceed 25 students.</li>
						<li>* Each section MUST have at least one instructor.</li>
						<li>* Each section MUST have at least two students.</li>
					</ul>
					</div>
					
					<!-- End of CONTENT -->
				</div>
	
				<div id="footer" style="text-align: center;">
					Copyright&copy; 2016, University of Bahrain. <em>College of Applied Studies</em> || <u>BETA VERSION</u>
					<!-- END of FOOTER -->
				</div>
				
				<!-- END of FIXED WIDTH -->
			</div>

		</div>

		<script type="text/javascript"></script>
		
	</body>
</html>