<?php
	session_start();
	if (isset($_SESSION['numero']) && $_SESSION['role']=="member") {
		header ('location: Event_member.php');
	}
	else if (isset($_SESSION['email']) && $_SESSION['role']=="not_member") {
		header ('location: Event_not_member.php');
	}
	else{
		header ('location: Event_not_log.php');
	}
?>