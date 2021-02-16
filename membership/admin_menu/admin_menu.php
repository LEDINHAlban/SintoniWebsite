<?php
	session_start();
	if (isset($_SESSION['numero']) && isset($_SESSION['Password']) && $_SESSION['role']=="admin") {
		echo "<h1>Admin:</h1>
	<div class=\"bouton\">
    <a href=\"../add/Add_Member.html\">Add new member</a>
	<a href=\"update_member.php\">Update member</a>
	<a href=\"delete_member.php\">Delete member</a>
	 <a href=\"../add/Add_staf.html\">Add new staff</a>
	<a href=\"update_staff.php\">Update staff</a>
	<a href=\"delete_staff.php\">Delete staff</a>
	<a href=\".html\">Add event</a>
	<a href=\".html\">Update event</a>
	<a href=\".html\">Post a news item</a>
	</div>";
	//See statistics
	//CRUD ?
	}
	else{
		echo "please login as admin.";
		echo '<a href="../login/login_admin.html">Login as admin</a>';
	}
?>