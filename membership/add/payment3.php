<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<?php
if (isset($_SESSION['numero']) && isset($_SESSION['Password']) && $_SESSION['role']=="admin" || $_SESSION['role']=="staff"){
if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$errors = array(); // for recording the errors
			if(empty(strip_tags($_POST['numero']))) {
			$errors[] = 'You forgot to enter your numero.';
			} else {
			$Member_number =  strip_tags($_POST['numero']);
			if (!filter_var($Member_number, FILTER_VALIDATE_INT)) {
				$errors[] = "Invalid numero.";}
			
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
			
			
			if(empty($_POST['End_date'])) {
			$errors[] = 'You forgot to enter your end date.';
			} else {
			$End_date =  strip_tags($_POST['End_date']);
			}

			if(empty($_POST['start_date'])) {
			$errors[] = 'You forgot to enter your start date.';
			} else {
			$start_date =  strip_tags($_POST['start_date']);
			}

			if(empty(strip_tags($_POST['offers']))) {
			$errors[] = 'You forgot to enter a membership.';
			} else {
			$offers =  strip_tags($_POST['offers']);		
			}
		
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
		
		

		$req=$bdd->prepare('UPDATE member SET first_name=:first_name, last_name=:last_name, date_of_birth=:date_of_birth, mobile=:mobile, home_tel=:home_tel, email=:email, address=:address, start_date=:start_date, end_date=:end_date, offer=:offer WHERE member_no=:member_no');
		$req->execute(array(
		'member_no'=>$Member_number,
		'first_name'=>$First_Name,
		'last_name'=>$Last_Name,
		'date_of_birth'=>$birthday,
		'mobile'=>$Phone_Mobile,
		'home_tel'=>$Phone_Home,
		'email'=>$email,
		'address'=>$Address,
		'start_date'=>$start_date,
		'end_date'=>$End_date,
		'offer'=>$offers
		));

		/* not asked by the assignment but if you want to print the info:
		echo "Student number : ".$Student_number."<br>";
		echo "First name : ".$First_Name."<br>";
		echo "Last name : ".$Last_Name."<br>";
		echo "Email :".$email."<br>";
		echo "Adress : ".$Address."<br>";
		echo "Phone Home : ".$Phone_Home."<br>";
		echo "Phone mobile : ".$Phone_Mobile."<br>";
		echo "Date-of-birth : ".$birthday."<br>";
		echo "Gender : ".$gender."<br>";
		echo "End date : ".$End_date."<br>";
		*/
		
		if($req) { // if the query ran successfully
			header ('location: sucess_payment.php');
			} else {
			echo 'Error! '.mysqli_error($db_connection);
			}
		//close after each query
		$req->closeCursor();
		
	}
	
		else { // else print each error.
			echo "<h2>Error!</h2> <h3>The following error(s) occurred:</h3>";
			foreach ($errors as $msg) {
			echo "- $msg <br/>";
			}
		}
}
	else echo "you cannot access to this page";
	?>

</body>
</html>