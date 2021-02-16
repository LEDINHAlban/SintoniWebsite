<?php
  session_start();
?>
<?php
if(file_exists('event.txt')) // check if .txt exist
{
		$compteur_f = fopen('event.txt', 'r+'); // open read and write
		$compte = fgets($compteur_f);
}
else
{
		$compteur_f = fopen('event.txt', 'a+'); // if don't exist create the .txt
		$compte = 0; // and put at 0
}
$compte++; // incrémenation
fseek($compteur_f, 0); // fix the cursor position
fputs($compteur_f, $compte); // write the compt number
fclose($compteur_f); // close
?>

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
    <link href="../css/grayscale.css" rel="stylesheet">
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

      <form action="contact_us.php" method="POST">
    <section id="News" class="download-section content-section text-center">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              

                <div class="form-group">
                   <label for="First_Name">First Name :</label>
                  <input type="text" class="form-control" name="First_Name" maxlength=20 required>
                </div>

                <div class="form-group">
                   <label for="Last_Name">Last Name :</label>
                  <input type="text" class="form-control" name="Last_Name" maxlength=20 required>
                </div>

                
                <div class="form-group">
                   <label for="email">Mail Address :</label>
                  <input type="email" class="form-control" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                </div>         

            </div>
      </div>
    </div>
  </section>


    <section id="about" class="content-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">

            <div class="form-group">
                   <label for="Phone_Mobile">Mobile No :</label>
                  <input type="tel" class="form-control" name="Phone_Mobile" pattern="[+]{0,1}[0-9]*" maxlength=12 required>
                </div>

            <div class="form-group">
			<label for="subject">Subject :</label> 
			<input type="text" name="subject" class="form-control"  maxlength=20 required/> 
		</div>
		
		<div class="form-group">
			<label for="message">Message :</label> 
			<textarea name="message" class="form-control" cols="30" rows="3" required></textarea> 
		</div>


                <button type="submit" class="btn btn-default btn-lg">Contact US</button>
            
      </div>
    </div>
  </div>
</section>
    </form>



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
