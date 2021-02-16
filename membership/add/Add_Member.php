<!DOCTYPE html>
<html>
<head>
<head>
	<meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
</head>
</head>
<body>
	<h1>Member :</h1>
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

			if(empty($_POST['Password'])) {
			$errors[] = 'You forgot to enter your Password.';
			} else {
			$Password =  strip_tags($_POST['Password']);
			if(!preg_match("/^[a-zA-Z 0-9]*$/",$Password)) {
			$errors[] = "Invalid Password!";} // use only letters and white space.
			}

			if(empty($_POST['email'])) {
			$errors[] = 'You forgot to enter your email.';
			} else {
			$email =  strip_tags($_POST['email']);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$errors[] = "Invalid email address.";}
			}
			
			if(empty($_POST['Address'])) {
			$errors[] = 'You forgot to enter your address.';
			} else {
			$Address =  strip_tags($_POST['Address']);

			} if(empty($_POST['Phone_Home'])) {
			$errors[] = 'You forgot to enter your phone home.';
			} else {
			$Phone_Home =  strip_tags($_POST['Phone_Home']);
			}
			if(empty($_POST['Phone_Mobile'])) {
			$errors[] = 'You forgot to enter your mobile phone.';
			} else {
			$Phone_Mobile =  strip_tags($_POST['Phone_Mobile']);
			} if(empty($_POST['birthday'])) {
			$errors[] = 'You forgot to enter your birthday.';
			} else {
			$birthday =  strip_tags($_POST['birthday']);
			list($y, $m, $d) = explode('-', $birthday);
			if($y<1900){
				$errors[] = "Invalid birth date.";} //choose a date between 1970 (too old to go to college) and 2004 (too young)
			}
			
			if(empty($_POST['gender'])) {
			$errors[] = 'You forgot to enter your gender.';
			} else {
			$gender =  strip_tags($_POST['gender']);
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
		
		/* not asked by the assignment  but if you want to print the info
		echo "Student number : ".$Student_number."<br>";
		echo "First name : ".$First_Name."<br>";
		echo "Last name : ".$Last_Name."<br>";
		echo "Email :".$email."<br>";
		echo "Adress : ".$Address."<br>";
		echo "Phone Home : ".$Phone_Home."<br>";
		echo "Phone mobile : ".$Phone_Mobile."<br>";
		echo "Date-of-birth : ".$birthday."<br>";
		
		
		echo "Gender : ".$gender."<br>";
		echo "Major : ".$Major."<br>";
		echo "Course : ".$_POST['Course']."<br>";

		echo "Study mode : ".$study_mode."<br>";
		echo "Start date : ".$Start_date."<br>";
		echo "End date : ".$End_date."<br>";
		*/
		$req=$bdd->prepare('INSERT INTO member(first_name, last_name, password, date_of_birth, gender, mobile, home_tel, email, address, inscription_date) VALUES(:first_name,  :last_name, :password, :date_of_birth, :gender, :mobile, :home_tel, :email, :address, NOW() )');
		$req->execute(array(
		'first_name'=>$First_Name,
		'last_name'=>$Last_Name,
		'date_of_birth'=>$birthday,
		'password'=>$Password,
		'gender'=>$gender,
		'mobile'=>$Phone_Mobile,
		'home_tel'=>$Phone_Home,
		'email'=>$email,
		'address'=>$Address,
		));
		
		if($req) { // if the query ran successfully
			header ('location: success_member.html');
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
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=gym;charset=utf8', 'root', 'root');
		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
		}
		echo $email;
		$reponse = $bdd->query("SELECT * FROM member WHERE email = '$email' AND first_name = '$First_Name' ");
		while ($donnees = $reponse->fetch())
		{
			$N=$donnees['member_no'];
			$password=$donnees['password'];
		}
		$message="your member number is :$N \n your password is :$password.";
		mail($email,"Your login", $message, "From: $email\r\n");
		
	?>
	<div class="bouton">
		<p>
	    <a href="../../HOME.php">Home</a>
		
		</p>
	</div>

</body>
</html>