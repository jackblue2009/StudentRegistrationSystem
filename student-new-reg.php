<!DOCTYPE html>
<html>

<head>

	<title>Applied Studies</title>
	<link rel="stylesheet" type="text/css" href="styles/main.css" />

	<style type="text/css">
		label {
				display: inline-block;
				clear: left;
				width: 200px;
				padding-left: 20px;
			}
		form fieldset {
			padding: 15px;
		}
		p {
			margin: 0;
		}
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
    		/* display: none; <- Crashes Chrome on hover */
    		-webkit-appearance: none;
    		margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
		}
		#notice {
			width: 500px;
			height: 150px;
			border: 1px dotted #B8E2F8;
			margin-top: 20px;
			margin-left: 85px;
			margin-bottom: 25px;
			padding: 15px;
			text-align: center;
			color: red;
		}
		#notice p {
			text-decoration: underline;
			color: red;
			text-align: justify;
		}
	</style>
</head>

<body>
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
					<h1>Student Registration</h1>
					
					<?php
					
						require_once 'partials/connectDb.php';
							
							if (isset ($_POST['register'])) {
								$stName = mysqli_real_escape_string($conn, $_POST['sName']);
								$stEmail = mysqli_real_escape_string($conn, $_POST['sEmail']);
								$stPhone = mysqli_real_escape_string($conn, $_POST['sPhone']);
								$stMajor = mysqli_real_escape_string($conn, $_POST['sMajor']);
								$stPassword = bin2hex (openssl_random_pseudo_bytes(4));
								$stHsMajor = mysqli_real_escape_string($conn, $_POST['hsMajor']);
								$stHsGpa = mysqli_real_escape_string($conn, $_POST['hsGPA']);
								$query = "INSERT INTO pending_students_table (student_name, student_email, student_phone, student_major, student_password, high_school_major, high_school_gpa, adviser)
										VALUES ('$stName', '$stEmail', '$stPhone', '$stMajor', '$stPassword', '$stHsMajor', '$stHsGpa', 1);";
								
								

								$add = mysqli_query($conn, $query);
								if ($add)
								{
									echo '<script>alert("You have successfully registered. Please wait 24 hours for respond.")</script>';
									echo "<script>window.open('student-new-reg.php', '_self')</script>";
								}
								else
								{
										die ('Could not add!'.mysqli_error($conn));
								}
								
								
							} //END of IF 'POST' register
							
							
					?>

					<div id="notice">
						<h3>Important Notice</h3>
						<p>Please make sure that submitted information are correct and accurate, as we will ultimately decline any false information.</p>
						<p>Note: If you get accept it, you will receive an email to set a date for interview and to bring the necessary documents which will be specified in the email.</p>
					</div>
					
					<form action="student-new-reg.php" id="registerForm" onsubmit="return ValidateForm()" method="POST">
						<fieldset>
							<legend>Student Information</legend>
							<label for="sName">
								Student Name: <br /> <input type="text" name="sName" id="sName" />
								<p id="nameVal"></p>
								<br /><br />
							</label>
								
							<label for="sEmail">
								Student Email: <br /> <input type="email" name="sEmail" id="sEmail" />
								<p id="emailVal"></p>
								<br /><br />
							</label>
								
							<label for="sPhone">
								Student Phone Number: <br /> <input type="text" size="8" maxlength="8" name="sPhone" id="sPhone" />
								<p id="phoneVal"></p>
								<br /><br />
							</label>
								
							<label for="sMajor">
								Major: <br />
									
										<?php
					
											include ('partials/connectDb.php');
											
											$query = 'SELECT major_id, major_name FROM major_table;';
											$result = mysqli_query($conn, $query);
												
												echo '<select id="sMajor" name="sMajor">';
												echo '<option value="0">Select your major</option>';
												while ($row=mysqli_fetch_array($result)) {
												
													if ($row["major_id"] != 4) {
														echo '<option value="'.$row["major_id"].'">'.$row["major_name"].'</option>';
														
													} else {
														echo '<option value="'.$row["major_id"].'" disabled>'.$row["major_name"].'</option>';
													}
											
												}
												
												echo '</select>';
										
										?>
								<p id="majorVal"></p>
								
								<br /><br />
								
							</label>
							
							<label for="hsMajor">
								High School Major:
								<select id="hsMajor" name="hsMajor">
									<option value="0">Select previous major</option>
									<option value="1">Commercial</option>
									<option value="2">Literature</option>
									<option value="3">Science</option>
									<option value="4">(Institute of Technology)</option>
								</select>
								<p id="hsMajorVal"></p>
								<br /><br />
							</label>

							<label for="hsGPA">
								High School GPA: <input type="number" step="any" id="hsGPA" name="hsGPA" />
								<p id="hsGpaVal"></p>
								<br /><br />
							</label>
							

								<br /><br />

							<label>
								<input type="submit" value="Submit" name="register" id="register" />
								<input type="reset" value="Reset" />
							</label>
						</fieldset>
					</form>
					
					
					
				</div>
				
				<script type="text/javascript">
					function ValidateForm ()
					{
						//Code
						var stuNameVar = document.forms["registerForm"]["sName"].value;
						var stuEmailVar = document.forms["registerForm"]["sEmail"].value;
						var stuPhoneVar = document.forms["registerForm"]["sPhone"].value;
						var stuMajorVar = document.forms["registerForm"]["sMajor"].value;
						var hsMajorVar = document.forms["registerForm"]["hsMajor"].value;
						var hsGpaVar = document.forms["registerForm"]["hsGPA"].value;

						if (stuNameVar == "")
						{
							document.getElementById("nameVal").innerHTML = "Name is Required!";
							document.getElementById("nameVal").style.color = "red";
							return false;
						}
						else
						{
							document.getElementById("nameVal").innerHTML = "";
						}

						if (stuEmailVar == "")
						{
							document.getElementById("emailVal").innerHTML = "Email is Required!";
							document.getElementById("emailVal").style.color = "red";
							return false;
						}
						else
						{
							document.getElementById("emailVal").innerHTML = "";
						}

						if (stuPhoneVar == "")
						{
							document.getElementById("phoneVal").innerHTML = "Phone is Required!";
							document.getElementById("phoneVal").style.color = "red";
							return false;
						}
						else
						{
							if (stuPhoneVar.length != 8)
							{
								document.getElementById("phoneVal").innerHTML = "Eight Digits Required!";
								document.getElementById("phoneVal").style.color = "red";
								return false;
							}
							else
							{
								document.getElementById("phoneVal").innerHTML = "";
							}
							
						}

						if (stuMajorVar == 0)
						{
							document.getElementById("majorVal").innerHTML = "Major Selection is Required!";
							document.getElementById("majorVal").style.color = "red";
							return false;
						}
						else
						{
							document.getElementById("majorVal").innerHTML = "";
						}

						if (hsMajorVar == 0)
						{
							document.getElementById("hsMajorVal").innerHTML = "Selection here is Required!";
							document.getElementById("hsMajorVal").style.color = "red";
							return false;
						}
						else
						{
							document.getElementById("hsMajorVal").innerHTML = "";
						}

						if (hsGpaVar == "")
						{
							document.getElementById("hsGpaVal").innerHTML = "H.S GPA is Required!";
							document.getElementById("hsGpaVal").style.color = "red";
							return false;
						}
						else
						{
							document.getElementById("hsGpaVal").innerHTML = "";
						}

						

						return true;
						//END of Validation Function
					}
				</script>
				<!-- End of CONTENT -->
			</div>

			<div id="footer">
				Copyright&copy; 2016, University of Bahrain. <em>College of Applied Studies</em> || <u>BETA VERSION</u>
				<!-- END of FOOTER -->
			</div>

		</div>

	</div>

</body>
</body>

</html>