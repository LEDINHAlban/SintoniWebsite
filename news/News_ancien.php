<!DOCTYPE html>


<html>
<head>
    <title>LabWork 3B</title>
    <meta charset="utf-8" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="gym.css" />
</head>
<body id="page-top">

	

	<div class="container">
	<form action="News.php" method="GET"> 
         <br/>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">	



<?php
ini_set('display_errors','off');


try { 
$bdd = new PDO('mysql:host=localhost;dbname=GYM;charset=utf8', 'root', 'root');

$rep = $bdd->query('SELECT * FROM news ORDER BY news_no DESC');

while ($donnees = $rep->fetch())
{   

	echo "<br/><br/>";
	echo "<center><u><B><h2> $donnees[Title] </B></h2></u></center>"; 
	echo "<center><B>$donnees[text]</B><br/><br/></center>";
	echo '<center><img src='.$donnees[picloc].' alt="" width="400" /></center><br/>';
	echo "<center> Date :  "."$donnees[news_date]<br/>";
	
		
	
     
}
$rep->closeCursor();
}








catch(Exception $e) { die('Erreur : '.$e->getMessage()); }









?>	

		</div>

    </form></div>

 
</body>
    
</html>


<!-- <span FONT style="color: white">MENU</span>-->