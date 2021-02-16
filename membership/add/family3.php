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
if($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	$Member_number =  strip_tags($_POST['numero']);
	$family =  strip_tags($_POST['family']);		
			
}
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=GYM;charset=utf8', 'root', 'root');
		}
		catch (Exception $e)
		{
		    die('Erreur : ' . $e->getMessage());
		}
		
		

		$req=$bdd->prepare('UPDATE member SET family=:family WHERE member_no=:member_no');
		$req->execute(array(
		'member_no'=>$Member_number,
		'family'=>$family
		));

		
		if($req) { // if the query ran successfully
			header('location: sucess_family.php');
			} else {
			echo 'Error! '.mysqli_error($db_connection);
			}
		//close after each query
		$req->closeCursor();
		
	
}else echo "you cannot access to this page";
	?>

</body>
</html>