<?php
// On définit un login et un mot de passe de base pour tester notre exemple. Cependant, vous pouvez très bien interroger votre base de données afin de savoir si le visiteur qui se connecte est bien membre de votre site
//je remplace tous les "login" par "Student_number" et "pwd" par "First_Name" 
try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=gym;charset=utf8', 'root', 'root');
		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
		}
		$N = (int) strip_tags($_POST["numero"]);
		//try table: member
		$reponse = $bdd->query("SELECT member_no, first_name, last_name, password, date_of_birth, gender, mobile, home_tel, email, address, yoga, zumba, fitness, step, end_date FROM member WHERE member_no = $N ");
		while ($donnees = $reponse->fetch()){
			$login_valid = $donnees['member_no'];
			$password_valid = $donnees['password'];
			//courses
			$first_name = $donnees['first_name'];
			$last_name=$donnees['last_name'];
			$yoga = $donnees['yoga'];
			$zumba = $donnees['zumba'];
			$fitness = $donnees['fitness'];
			$step = $donnees['step'];
		}

// on teste si nos variables sont définies
if (isset($N) && isset($_POST['Password'])) {

	// on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
	if ($login_valid == $N && $password_valid == strip_tags($_POST['Password'])) {
		// dans ce cas, tout est ok, on peut démarrer notre session

		// on la démarre :)
		session_start ();
		// on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
		$_SESSION['numero'] = strip_tags($_POST['numero']);
		$_SESSION['Password'] = strip_tags($_POST['Password']);
		$_SESSION['role'] = "member";
		$_SESSION['first_name'] = $first_name;
		$_SESSION['last_name'] = $last_name;

		
		//COOKIE
		setcookie("TestCookie_numero", $_SESSION['numero'], time() + 3600);
		setcookie("TestCookie_password", $_SESSION['Password'], time() + 3600);

		// on redirige notre visiteur vers une page de notre section membre
		header ('location: ../../Home.php');
	}
	else {
		// Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
		echo '<body onLoad="alert(\'unexpected member...\')">';
		// puis on le redirige vers la page d'accueil
		echo '<meta http-equiv="refresh" content="0;URL=login_member.html">';
	}
}
else {
	echo 'Variables are not declared.';
}
?>
