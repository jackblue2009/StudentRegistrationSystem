<?php

	session_start();
	include ('partials/connectDb.php');
	
	if (isset($_POST['loginBtn'])) {
		$staffname = $_POST['sname'];
		$password = $_POST['pass'];
		
		$query = mysqli_query($conn, "SELECT staff_id FROM staff_table WHERE staff_username = '$staffname' and staff_password = '$password';");
		
		if ($row = mysqli_fetch_array($query)) {
			$_SESSION['staff_id'] = $row['staff_id'];
			header ('Location:staff-page.php');
		} else {
			$error1 = "<span style='color: red;'>Your data entry is incorrect</span>";
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
		p {
			margin: 0;
		}
		#loginBtn {
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
					<h1>Staff Login</h1>
					<form action='staff-login.php' method='POST'>
						<label for="sname">Staff login name: </label>
						<input type="text" name="sname" id="sname" /><p id="nameVal"></p>
						
						<br /><br />
						<label for="pass">Password: </label>
						<input type="password" name="pass" id="pass" /><p id="passVal"></p>
						
						<br /><br />
						<input type="submit" name="loginBtn" id="loginBtn" value="Login" />
						<p id="dataVal">
							<?php
	
								if (isset($error1)) {
									echo $error1;
								}
							
							?>
						</p>
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
		document.getElementById("loginBtn").onclick = function () {
			var sName = document.getElementById("sname").value;
			var password = document.getElementById("pass").value;
			
			if (sName == "" || password == "") {
				if (sName == "") {
					document.getElementById("nameVal").innerHTML = "Enter your authenticated name";
					document.getElementById("nameVal").style.color = "Red";
				} else  {
					document.getElementById("nameVal").innerHTML = "";
				}
				if (password == "") {
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