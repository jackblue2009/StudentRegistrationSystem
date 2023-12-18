<?php

	session_start();
	include ('partials/connectDb.php');
	session_destroy();
	header ('Location:student-login.php');
	exit();

?>