<?php
  session_start();
  if(file_exists('../statistic/event.txt')) // check if .txt exist
  {
          $compteur_f = fopen('../statistic/event.txt', 'r+'); // open read and write
          $compte = fgets($compteur_f);
  }
  else
  {
          $compteur_f = fopen('../statistic/event.txt', 'a+'); // if don't exist create the .txt
          $compte = 0; // and put at 0
  }
  $compte++; // incrémenation
  fseek($compteur_f, 0); // fix the cursor position
  fputs($compteur_f, $compte); // write the compt number
  fclose($compteur_f); // close
?>

<!DOCTYPE html>
<html lang="en">

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
    <link href="../css/Event.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <!-- Sintoni home button -->
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="../Home.php">Sintoni Sports Club</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>


      <a class="navbar-brand" href="redirect.php"> | <?php echo $_SESSION['first_name']; ?> |</a>
      <a class="navbar-brand">| Member Event |</a>

      <!-- Bouton home dropdown -->

      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Menu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item navbar-light" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      </ul>


      <!-- Bouton fade -->

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-center">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#zumba">Zumba</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#yoga">Yoga</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#fitness">Fitness</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#step">Step</a>
            </li>
          </ul>
        </div>


            <!-- Login / Logout -->
      <ul class="navbar-nav mr-auto">
        <li class="navbar-item">
          <a class="navlink" href="../membership/login/logout.php">Logout</a>
        </li>
      </ul>
    </div>
    </nav>


    <?php
    // On affiche un lien pour fermer notre session
    //echo '<a href="membership/login/logout.php">Logout</a>';
    try
    {
      $bdd = new PDO('mysql:host=localhost;dbname=gym;charset=utf8', 'root', 'root');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
    $N = (int) $_SESSION['numero'];
    $reponse = $bdd->query("SELECT* FROM member WHERE member_no = $N ");
    while ($donnees = $reponse->fetch())
    {
      $zumba=$donnees['zumba'];
      $yoga=$donnees['yoga'];
      $fitness=$donnees['fitness'];
      $step=$donnees['step'];
    }
    //===================================================================
    $Myoga=0;
    $reponse = $bdd->query("SELECT * FROM member WHERE yoga = 1 ");
		while ($donnees = $reponse->fetch())
		{
			$Myoga=$Myoga+1;
		}
	$notMyoga=0;
    $reponse = $bdd->query("SELECT * FROM not_member WHERE yoga = 1 ");
		while ($donnees = $reponse->fetch())
		{
			$notMyoga=$notMyoga+1;
		}
		$Pyoga=$notMyoga+$Myoga;
	//=====================================================================
	$Mzumba=0;
    $reponse = $bdd->query("SELECT * FROM member WHERE zumba = 1 ");
		while ($donnees = $reponse->fetch())
		{
			$Mzumba=$Mzumba+1;
		}
	$notMzumba=0;
    $reponse = $bdd->query("SELECT * FROM not_member WHERE zumba = 1 ");
		while ($donnees = $reponse->fetch())
		{
			$notMzumba=$notMzumba+1;
		}
		$Pzumba=$notMzumba+$Mzumba;
	//====================================================================
	$Mfitness=0;
    $reponse = $bdd->query("SELECT * FROM member WHERE fitness = 1 ");
		while ($donnees = $reponse->fetch())
		{
			$Mfitness=$Mfitness+1;
		}
	$notMfitness=0;
    $reponse = $bdd->query("SELECT * FROM not_member WHERE fitness = 1 ");
		while ($donnees = $reponse->fetch())
		{
			$notMfitness=$notMfitness+1;
		}
		$Pfitness=$notMfitness+$Mfitness;
	//=====================================================================
	$Mstep=0;
    $reponse = $bdd->query("SELECT * FROM member WHERE step = 1 ");
		while ($donnees = $reponse->fetch())
		{
			$Mstep=$Mstep+1;
		}
	$notMstep=0;
    $reponse = $bdd->query("SELECT * FROM not_member WHERE step = 1 ");
		while ($donnees = $reponse->fetch())
		{
			$notMstep=$notMstep+1;
		}
		$Pstep=$notMstep+$Mstep;
    ?>

      <!-- Zumba Section -->
      
      <section id="zumba" class="zumba-section content-section text-center">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <br /> <br />
              <h1>Zumba Club :</h1>
              <p>The Zumba Club let you discover the fiber of the sportif dancing.
                How can have fun and do some fitness together ! Subscribe to us !
                <?php
                if($zumba==1)
                {
                ?>
                <br /> <br /> <br />
                <a href="member/Del_Zumba.php" class="btn btn-refuse btn-lg">Unregister</a>
                <?php
                }else
                {
                	if($Pzumba<6)
                	{
		                ?>
		                <br /> <br /> <br />
		                <a href="member/Add_Zumba.php" class="btn btn-accept btn-lg">Register</a>
		                <?php
		            }
		            else
		            {
		            	?>
		                	<br /> <br /> <br />
                			<a href="" class="btn btn-refuse btn-lg">FULL</a>
		                <?php
		            }
                }
                ?>
            </div>
          </div>
        </div>
      </section>

      <!-- Yoga Section -->
      <section id="yoga" class="yoga-section content-section text-center">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h1>Yoga Club :</h1>
              <p>The Yoga Club let you discover the fiber of an art of the body.
                Just became more flexible ! Subscribe to us !
                <?php
                if($yoga==1)
                {
                ?>
                <br /> <br /> <br />
                <a href="member/Del_Yoga.php" class="btn btn-refuse btn-lg">Unregister</a>
                <?php
                }else
                {
                	if($Pyoga<6)
                	{
		                ?>
		                <br /> <br /> <br />
              			<a href="member/Add_Yoga.php" class="btn btn-accept btn-lg">Register</a>
		                <?php
		            }
		            else
		            {
		            	?>
		                	<br /> <br /> <br />
                			<a href="" class="btn btn-refuse btn-lg">FULL</a>
		                <?php
		            }
                }
                ?>
            </div>
          </div>
        </div>
      </section>

      <!-- Fitness Section -->
      <section id="fitness" class="fitness-section content-section text-center">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h1>Fitness Club :</h1>
              <p>The Fitness Club let you discover the fiber of a beautiful body.
                Just be proud of your body ! Subscribe to us !
                <?php
                if($fitness==1)
                {
                ?>
                <br /> <br /> <br />
                <a href="member/Del_Fitness.php" class="btn btn-refuse btn-lg">Unregister</a>
                <?php
                }else
                {
                	if($Pfitness<6)
                	{
		                ?>
		                <br /> <br /> <br />
                		<a href="member/Add_Fitness.php" class="btn btn-accept btn-lg">Register</a>
		                <?php
		            }
		            else
		            {
		            	?>
		                	<br /> <br /> <br />
                			<a href="" class="btn btn-refuse btn-lg">FULL</a>
		                <?php
		            }
                }
                ?>
            </div>
          </div>
        </div>
      </section>

      <!-- Step Section -->
      <section id="step" class="step-section content-section text-center">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h1>Step Club :</h1>
              <p>The Step Club let you discover how to do sport with a step.
                Just synchronize your body with the music ! Subscribe to us !
                <?php
                if($step==1)
                {
	                ?>
	                <br /> <br /> <br />
	                <a href="member/Del_Step.php" class="btn btn-refuse btn-lg">Unregister</a>
	                <?php
                }else
                {
                	if($Pstep<6)
                	{
		                ?>
		                <br /> <br /> <br />
                		 <a href="member/Add_Step.php" class="btn btn-accept btn-lg">Register</a>
		                <?php
		            }
		            else
		            {
		            	?>
		                	<br /> <br /> <br />
                			<a href="" class="btn btn-refuse btn-lg">FULL</a>
		                <?php
		            }
                }
                ?>
            </div>
          </div>
        </div>
      </section>

    <!-- Map Section -->
    <!--
    <div id="map"></div>
    -->

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
