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
				text-align: center;
				border: 1px solid #43A3B2;
			}
			#stuSchedule th {
				padding-right: 10px;
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
					<li><a href="student-schedule.php">My Schedule</a></li>
					<li><a href="student-course_reg.php">Register Courses</a></li>
					<li><a href="student-support">Contact Support</a></li>
					<li class="selected" style="border-bottom:none;"><a href="student-calender.php">Calender</a></li>
				</ul>

				
				 
			</div>-->

			<marquee id="headline">College of Applied Studies</marquee>
			<div id="content">

				<h1 id="welcome">Calender</h1>


				<div id="topic">
					<table align="center" cellpadding="5" cellspacing="0">
						<thead>
							<tr>
								<th colspan="2">First Semester</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Tuesday 1 Sept.</td>
								<td>Faculty Attendance</td>
							</tr>
							<tr>
								<td>Tuesday 1 Sept. - Thursday 10 Sept.</td>
								<td>Registration Period For First Semester</td>
							</tr>
							<tr>
								<td>Sunday 6 Sept.</td>
								<td>Attendance of Faculty who participated in Summer Session</td>
							</tr>
							<tr>
								<td>Thursday 10 Sept.</td>
								<td>Last day of payment and full refunding of fees</td>
							</tr>
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