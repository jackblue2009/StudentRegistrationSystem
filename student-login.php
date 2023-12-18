<?php

	session_start();
	include ('partials/connectDb.php');

	if (isset($_POST['stLogin'])) {
		$student_id = $_POST['stuId'];
		$student_password = $_POST['stuPass'];

		$query = mysqli_query($conn, "SELECT student_id FROM student_table WHERE student_id = '$student_id' AND student_password = '$student_password';");

		if ($row = mysqli_fetch_array($query)) {
			$_SESSION['student_id'] = $row['student_id'];
			header ('Location:student-page.php');
		} else {
			$errorLog = "<span style='color: red;'>Your data entry is incorrect</span>";
		}
	}
?>
<!DOCTYPE html>

<html>

<head>
	<title>Applied Studies</title>

	<link rel="stylesheet" type="text/css" href="styles/main.css" />

	<style type="text/css">
		#topic {
			padding: 25px 0 0 100px;
			text-align: center;
		}
		#topic h1 {
			padding-bottom: 25px;
		}
		label {
				display: inline-block;
				float: left;
				clear: left;
				width: 100px;
			}
		input, textarea {
				display: inline-block;
			}
		form {
			border:2px dashed #B8E2F8;
			padding: 15px;
		}
		button {
			background-color: #43A3B2;
			color: #FFFFFF;
			border: none;
			height: 25px;
		}
		button a {
			color: #FFFFFF !important;
		}
		#stLogin {
			background-color: #43A3B2;
			color: #FFFFFF;
			border: none;
			height: 25px;
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
				<a href="student-login.php"><img src="images/student-log.jpg" height="30" align="right" /></a>
				<a href="staff-login.php"><img src="images/staff-log.jpg" height="30" align="right" /></a>
			</div>

			<div class="break"></div>

			<div id="sidebar">


				<ul id="nav">
					<li><a href="index.html">Home</a></li>
					<li><a href="about.html">About Us</a></li>
					<li><a href="academic.html">Academic Departments</a></li>
					<li><a href="contact.html">Contact</a></li>
					<li style="border-bottom:none;"><a href="mission-vision.html">Mission &amp; Vision</a></li>
				</ul>

				
				<!-- END of SIDEBAR -->
			</div>

			<div id="content">
				<div id="topic">
					<h1>Student Login</h1>
					<form action="student-login.php" method="POST">
						<label for="stuId">Student ID: </label>
						<input type="text" name="stuId" id="stuId" />
						<p id="nameVal"></p>

						<br /><br />
						<label for="stuPass">Password: </label>
						<input type="password" name="stuPass" id="stuPass" />
						<p id="passVal"></p>

						<br /><br />
						<input type="submit" id="stLogin" name="stLogin" value="Login" />&nbsp;&nbsp;&nbsp;
						<p id="dataVal">
							<?php
								if (isset($errorLog)) {
									echo $errorLog;
								}
							?>
						</p>
						<button><a href="student-new-reg.php">New Student?</a></button>
					</form>
				</div>

				<!-- End of CONTENT -->
			</div>

			<div id="footer">
				Copyright&copy; 2016, University of Bahrain. <em>College of Applied Studies</em> || <u>BETA VERSION</u>
				<!-- END of FOOTER -->
			</div>

		</div>

	</div>


	<script type="text/javascript">
		document.getElementById("stLogin").onclick = function () {
			var stuName = document.getElementById("stuId").value;
			var stuPass = document.getElementById("stuPass").value;
			
			if (stuName == "" || stuPass == "") {
				if (stuName == "") {
					document.getElementById("nameVal").innerHTML = "Enter your authenticated name";
					document.getElementById("nameVal").style.color = "Red";
				} else  {
					document.getElementById("nameVal").innerHTML = "";
				}
				if (stuPass == "") {
					document.getElementById("passVal").innerHTML = "Enter your authenticated password";
					document.getElementById("passVal").style.color = "Red";
				} else {
					document.getElementById("passVal").innerHTML = "";
				}
				return false;
				
			}
			
		}
		
		
	</script>


</body>

</html>