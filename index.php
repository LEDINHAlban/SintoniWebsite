<?php
  session_start();
  if(file_exists('statistic/home.txt')) // check if .txt exist
  {
      $compteur_f = fopen('statistic/home.txt', 'r+'); // open read and write
      $compte = fgets($compteur_f);
  }
  else
  {
      $compteur_f = fopen('statistic/home.txt', 'a+'); // if don't exist create the .txt
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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/grayscale.css" rel="stylesheet">

  </head>

  <body id="page-top">

    
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <!-- Sintoni home button -->
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Sintoni Sports Club</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>

        <?php
    if (isset($_SESSION['numero']) && isset($_SESSION['Password'])) {
      ?>
      <a class="navbar-brand" href="membership/dashboard/redirect.php"> | <?php echo $_SESSION['first_name']; ?> |</a>


        <!-- Bouton fade -->

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-center">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#News">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#Event">Event</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>


            <!-- Login / Logout -->
      <ul class="navbar-nav mr-auto">
        <li class="navbar-item">
          <a class="navlink" href="membership/login/logout.php">Logout</a>
        </li>
      </ul>
      

    <?php
    // On affiche un lien pour fermer notre session
    //echo '<a href="membership/login/logout.php">Logout</a>';
    }
    else {
    ?>


      <!-- Bouton fade -->

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-center">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#News">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#Event">Event</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>


       <!-- Bouton Sign in -->

       <div class="collapse navbar-collapse">
      <ul class="navbar-nav mr-auto">
        <li class="navbar-item">
          <a class="navlink" href="membership\login\login_menu.html">Login</a>
           <a class="navbar-brand">|</a>
          <a class="navlink" href="membership\add\Sign_in.html">Sign Up</a>
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
              <h1 class="brand-heading">Sintoni Sports Club</h1>
              <p class="intro-text">A Dublin gym club.
                <br>Open to everyone.</p>
              <a href="#about" class="btn btn-circle js-scroll-trigger">
                <i class="fa fa-angle-double-down animated"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- About Section -->
    <section id="about" class="content-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2>About Us</h2>
            <p>In 1993, our first Fitness First club opened in Dublin. Today we have clubs in 16 different countries, making us a leader in the global fitness industry. In Ireland we have already opened 7 clubs and moving ahead with opening more clubs in the new future.</p>
            <a href="photos_gallery/gallery.html" class="btn btn-default btn-lg">Gallery</a>
            <a href="photos_gallery/quiz.html" class="btn btn-default btn-lg">Quiz</a>
         </div>
        </div>
      </div>
    </section>

    <!-- News Section -->
    <section id="News" class="download-section content-section text-center">
      <div class="container">
        <div class="col-lg-8 mx-auto">
          <h2>News</h2>
          <p>Stay aware of our club's activities.</p>

          <a href="news/News.php" class="btn btn-default btn-lg">News</a>

        </div>
      </div>
    </section>


    <!-- Event Section -->
    <section id="Event" class="content-section text-center">
      <div class="container">
        <div class="col-lg-8 mx-auto">
          <h2>Events</h2>
          <p>You can suscrible to our courses here.</p>

          <a href="event/redirect.php" class="btn btn-default btn-lg">Event</a>

        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section content-section text-center">
      <div class="container
      ">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2>Contact Us</h2>
            <p>You’re an individual and you have your own reasons for joining a gym. Whatever your reasons, fitness level, and needs, contact us – we will put together a plan to help you achieve your fitness and wellness goals.</p>
            <a href="contact_us/contact.php" class="btn btn-default btn-lg">Contact by email</a>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Custom scripts for this template -->
    <script src="js/grayscale.min.js"></script>


  </body>

</html>
