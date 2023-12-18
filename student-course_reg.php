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
		<script>
			function pop_up(url){
			window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=500,height=200,directories=no,location=no') 
			}
		</script>
		<script src="scripts/jquery.min.js"></script>

		<style type="text/css">
			body {
				color: #43A3B2;
			}
			table {
				padding: 10px;
				width: 500px;
				height: 400px;
				overflow: auto;
				display: block;
			}
			#stuCourseReg th {
				padding-right: 50px;
			}
			#stuCourseReg td {
				padding-bottom: 15px;
			}
			#sidebar {
				height: 850px;
			}
			#content {
				height: 850px;
			}
			#topic {
				height: 650px;
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
			#leftSec {
				text-align: center;
			}
			#addBtn {
				margin-left: 200px;
				margin-top: 25px;
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
					<li class="selected"><a href="student-course_reg.php">Register Courses</a></li>
					<li><a href="student-support">Contact Support</a></li>
					<li style="border-bottom:none;"><a href="student-calender.php">Calender</a></li>
				</ul>

			</div> -->

			<marquee id="headline">College of Applied Studies</marquee>
			<div id="content">

				<h1 id="welcome">Courses Registration</h1>


				<div id="topic">
					
					<table width="100%" id="stuCourseReg">
						<thead>
							<tr>
								<th>Course Name</th>
								<th>Section</th>
								<th>Days</th>
								<th>Start Time</th>
								<th>End Time</th>
								<th>Location</th>
							</tr>
						</thead>
						<tbody>
							<?php

							$sql = "SELECT course_table.course_name, course_registered.section_number,
									course_registered.days, course_registered.time_start,
									course_registered.time_end, course_registered.location,
									course_registered.student_id FROM course_registered
									INNER JOIN course_table ON course_registered.course_id = course_table.course_id
									WHERE course_registered.student_id = '$stId';";

							$run_query = mysqli_query($conn, $sql);

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

							?>


						</tbody>
					</table>

					<hr />

					<h4 align="center" id="addCourse">Add Course:</h4>

					<form action="student-course_reg.php" method="post" id="addForm" onsubmit="return ValidateCourse()">
						<div id="leftSec">
							<label>Select Course: </label><br />
								<?php

								include ('partials/connectDb.php');

								//Select a Major based on Student ID
								$sqlMajor = "SELECT student_id, student_major FROM student_table
											WHERE student_id = '$stId';";
								$run_major_query = mysqli_query($conn, $sqlMajor);
								$rowMajor = mysqli_fetch_array($run_major_query);
								//Assign the student major to a variable
								$stuCourseMajor = $rowMajor['student_major'];

								$sqlCourse = "";

								if ($stuCourseMajor == 1)
								{
									$sqlCourse = "SELECT * FROM course_table WHERE major = '$stuCourseMajor'
												AND course_id > 0 AND course_id < 6;";
								}
								elseif ($stuCourseMajor == 2)
								{
									# code...
									$sqlCourse = "SELECT * FROM course_table WHERE major = '$stuCourseMajor'
												AND course_id > 26 AND course_id < 32;";
								}
								elseif ($stuCourseMajor == 3) {
									# code...
									$sqlCourse = "SELECT * FROM course_table WHERE major = '$stuCourseMajor'
								AND course_id > 49 AND course_id < 55;";
								}

								$run_course_query = mysqli_query($conn, $sqlCourse);

								echo "<select name='course' id='course' onmousedown='if(this.options.length > 5){this.size == 5;}' onchange='showSection(this.value);' onblur='this.size = 0;' required>";
								echo "<option value='0'>---Select---</option>";

								$rowCourse = "";
								$couId = "";
								$course = $_POST['course'];

								while ($rowCourse = mysqli_fetch_array($run_course_query))
								{
									$couId = $rowCourse['course_id'];
									$couName = $rowCourse['course_name'];
									echo "<option value='{$couId}'><a href='#'>$couName</a></option>";
								}

								echo "</select>";
								echo "<p id='courseVal'></p>";

								echo "<br /><br />";

								echo "<label>Select Section: </label>";
								echo "<br /><br />";

								echo "<input type='radio' name='section_number' id='section1' value='1' checked required /> Section 1";
								echo "<br />";
								echo "<input type='radio' name='section_number' id='section2' value='2' required /> Section 2";

								$section_number = !empty($_POST['section_number']) ? $_POST['section_number'] : '';

								$sqlSection = "SELECT * FROM section_table WHERE course_id = '$course' AND section_number = '$section_number';";
								$run_section_query = mysqli_query($conn, $sqlSection);

								$rowSection = mysqli_fetch_array($run_section_query);
								$secId = $rowSection['id'];
								$secNumber = $section_number;
								$secCourseId = $rowSection['course_id'];
								$secTimeStart = $rowSection['time_start'];
								$secTimeEnd = $rowSection['time_end'];
								$secDays = $rowSection['days'];
								$secLoction = $rowSection['location'];
								$currentDate = date("Y-m-d H-i-s");
								
								//Check if a course been added already exist or not
								$check = "SELECT * FROM course_registered WHERE course_id = '$course'
										AND student_id = '$stId';";
								$rs = mysqli_query($conn, $check);

								if (isset($_POST['addBtn']))
								{
									if ($data = mysqli_fetch_array($rs, MYSQLI_NUM))
									{
										echo '<script>alert("Course has already been added!")</script>';
									}
									else
									{
										$sqlAddToSubmission = "INSERT INTO course_registered (course_id, section_number, days, time_start, time_end, location, student_id, date_registered)
											VALUES ('$secCourseId', '$secNumber', '$secDays', '$secTimeStart', '$secTimeEnd', '$secLoction', '$stId', '$currentDate');";

										if ($run_addSubmit_query = mysqli_query($conn, $sqlAddToSubmission))
										{
											echo '<script>alert("You have successfully added a course.")</script>';
											echo "<script>window.open('student-course_reg.php', '_self')</script>";
										}
									}
								}
								
								?>
						</div>
						<!-- COMMENT BETWEEN LEFT SECTION AND RIGHT SECTION -->

						<div class="break"></div>

						<input type="submit" value="Add" id="addBtn" name="addBtn" />
						
					</form>
					

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

		var courseCount = $("#stuCourseReg tr").length;
		if (courseCount > 5)
		{
			document.getElementById("addCourse").innerHTML = "Courses exceeded maximum amount per semester.";
			document.getElementById("addCourse").style.color = "red";
			document.getElementById("addCourse").style.textDecoration = "underline";
			$("form").hide();
		}

		function ValidateCourse ()
		{
			var courseVar = document.forms["addForm"]["course"].value;

			if (courseVar == 0)
			{
				document.getElementById("courseVal").innerHTML = "Course Selection is Required!";
				document.getElementById("courseVal").style.color = "red";
				return false;
			}
			else
			{
				document.getElementById("courseVal").innerHTML = "";
			}

			return true;
		}
	</script>


	</body>

</html>