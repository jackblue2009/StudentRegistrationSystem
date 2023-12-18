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

		<style type="text/css">
			body {
				color: #43A3B2;
			}
			table {
				padding: 10px;
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
			#stuMenu {
				margin: 50px 0 0 0;
			}
			#stuMenu tr {
				margin-bottom: 25px;
				font-size: large;
			}
			#advisor {
				position: relative;
				top: 10px;
				padding: 35px;
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
					<li><a href="index.html">Home</a></li>
					<li><a href="about.html">About Us</a></li>
					<li><a href="academic.html">Academic Departments</a></li>
					<li><a href="contact.html">Contact</a></li>
					<li style="border-bottom:none;"><a href="mission-vision.html">Mission &amp; Vision</a></li>
				</ul>

				
				 END of SIDEBAR
			</div> -->
				<marquee id="headline">College of Applied Studies</marquee>
			<div id="content">

				<h1 id="welcome"><?php  echo "Welcome <u><span style='text-decoration=underline;'>".$stuName."</span></u>";  ?></h1>


				<div id="topic">
					
					

					<table width="100%" id="stuMenu">
						<tr>
							<td><a href="student-course_reg.php">Course Registration</a></td>
							<td><a href="student-schedule.php">My Schedule</a></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;</td>
						</tr>
						<tr>
							<td><a href="student-calender.php">Calender</a></td>
							<td><a href="student-support.php">Contact Support</a></td>
						</tr>
					</table>

				</div>

				<div id="feed">
					<span id='advisor'><?php include ('partials/connectDb.php');
					$sql = "SELECT staff_table.staff_username FROM student_table
							INNER JOIN staff_table ON student_table.adviser = staff_table.staff_id;";
					$run_query = mysqli_query($conn, $sql);
					$row = mysqli_fetch_assoc($run_query);
					echo "Advisor: ".$row['staff_username'].""; ?></span>
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


	</body>

</html>