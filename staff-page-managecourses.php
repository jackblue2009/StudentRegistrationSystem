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
				padding-top: 15px;
				padding-left: 10px;
			}
			#sidebar {
				height: 1450px;
				padding-top: 15px;
			}
			table {
				width: 600px;
				height: 500px;
				overflow: auto;
				display: block;
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
						<li><a href="staff-page-stucontact.php">Contact Students</a></li>
						<li class="selected"><a href="staff-page-managecourses.php">Manage Courses</a></li>
						<li style="border-bottom:none;"><a href="staff-page-outsidemsg.php">Outside Messages</a></li>
					</ul>
	
					
					<!-- END of SIDEBAR -->
				</div>


	
				<div id="content">

					<h1>Course Management:</h1>
					<p>Here is the console web page for the administrator to control courses on the matter of addition.</p>

					<table>
						<caption>All Courses</caption>
						<thead>
							<tr>
								<th>Code</th>
								<th>Name</th>
								<th>Credits</th>
								<th>Major</th>
							</tr>
						</thead>
						<tbody>
							<?php
								include ('partials/connectDb.php');

								$sql = "SELECT course_table.course_name, course_table.course_code,
										course_table.cr, major_table.major_name FROM course_table
										INNER JOIN major_table ON course_table.major = major_table.major_id;";
								$run_sql = mysqli_query($conn, $sql);

								while ($row = mysqli_fetch_array($run_sql)) {
									# code...
									echo "<tr>";
									echo "<td>$row[course_code]</td>";
									echo "<td>$row[course_name]</td>";
									echo "<td>$row[cr]</td>";
									echo "<td>$row[major_name]</td>";
									echo "</tr>";
								}
							?>
						</tbody>
					</table>

					<h3>Add New Course: </h3>
					<form action="staff-page-managecourses.php" id="courseAdd" method="post" onsubmit="return ValidateData()">
						<label for="cName">Course Name: 
						<input type="text" id="cName" name="cName" placeholder="Type Course Name..." />
						<p id="cNameVal"></p>
						</label>
						<br />
						<br />
						<label for="cCode">Course Code: 
						<input type="text" id="cCode" name="cCode" size="10" maxlength="10" placeholder="Type Course Code..." />
						<p id="cCodeVal"></p>
						</label>
						<br />
						<br />
						<label for="cr">Credits: 
						<input type="number" id="cr" name="cr" size="1" maxlength="1" />
						<p id="crVal"></p>
						</label>
						<br />
						<br />
						<label for="cMajor">Major: 
						<select id="cMajor" name="cMajor">
							<option value="0">Select Major</option>
							<option value="1">Network Administration</option>
							<option value="2">Web and Multimedia Development</option>
							<option value="3">Office Management</option>
						</select>
						<p id="cMajorVal"></p>
						</label>
						<br />
						<br />
						<input type="submit" value="Add" name="submit" id="submit" />
						<input type="reset" value="Reset" name="reset" id="reset" />

						<?php
						include ('partials/connectDb.php');

						if (isset($_POST['submit']))
						{
							$name = mysqli_real_escape_string($conn, $_POST['cName']);
							$code = mysqli_real_escape_string($conn, $_POST['cCode']);
							$cr = mysqli_real_escape_string($conn, $_POST['cr']);
							$major = mysqli_real_escape_string($conn, $_POST['cMajor']);

							$sql = "INSERT INTO course_table (course_name, course_code, cr, major) VALUES ('$name', '$code', '$cr', '$major');";

							$run_query = mysqli_query($conn, $sql);
							echo '<script>alert("New Course has been added!")</script>';
							echo "<script>window.open('staff-page-managecourses.php', '_self')</script>";
						}

						

						?>
					</form>

					
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

		function ValidateData ()
		{
			var cNameVar = document.forms["courseAdd"]["cName"].value;
			var cCodeVar = document.forms["courseAdd"]["cCode"].value;
			var crVar = document.forms["courseAdd"]["cr"].value;
			var cMajorVar = document.forms["courseAdd"]["cMajor"].value;

			if (cNameVar == "")
			{
				document.getElementById("cNameVal").innerHTML = "Course Name Required!";
				document.getElementById("cNameVal").style.color = "red";
				return false;
			}
			else
			{
				document.getElementById("cNameVal").innerHTML = "";
			}

			if (cCodeVar == "")
			{
				document.getElementById("cCodeVal").innerHTML = "Course Code Required!";
				document.getElementById("cCodeVal").style.color = "red";
				return false;
			}
			else
			{
				document.getElementById("cCodeVal").innerHTML = "";
			}

			if (crVar == "")
			{
				document.getElementById("crVal").innerHTML = "Credits Required!";
				document.getElementById("crVal").style.color = "red";
				return false;
			}
			else
			{
				document.getElementById("crVal").innerHTML = "";
			}

			if (cMajorVar == 0)
			{
				document.getElementById("cMajorVal").innerHTML = "Major Selection Required!";
				document.getElementById("cMajorVal").style.color = "red";
				return false;
			}
			else
			{
				document.getElementById("cMajorVal").innerHTML = "";
			}

			return true;
		}
		</script>
		
	</body>
</html>