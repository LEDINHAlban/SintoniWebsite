<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>
	<meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<?php
if (isset($_SESSION['numero']) && isset($_SESSION['Password']) && $_SESSION['role']=="admin"){
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=GYM;charset=utf8', 'root', 'root');
		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
		}
		$N = (int) $_GET["numero"];
		$reponse = $bdd->query("SELECT member_no, first_name, last_name, date_of_birth, gender, mobile, home_tel, email, address, end_date FROM member WHERE member_no = $N ");

		$C = (int) 0;
		while ($donnees = $reponse->fetch())
		{
			echo "<div class=\"container\">
		<form action=\"delete_member2.php\" method=\"POST\"> 


		<div class=\"form-group\">
			<label> <br/><FONT color=\"blue\"><U><h3><B>STUDENT REGISTRATION:</B></h3></U></FONT> </label><br/>
		</div>

		<div class=\"form-group\">
			<label for=\"numero\"><B>Member number:<FONT color=\"red\">*</FONT></B></label> 
			<input type=\"text\" name=\"numero\" value=".$donnees['member_no']." class=\"form-control col-md-4\"  READONLY/>
		</div>
			
			
		<div class=\"form-group\">
			<label for=\"First_Name\"><B>First Name:<FONT color=\"red\">*</FONT></B></label> 
			<input type=\"text\" name=\"First_Name\" value=".$donnees['first_name']." class=\"form-control col-md-4\" READONLY/>
		</div>

		<div class=\"form-group\">
			<label for=\"Last_Name\"><B>Last Name:<FONT color=\"red\">*</FONT></B></label> 
			<input type=\"text\" name=\"Last_Name\" value=".$donnees['last_name']." class=\"form-control col-md-4\"  READONLY/> 
		</div>

		<div class=\"form-group\">
				<label for=\"email\"><B>Mail Address:<FONT color=\"red\">*</FONT></B></label> 
				<input type=\"email\" name=\"email\" value=".$donnees['email']." class=\"form-control col-md-4\"READONLY/> 
			</div>

		<div class=\"form-group\">
			<label for=\"Address\"><B>Address:<FONT color=\"red\">*</FONT></B></label> 
			<input name=\"Address\" value=".$donnees['address']." class=\"form-control col-md-4\"  READONLY></input> 
		</div>

		<div class=\"form-group\">	
			<label for=\"Phone_Home\"><B>Home No:</B></label> 
			<input type=\"tel\" name=\"Phone_Home\" value=".$donnees['home_tel']." class=\"form-control col-md-4\"READONLY /> 
		</div>		
			
		<div class=\"form-group\">	
			<label for=\"Phone_Mobile\"><B>Mobile No:</B></label> 
			<input type=\"tel\" name=\"Phone_Mobile\" value=".$donnees['mobile']." class=\"form-control col-md-4\"READONLY/> 
		</div>			

		<div class=\"form-group\">	
			<label for=\"birthday\"><B>Date of birth:<FONT color=\"red\">*</FONT></B></label> 
			<input class=\"form-control col-md-4\" type=\"date\" name=\"birthday\" value=".$donnees['date_of_birth']." READONLY/>  
		</div>			

		Gender : ".$donnees['gender']."<br>

		<div class=\"form-group\">	
			<label for=\"End_date\"><B>End date:<FONT color=\"red\">*</FONT></B></label> 
			<input class=\"form-control col-md-4\" type=\"date\" name=\"End_date\" value=".$donnees['end_date']." READONLY/>  
		</div>
			
		<div class=\"form-group\">	
			<button type=\"submit\" class=\"submit btn btn-primary\">Delete</button> 
            <a href=\"/database/menu.html\"><input type=\"button\" value = \"MENU\" class=\"btn btn-primary\"></a>		
		
		</div>	
		
	
		


		<div class=\"form-group\">
				<label> <I><span FONT style=\"color: red; font-size: 12px\">* are required</span></I> </label><br/>
			</div>";

			$C = 1;
		}

		if($C==0)
		{
			echo "This member doesn t exist";
		}


		$reponse->closeCursor();
}
else echo "you cannot access to this page";
	?>
</body>
</html>