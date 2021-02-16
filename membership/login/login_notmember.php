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
		$email = $_POST["email"];
		//try table: member
		$reponse = $bdd->query("SELECT * FROM not_member WHERE email = '$email' ");

		while ($donnees = $reponse->fetch()){
			//courses
			$first_name = $donnees['first_name'];
			$last_name=$donnees['last_name'];
		}
		if(isset($first_name))
		{
			session_start();
		$_SESSION['email']=$email;
		$_SESSION['first_name']=$first_name;
		$_SESSION['last_name']=$last_name;
		$_SESSION['role']='not_member';
		header ('location: ../../event/redirect.php');
		}
		else
		{
			header ('location: login_notmember.html');
		}
		

?>
