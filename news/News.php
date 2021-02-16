<?php
  session_start();

  if(file_exists('../statistic/news.txt')) // check if .txt exist
{
        $compteur_f = fopen('../statistic/news.txt', 'r+'); // open read and write
        $compte = fgets($compteur_f);
}
else
{
        $compteur_f = fopen('../statistic/news.txt', 'a+'); // if don't exist create the .txt
        $compte = 0; // and put at 0
}
$compte++; // incrémenation
fseek($compteur_f, 0); // fix the cursor position
fputs($compteur_f, $compte); // write the compt number
fclose($compteur_f); // close
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>-- Sintoni Sports Club --</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="../css/news.css" rel="stylesheet">
</head>
<body> 

	<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <!-- Sintoni home button -->
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="../Home.php">Sintoni Sports Club</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>

        <?php
    if (isset($_SESSION['numero']) && isset($_SESSION['Password'])) {
      ?>
      <a class="navbar-brand" href="../membership/dashboard/redirect.php"> | <?php echo $_SESSION['first_name']; ?> |</a>
      <a class="navbar-brand">| News | </a>

            <!-- Login / Logout -->
      <ul class="navbar-nav mr-auto">
        <li class="navbar-item">
          <a class="navlink" href="../membership/login/logout.php">Logout</a>
        </li>
      </ul>
      

    <?php
    // On affiche un lien pour fermer notre session
    //echo '<a href="membership/login/logout.php">Logout</a>';
    }
    else {
    ?>
    	 <a class="navbar-brand">| News | </a>

       <!-- Bouton Sign in -->

       <div class="collapse navbar-collapse">
      <ul class="navbar-nav mr-auto">
        <li class="navbar-item">
          <a class="navlink" href="../membership\login\login_menu.html">Login</a>
           <a class="navbar-brand">|</a>
          <a class="navlink" href="../membership\add\Sign_in.html">Sign Up</a>
        </li>
      </ul>
    </div>

      <?php
      }
    ?>
      </div>
    </nav>




    <!-- Intro Header -->
    <header class="masthead">
      <div class="intro-body">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h1 class="brand-heading">Welcome to the news page :</h1>
            </div>
          </div>
        </div>
      </div>
    </header>


<section id="News" class="download-section content-section text-center">
	<div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
	<form action="News.php" method="GET"> 
         <br/>
        <div class="form-group">	



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

    </form>
</div>
</div>
</div>
</section>


    <!-- Footer -->
    <footer>
      <div class="container text-center">
        <p>Copyright &copy; Your Website 2018</p>
      </div>
    </footer>




    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/grayscale.min.js"></script>


 
</body>
    
</html>


<!-- <span FONT style="color: white">MENU</span>-->