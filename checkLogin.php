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
			$error1 = "Your data entry is incorrect";
			echo json_encode($error1);
		}
	}

?>