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
			#topic .contactInfo {
				text-align: center;
				color: #43A3B2;
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
					<li class="selected"><a href="student-support">Contact Support</a></li>
					<li style="border-bottom:none;"><a href="student-calender.php">Calender</a></li>
				</ul>

				
				 
			</div> -->

			<marquee id="headline">College of Applied Studies</marquee>
			<div id="content">

				<h1 id="welcome">Support Page</h1>


				<div id="topic">

					<p align="center">For any questions regarding anything, please do not hesitate to contact:</p>
					<p class="contactInfo">Applied_Studies@uob.edu.bh</p>

					<br />

					<p align="center">Or you can try calling our official numbers:</p>
					<p class="contactInfo">Skheer Contact: +973 17438888</p>
					<p class="contactInfo">Isa Town Contact: +973 17876666</p>

					<br />

					<p align="center">Or you can even send a mail to our official mailbox:</p>
					<p class="contactInfo">P.O. Box 32038 Kingdom of Bahrain</p>
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