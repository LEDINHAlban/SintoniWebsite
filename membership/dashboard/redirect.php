<?php
	session_start();
	if (isset($_SESSION['numero']) && isset($_SESSION['Password']) && $_SESSION['role']=="admin") {
		header ('location: admin_dashboard.php');
	}
	else if (isset($_SESSION['numero']) && isset($_SESSION['Password']) && $_SESSION['role']=="staff") {
		header ('location: staff_dashboard.php');
	}
	else
	{
		header ('location: ../../Home.php');
	}
?>