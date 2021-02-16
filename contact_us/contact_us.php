<!DOCTYPE html>

<?php
if(file_exists('../statistic/contact.txt')) // check if .txt exist
{
		$compteur_f = fopen('../statistic/contact.txt', 'r+'); // open read and write
		$compte = fgets($compteur_f);
}
else
{
		$compteur_f = fopen('../statistic/contact.txt', 'a+'); // if don't exist create the .txt
		$compte = 0; // and put at 0
}
$compte++; // incrémenation
fseek($compteur_f, 0); // fix the cursor position
fputs($compteur_f, $compte); // write the compt number
fclose($compteur_f); // close
?>
<html>
<head>
<head>
	<meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
</head>
</head>
<body>
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$errors = array(); // for recording the errors
			if(empty(strip_tags($_POST['First_Name']))) {
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
			
			$Phone_Mobile =  strip_tags($_POST['Phone_Mobile']);
			/*if(!preg_match("\D",$Phone_Mobile)) {
			$errors[] = "Invalid mobile phone!";} // use only numbers.*/
			
			if(empty($_POST['subject'])) {
			$errors[] = 'You forgot to enter a subject.';
			} else {
			$subject =  strip_tags($_POST['subject']);
			}
			
			if(empty($_POST['message'])) {
			$errors[] = 'You forgot to enter a message.';
			} else {
			$message =  strip_tags($_POST['message']);
			}
		}
	if(empty($errors)) {
		/*
		echo "First name : ".$First_Name."<br>";
		echo "Last name : ".$Last_Name."<br>";
		echo "Email :".$email."<br>";
		echo "Subject : ".$subject."<br>";
		echo "Message : ".$message."<br>";
		*/
		

		mail("sintni.sport.club@gmail.com","Contact from the gym site", $message, "From: $email\r\n");
		header('location: ../Home.php');
	}
		
		
		else { // print each error.
			echo "<h2>Error!</h2> <h3>The following error(s) occurred:</h3>";
			foreach ($errors as $msg) {
			echo "- $msg <br/>";
			}
		}

		try
		{
			$bd = new PDO('mysql:host=localhost;dbname=GYM;charset=utf8', 'root', 'root');
		}
		catch (Exception $e)
		{
		    die('Erreur : ' . $e->getMessage());
		}
		
		$re=$bd->prepare('INSERT INTO quires(email, quires_date) VALUES(:email, NOW() )');
		$re->execute(array(
		'email'=>$email,

		
		));

		
	?>

</body>
</html>