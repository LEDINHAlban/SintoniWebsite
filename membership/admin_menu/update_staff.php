<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<?php
	if (isset($_SESSION['numero']) && isset($_SESSION['Password']) && $_SESSION['role']=="admin"){
    //connection au serveur:
    	try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=GYM;charset=utf8', 'root', 'root');
		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
		}

    header ('location: update_staff_propre.php');
	}
	else{
		echo "you cannot access to this page";
		//echo "<br/><a href=\"#\" onclick=\"history.go(-1);\">Return to previous page</a>";
	} 
  ?>

</body>
</html>