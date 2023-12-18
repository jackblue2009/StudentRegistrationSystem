<?php
	include ('partials/connectDb.php');

	if (isset($_POST['submit'])) {
		$email = $_POST['c_email'];
		$name = $_POST['c_name'];
		$phone = $_POST['c_phone'];
		$message = $_POST['c_message'];

		$phoneVal = "";

		if ($phone == "")
		{
			$phoneVal = "No Phone Number.";
		}
		else
		{
			$phoneVal = $phone;
		}

		$sql = "INSERT INTO contact_table (name, email, phone, message) VALUES ('$name', '$email', '$phoneVal', '$message');";
		$add = mysqli_query($conn, $sql);

		if ($add)
			header('Location: thank-you.html');
	}

?>