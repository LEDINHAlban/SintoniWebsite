<?php
	session_start ();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
	<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)

// On récupère nos variables de session

?>
	<?php
	if(isset($_SESSION['email']))
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=gym;charset=utf8', 'root', 'root');
		}
		catch (Exception $e)
		{
		    die('Erreur : ' . $e->getMessage());
		}
		
		

		$req=$bdd->prepare('UPDATE not_member SET step=:cour WHERE email=:email');
		$req->execute(array(
		'email'=>$_SESSION['email'],
		'cour'=>1
		));
		header('location: ../redirect.php');
	}
	
	?>
</body>
</html>