<?php
  session_start();
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
    <link href="../css/success.css" rel="stylesheet">
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

        <?php
    if (isset($_SESSION['numero']) && isset($_SESSION['Password'])) {
      ?>
      <a class="navbar-brand" href="../membership/dashboard/redirect.php"> | <?php echo $_SESSION['first_name']; ?> |</a>
      <a class="navbar-brand">| Delete |</a>


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

    <a class="navbar-brand">| Delete |</a>
      <!-- Bouton home dropdown -->

      <div class="collapse navbar-collapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Menu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      </ul>
    </div>


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
	<?php
		$N = (int) $_GET["news_no"];
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=GYM;charset=utf8', 'root', 'root');
		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
		}

		$reponse = $bdd->query("SELECT news_no FROM news ");
		$C=0;
		while($data = $reponse->fetch())
		{
			if($data['news_no'] == $N)
			{
				$bdd->exec("DELETE FROM news WHERE news_no = $N ");
				?>



				<!-- Intro Header -->
    <header class="masthead">
      <div class="intro-body">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h1 class="brand-heading">Del Success !</h1>
              <p>The news number : <?php echo $N ?> has been deleted.</p>
              <p class="intro-text">Return to the Home page, to the dashboard or del a news.</p>
              <a href="../Home.php" class="btn btn-default btn-lg">Home Page</a>
              <a href="news_delete.php" class="btn btn-accept btn-lg">Del News</a>
              <a href="../membership/dashboard/redirect.php" class="btn btn-default btn-lg">Dashboard Menu</a>
            </div>
          </div>
        </div>
      </div>
    </header>


				<?php
				$C=1;
			}
		}
		if($C==0)
		{
			?>

			<header class="masthead">
      <div class="intro-body">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h1 class="brand-heading">Del Error !</h1>
              <p>This news doesn't exist.</p>
              <p class="intro-text">Return to the Home page, to the dashboard or del a news.</p>
              <a href="../Home.php" class="btn btn-default btn-lg">Home Page</a>
              <a href="news_delete.php" class="btn btn-accept btn-lg">Del News</a>
              <a href="../membership/dashboard/redirect.php" class="btn btn-default btn-lg">Dashboard Menu</a>
            </div>
          </div>
        </div>
      </div>
    </header>


			<?php
		}



	?>

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