<?php
	session_start();
	include ('partials/connectDb.php');

	echo "<h2>Student Information</h2>";

	$id = $_GET['id'];
	$sql = "SELECT pending_students_table.id, pending_students_table.student_name,
			pending_students_table.student_email, pending_students_table.student_phone,
			major_table.major_name, pending_students_table.student_password,
			pending_students_table.high_school_major, pending_students_table.high_school_gpa,
			pending_students_table.adviser, pending_students_table.status 
			FROM pending_students_table INNER JOIN major_table ON pending_students_table.student_major = major_table.major_id WHERE pending_students_table.id = '$id';";
	$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_array($result)) {
		$sId = $row['id'];
		$sName = $row['student_name'];
		$sEmail = $row['student_email'];
		$sPhone = $row['student_phone'];
		$sMajor = $row['major_name'];
		$sHsMajor = $row['high_school_major'];
		$sHsGpa = $row['high_school_gpa'];

		$sHsMajorString = '';

		if ($sHsMajor == 1) {
			$sHsMajorString = 'Commercial';
		} elseif ($sHsMajor == 2) {
			$sHsMajorString = 'Literature';
		} elseif ($sHsMajor == 3) {
			$sHsMajorString = 'Science';
		} elseif ($sHsMajor == 4) {
			$sHsMajorString = '(Institute of Technology)';
		}

		echo "<ul>";
		echo "<li>Name: {$sName}</li>";
		echo "<li>Email: {$sEmail}</li>";
		echo "<li>Phone: {$sPhone}</li>";
		echo "<li>Selected Major: {$sMajor}</li>";
		echo "<li>High School Major: {$sHsMajorString}</li>";
		echo "<li>High School GPA: {$sHsGpa}</li>";
		echo "</ul>";


	}
?>