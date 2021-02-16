<!DOCTYPE html>
<html>
<head>
<head>
	<meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
</head>
</head>
<body>
	<h1>Student :</h1>
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$errors = array(); // for recording the errors
			
			} if(empty(strip_tags($_POST['First_Name']))) {
			$errors[] = 'You forgot to enter your first name.';
			} else {
			$First_Name = strip_tags($_POST['First_Name']);
			if (!preg_match("/^[a-zA-Z ]*$/",$First_Name)) {
			$errors[] = "Invalid name!";} // use only letters and white space.
			} 
			
			if(empty($_POST['Last_Name'])) {
			$errors[] = 'You forgot to enter your last name.';
			} else {
			$Last_Name =  strip_tags($_POST['Last_Name']);
			if(!preg_match("/^[a-zA-Z ]*$/",$Last_Name)) {
			$errors[] = "Invalid name!";} // use only letters and white space.
			}

			if(empty($_POST['email'])) {
			$errors[] = 'You forgot to enter your email.';
			} else {
			$email =  strip_tags($_POST['email']);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$errors[] = "Invalid email address.";}
			}
			
			if(empty($_POST['Phone_Mobile'])) {
			$errors[] = 'You forgot to enter your mobile phone.';
			} else {
			$Phone_Mobile =  strip_tags($_POST['Phone_Mobile']);
			} 

			 
		
	if(empty($errors)) {
	
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=GYM;charset=utf8', 'root', 'root');
		}
		catch (Exception $e)
		{
		    die('Erreur : ' . $e->getMessage());
		}
		

		$req=$bdd->prepare('INSERT INTO not_member(first_name, last_name, mobile, email) VALUES(:first_name,  :last_name, :mobile, :email)');
		$req->execute(array(
		'first_name'=>$First_Name,
		'last_name'=>$Last_Name,
		'mobile'=>$Phone_Mobile,
		'email'=>$email
		));
		
		if($req) { // if the query ran successfully
			echo '<h2>Success!</h2>
			<p>Staff has been registered!</p>';
			} else {
			echo 'Error! '.mysqli_error($db_connection);
			}
		
		$req->closeCursor();
	}
		
		
		else { // print each error.
			echo "<h2>Error!</h2> <h3>The following error(s) occurred:</h3>";
			foreach ($errors as $msg) {
			echo "- $msg <br/>";
			}
		}
		session_start();
		$_SESSION['email']=$email;
		$_SESSION['first_name']=$First_Name;
		$_SESSION['last_name']=$Last_Name;
		$_SESSION['role']='not_member';
		header ('location: ../../event/redirect.php');
		
	?>
	

</body>
</html>