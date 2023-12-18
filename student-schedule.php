<?php
	session_start();
	include ('partials/connectDb.php');
	if (!isset($_SESSION['student_id'])) {
		header ('Location:student-login.php');
		exit();
	} else {
		$stId = $_SESSION['student_id'];
		$query = mysqli_query($conn, "SELECT * FROM student_table WHERE student_id = '$stId';");
		$row = mysqli_fetch_array($query);

		$stuName = $row['student_name'];
	}
?>
<!DOCTYPE html>
<html>

	<head>
		<title>Applied Studies</title>
		<link rel="stylesheet" type="text/css" href="styles/main.css" />
		<script src="scripts/jquery.min.js"></script>

		<style type="text/css">
			body {
				color: #43A3B2;
			}
			table {
				padding: 10px;
			}
			#stuSchedule th {
				padding-right: 20px;
			}
			#sidebar {
				height: 500px;
			}
			#content {
				height: 500px;
			}
			#topic {
				height: 300px;
			}
			#backBtn {
				position: relative;
				top: 5px;
				left: 150px;
				padding: 15px;
				font-size: 28px;
			}
			#headline {
				padding: 10px;
			}
		</style>
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
				<a href="student_logoff.php"><img src="images/logoff.jpg" height="30" align="right" /></a>
			</div>

			<div class="break"></div>

			<!-- <div id="sidebar">


				<ul id="nav">
					<li><a href="student-page.php">Student Homepage</a></li>
					<li class="selected"><a href="student-schedule.php">My Schedule</a></li>
					<li><a href="student-course_reg.php">Register Courses</a></li>
					<li><a href="student-support">Contact Support</a></li>
					<li style="border-bottom:none;"><a href="student-calender.php">Calender</a></li>
				</ul>

				
				 
			</div> -->

			<marquee id="headline">College of Applied Studies</marquee>
			<div id="content">

				<h1 id="welcome">Student Schedule</h1>


				<div id="topic">
					
					

					<table width="100%" id="stuSchedule" cellpadding="3">
						<thead>
							<tr>
								<th>Course Name</th>
								<th>Section Number</th>
								<th>Days</th>
								<th>Time Start</th>
								<th>Time End</th>
								<th style="padding-right: 0;">Location</th>
							</tr>
						</thead>
						<tbody>
							<?php

							include ('partials/connectDb.php');

							$sql = "SELECT course_registered.cr_id, course_table.course_name,
									course_registered.section_number, course_registered.days,
									course_registered.time_start, course_registered.time_end,
									course_registered.location, course_registered.student_id
									FROM  course_registered INNER JOIN course_table ON
									course_registered.course_id = course_table.course_id
									WHERE student_id = '$stId';";

							$sqlCount = "SELECT COUNT(*) student_id FROM course_registered WHERE student_id = '$stId';";
							$run_count = mysqli_query($conn, $sqlCount);

							$sqlSum = mysqli_fetch_assoc($run_count);

							$run_query = mysqli_query($conn, $sql);

							if ($run_query->num_rows > 0)
							{
								while ($row = mysqli_fetch_array($run_query))
								{
									echo "<tr>";
									echo "<td>$row[course_name]</td>";
									echo "<td>$row[section_number]</td>";
									echo "<td>$row[days]</td>";
									echo "<td>$row[time_start]</td>";
									echo "<td>$row[time_end]</td>";
									echo "<td>$row[location]</td>";
									echo "</tr>";
									
								}
							}
							else
							{
								echo "<tr>";
								echo "<td align='center' colspan='6'>No Courses Are Registered At The Moment.</td>";
								echo "</tr>";
							}

							
							?>
						</tbody>
					</table>

				</div>

				<div id="feed">
					<button id="backBtn" onclick=""><a href="student-page.php">Back</a></button>
				</div>
			</div>

			<div id="footer">
				Copyright&copy; 2016, University of Bahrain. <em>College of Applied Studies</em> || <u>BETA VERSION</u>
				<!-- END of FOOTER -->
			</div>

			<!-- END of the FIXED WIDTH -->
		</div>

		<!-- END of CONTAINER -->
	</div>

	<script type="text/javascript">
		function GoBack ()
		{
			window.history.back ();
		}
	</script>


	</body>

</html>