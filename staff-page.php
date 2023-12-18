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
			#sidebar {
				height: 1320px;
			}
			#content {
				width: 750px;
				height: 1320px;
			}
			#topic {
				width: 450px;
				height: 925px;
			}
			table, tr {
				border: solid;
				border-color: #43A3B2;
				border-width: 1px;
			}
			table {
				margin-bottom: 50px;
			}
			th {
				padding: 0 2px;
			}
			#sList {
				width: 650px;
				height: 300px;
				overflow: auto;
				display: block;
			}
			#sHold td {
				padding-right: 15px;
			}
			p {
				margin: 0;
			}
			#edit {
				font-style: italic;
			}
			#naBox {
				width: 100px;
				height: 100px;
				border: 1px double #67BDE5;
				text-align: center;
				padding: 0 5px;
				float: left;
				margin-left: 30px;
			}
			#naBox p {
				color: #67BDE5;
				margin: 30px 0;
			}
			#wdBox {
				width: 100px;
				height: 100px;
				border: 1px double #67BDE5;
				text-align: center;
				padding: 0 5px;
				float: left;
				margin-left: 30px;
			}
			#wdBox p {
				color: #67BDE5;
				margin: 30px 0;
			}
			#omBox {
				width: 100px;
				height: 100px;
				border: 1px double #67BDE5;
				text-align: center;
				padding: 0 5px;
				float: left;
				margin-left: 30px;
			}
			#omBox p {
				color: #67BDE5;
				margin: 30px 0;
			}
			#baBox {
				width: 100px;
				height: 100px;
				border: 1px double #67BDE5;
				text-align: center;
				padding: 0 5px;
				margin-left: 30px;
				margin-top: 30px;
			}
			#baBox p {
				color: #67BDE5;
				margin: 30px 0;
			}
		</style>

		<script>
			function pop_up(url){
			window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=500,height=200,directories=no,location=no') 
			}
		</script>
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
						<li class="selected"><a href="staff-page.php">Home Administrative</a></li>
						<li><a href="staff-page-sections.php">View Sections</a></li>
						<li><a href="staff-page-rejstu.php">Rejected Students</a></li>
						<li><a href="staff-page-stucontact.php">Contact Students</a></li>
						<li><a href="staff-page-managecourses.php">Manage Courses</a></li>
						<li style="border-bottom:none;"><a href="staff-page-outsidemsg.php">Outside Messages</a></li>
					</ul>
	
					
					<!-- END of SIDEBAR -->
				</div>


	
				<div id="content">

					
					
					<div id="topic">
						
						
						<h2>Administrator Page</h2>
						<h3 id="welcome"><?php  echo "Welcome <u><span style='text-decoration=underline;'>".$staffname."</span></u>";  ?></h3>
						<br /><br />

						<h3>Students list</h3>
						<table id="sList">
							<caption>Student Table</caption>
							<thead>
								<tr class="titlerow">
									<th>Student ID</th>
									<th>Student Name</th>
									<th>Student Email</th>
									<th>Student Phone</th>
									<th>Student Major</th>
									<th>Student Password</th>
									<th>High School Major</th>
									<th>High School GPA</th>
									<th>Advisor</th>
									<th>Status</th>
								</tr>
							</thead>
							
							<?php
							
								$conn = mysqli_connect('localhost', 'root', '', 'srs-db') or die('ERROR: Cannot Connect='.mysql_error($conn));
								
								$sql = "SELECT student_table.student_id,
										student_table.student_name, student_table.student_email,
										student_table.student_phone, major_table.major_name,
										student_table.student_password, student_table.high_school_major,
										student_table.high_school_gpa, staff_table.staff_username, student_table.status
										FROM student_table INNER JOIN major_table ON student_table.student_major = major_table.major_id
										INNER JOIN staff_table ON student_table.adviser = staff_table.staff_id
										ORDER BY student_table.student_id ASC";
								
								$record = mysqli_query($conn, $sql);
								
								while ($row = mysqli_fetch_assoc($record)) {
									$sHsMajor = $row['high_school_major'];
									$sHsMajorString = '';
									$stStatus = $row['status'];
									$stActString  = '';

									if ($sHsMajor == 1) {
										$sHsMajorString = 'Commercial';
									} elseif ($sHsMajor == 2) {
										$sHsMajorString = 'Literature';
									} elseif ($sHsMajor == 3) {
										$sHsMajorString = 'Science';
									} elseif ($sHsMajor == 4) {
										$sHsMajorString = '(Institute of Technology)';
									}

									if ($stStatus == 1) {
										$stActString = 'Active';
									}

									echo "<tr>";
									echo "<td>$row[student_id]</td>";
									echo "<td>$row[student_name]</td>";
									echo "<td>$row[student_email]</td>";
									echo "<td>$row[student_phone]</td>";
									echo "<td class='rowDataSd'>$row[major_name]</td>";
									echo "<td>$row[student_password]</td>";
									echo "<td>$sHsMajorString</td>";
									echo "<td>$row[high_school_gpa]</td>";
									echo "<td>$row[staff_username]</td>";
									echo "<td>$stActString</td>";
									echo "</tr>";
								}
							
							?>
								
						</table>

						<h5>New Students Applicants: <span id="edit">(NULL means no new students applied)</span></h5>

						<table id="sHold" style="border:none;">
							
							<form method="post" action="staff-page.php">
								<?php
								    $conn = mysqli_connect('localhost', 'root', '', 'srs-db') or die('ERROR: Cannot Connect='.mysql_error($conn));

								    function getStudent () {
								        global $conn;
								        $query = "SELECT * FROM pending_students_table WHERE status IS NULL;";
								        $result = mysqli_query($conn, $query);

								        $i = 1;

								        while ($row = mysqli_fetch_array($result)) {
								            $sId = $row['id'];
								            $sName = $row['student_name'];

								            echo "<tr id='sNew".$i."'>";
								            echo "<td>".$i." - </td>";
								            echo "<td>{$sName}</td>";
								            echo "<td><button type='submit' name='sAcc' value='{$sId}'>Accept</button></td>";
								            echo "<td><button type='submit' name='sRej' value='{$sId}'>Reject</button></td>";
								            echo "<td><button name='stInfo' value='{$sId}'><a href='student_information.php?id=".$row['id']."' target='_blank' style='color: #000000; text-decoration: none;' onClick='pop_up(this)'>Student Details</a></button></td>";
								            echo "</tr>";

								            $i++;
								        }

								        
								    }



								    if (isset($_POST['sAcc']) && intval($_POST['sAcc'])) {
								        $user_id = (int) $_POST['sAcc'];

								        // Do the database update code to set Accept
								        mysqli_query($conn, "INSERT INTO student_table (student_name, student_email, student_phone, student_major, student_password, high_school_major, high_school_gpa, adviser, status)
								        	SELECT student_name, student_email, student_phone, student_major, student_password, high_school_major, high_school_gpa, adviser, '1'
								        		FROM pending_students_table
								        		WHERE id = '$user_id';");

								        mysqli_query($conn, "UPDATE pending_students_table SET status = 1 WHERE id = '$user_id';");

								        mysqli_query($conn, "DELETE FROM pending_students_table WHERE status = 1;");

								        $stMajorSql = mysqli_query($conn, "SELECT pending_students_table.id, pending_students_table.student_name, pending_students_table.student_email, pending_students_table.student_phone, major_table.major_name FROM pending_students_table WHERE id = '$user_id'
								        	INNER JOIN major_table ON pending_students_table.student_major = major_table.major_id");

								        $stRow = mysqli_fetch_array($stMajorSql);

								        echo "<script>window.open('staff-page.php', '_self')</script>";
								    }
								    if (isset($_POST['sRej']) && intval($_POST['sRej'])) {
								        $user_id = (int) $_POST['sRej'];


								        // Do the database update code to set Reject
								        mysqli_query($conn, "UPDATE pending_students_table SET status = 0 WHERE id = '$user_id'");

								        $stMajorSql = mysqli_query($conn, "SELECT * FROM pending_students_table WHERE id = '$user_id';");
								        $stRow = mysqli_fetch_array($stMajorSql);

								        echo "<script>window.open('staff-page.php', '_self')</script>";
								    }
								    if (isset($_POST['stInfo']) && intval($_POST['stInfo'])) {
								    	$user_id = (int) $_POST['stInfo'];
								    }



								    getStudent();

								?>
							</form> 

						</table>
						
					


						<div class="break"></div>

					<hr />

						<h3>Total number of students in each program -hover-:</h3>
						<br />
						<div id="naBox">
							<p id="naTxt">Network Administration</p>
							
						</div>
						<div id="wdBox">
							<p id="wdTxt" onclick="">Web and Multimedia Development</p>
						</div>
						<div id="omBox">
							<p id="omTxt" onclick="">Office Management</p>
						</div>

						<div class="break"></div>

						<div id="baBox">
							<p id="baTxt">Business Administration</p>
						</div>
					
					</div>
					
					
					<!-- End of CONTENT -->
				</div>
	
				<div id="footer">
					Copyright&copy; 2016, University of Bahrain. <em>College of Applied Studies</em> || <u>BETA VERSION</u>
					<!-- END of FOOTER -->
				</div>
				
				<!-- END of FIXED WIDTH -->
			</div>

		</div>

		<?php

			include ('partials/connectDb.php');

			$naCount = mysqli_query($conn, "SELECT COUNT(*) as student_major FROM student_table WHERE student_major = 1;");
			$naSum = mysqli_fetch_assoc($naCount);

			$wdCount = mysqli_query($conn, "SELECT COUNT(*) as student_major FROM student_table WHERE student_major = 2;");
			$wdSum = mysqli_fetch_assoc($wdCount);

			$omCount = mysqli_query($conn, "SELECT COUNT(*) as student_major FROM student_table WHERE student_major = 3;");
			$omSum = mysqli_fetch_assoc($omCount);
		?>

		<script type="text/javascript">

			var phpNaSum = "<?php echo $naSum['student_major']; ?>";
			$(document).ready(function($){
			    $("#naBox").hover(function(){
			        document.getElementById("naTxt").innerHTML = phpNaSum;
			        document.getElementById("naTxt").style.fontSize = "30px";
			    }, function(){
			    	document.getElementById("naTxt").innerHTML = "Network Administration";
			    	document.getElementById("naTxt").style.fontSize = "16px";
			    });
			});
			var phpWdSum = "<?php echo $wdSum['student_major']; ?>";
			$(document).ready(function(){
			    $("#wdBox").hover(function(){
			        document.getElementById("wdTxt").innerHTML = phpWdSum;
			        document.getElementById("wdTxt").style.fontSize = "30px";
			    }, function(){
			    	document.getElementById("wdTxt").innerHTML = "Web and Multimedia Development";
			    	document.getElementById("wdTxt").style.fontSize = "16px";
			    });
			});
			var phpOmSum = "<?php echo $omSum['student_major']; ?>";
			$(document).ready(function(){
			    $("#omBox").hover(function(){
			        document.getElementById("omTxt").innerHTML = phpOmSum;
			        document.getElementById("omTxt").style.fontSize = "30px";
			    }, function(){
			    	document.getElementById("omTxt").innerHTML = "Office Management";
			    	document.getElementById("omTxt").style.fontSize = "16px";
			    });
			});

			$(document).ready(function(){
			    $("#baBox").hover(function(){
			        document.getElementById("baTxt").innerHTML = "0";
			        document.getElementById("baTxt").style.fontSize = "30px";
			    }, function(){
			    	document.getElementById("baTxt").innerHTML = "Business Administration";
			    	document.getElementById("baTxt").style.fontSize = "16px";
			    });
			});

		</script>
		
	</body>
</html>