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
				padding-top: 10px;
			}
			#sidebar {
				height: 1450px;
				padding-top: 10px;
			}
			#startDiv {
				text-align: center;
				text-decoration: underline;
				color: red;
			}
			table {
				padding: 15px;
				width: 600px;
				height: 330px;
				overflow: auto;
				display: block;
			}
			table th {
				padding-right: 10px;
			}
			#countBox {
				width: 400px;
				height: 400px;
				margin-left: 150px;
				padding: 15px;
				border: 2px double #43A3B2;
				text-align: center;
			}
			#countBox p {
				position: relative;
				top: 95px;
				font-size: 48px;
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
						<li class="selected"><a href="staff-page-rejstu.php">Rejected Students</a></li>
						<li><a href="staff-page-stucontact.php">Contact Students</a></li>
						<li><a href="staff-page-managecourses.php">Manage Courses</a></li>
						<li style="border-bottom:none;"><a href="staff-page-outsidemsg.php">Outside Messages</a></li>
					</ul>
	
					
					<!-- END of SIDEBAR -->
				</div>


	
				<div id="content">

					<div id="startDiv">
						<p>The following is the list of the students who applied and got rejected for some reasons.</p>
						<p>The record is kept for future references.</p>
					</div>

					<br />
					<hr />

					<table align="center">
						<caption>All Rejected Students</caption>
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>High School Major</th>
								<th>High School GPA</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
								include ('partials/connectDb.php');

								$sql = "SELECT * FROM pending_students_table WHERE status = 0;";
								$run_sql = mysqli_query($conn, $sql);

								while ($row = mysqli_fetch_array($run_sql)) {
									$sHsMajor = $row['high_school_major'];
									$sHsMajorString = '';

									if ($sHsMajor == 1) {
										$sHsMajorString = 'Commercial';
									} elseif ($sHsMajor == 2) {
										$sHsMajorString = 'Literature';
									} elseif ($sHsMajor == 3) {
										$sHsMajorString = 'Science';
									} elseif ($sHsMajor == 4) {
										$sHsMajorString = 'Technical';
									}
									echo "<tr>";
									echo "<td>$row[student_name]</td>";
									echo "<td><a href='mailto:$row[student_email]'>$row[student_email]</a></td>";
									echo "<td>$row[student_phone]</td>";
									echo "<td>$sHsMajorString</td>";
									echo "<td>$row[high_school_gpa]</td>";
									echo "<td>$row[status]</td>";
									echo "</tr>";
								}
							?>
						</tbody>
					</table>

					<br />

					<div id="countBox">
						<p id="countTxt">Total Number of Rejected Students</p>
					</div>

					<?php
						include ('partials/connectDb.php');
						$rejCount = mysqli_query($conn, "SELECT COUNT(*) as status FROM pending_students_table WHERE status = 0;");
						$rejSum = mysqli_fetch_assoc($rejCount);
					?>
					
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

			var phpRejSum = "<?php echo $rejSum['status']; ?>";
			$(document).ready(function(){
			    $("#countBox").hover(function(){
			        document.getElementById("countTxt").innerHTML = phpRejSum;
			        document.getElementById("countTxt").style.fontSize = "72px";
			    }, function(){
			    	document.getElementById("countTxt").innerHTML = "Total Number of Rejected Students";
			    	document.getElementById("countTxt").style.fontSize = "48px";
			    });
			});
		</script>
		
	</body>
</html>