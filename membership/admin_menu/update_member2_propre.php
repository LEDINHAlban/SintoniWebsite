<?php
  session_start();
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
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="../../css/grayscale.css" rel="stylesheet">

  </head>

  <body id="page-top">

    
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <!-- Sintoni home button -->
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="../../Home.php">Sintoni Sports Club</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>

      <a class="navbar-brand" href="redirect.php"> | <?php echo $_SESSION['first_name']; ?> |</a>
      <a class="navbar-brand"> | UPDATE MEMBER | </a>


            <!-- Login / Logout -->
      <ul class="navbar-nav mr-auto">
        <li class="navbar-item">
          <a class="navlink" href="../../membership/login/logout.php">Logout</a>
        </li>
      </ul>

      </div>
    </nav>


    <!-- Intro Header -->
    <header class="masthead">
      <div class="intro-body">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <form action="update_member3.php" method="POST">

                <div class="form-group">
                   <label for="numero">Member number :</label>
                  <input type="text" class="form-control" name="numero" value=<?php echo $donnees['member_no'] ?> READONLY>
                </div>

                <div class="form-group">
                   <label for="First_Name">First Name :</label>
                  <input type="text" class="form-control" name="First_Name" value=<?php echo $donnees['first_name'] ?> maxlength=20 required>
                </div>

                <div class="form-group">
                   <label for="Last_Name">Last Name :</label>
                  <input type="text" class="form-control" name="Last_Name" value= <? echo $donnees['last_name'] ?> maxlength=20 required>
                </div>

                

                <div class="form-group">
                   <label for="email">Mail Address :</label>
                  <input type="email" class="form-control" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  value= <?php echo $donnees['email'] ?> required>
                </div>

                <div class="form-group">
                   <label for="Adress">Adress :</label>
                  <textarea name="Address" class="form-control" cols="30" rows="3" value=<?php echo $donnees['address'] ?> required></textarea> 
                </div>

                <div class="form-group">
                   <label for="gender">Gender :</label>
                  <input type="radio" class="form-control" name="gender" value="Male" required> Male 
                  <input type="radio" class="form-control" name="gender" value="Female" required> Female
                </div>


                <div class="form-group">
                   <label for="Phone_Home">Home No :</label>
                  <input type="tel" class="form-control" name="Phone_Home" pattern="[+]{0,1}[0-9]*" maxlength=12 value=<?php echo $donnees['home_tel']?> required>
                </div>

            <div class="form-group">
                   <label for="Phone_Mobile">Mobile No :</label>
                  <input type="tel" class="form-control" name="Phone_Mobile" pattern="[+]{0,1}[0-9]*" maxlength=12 value=<?php echo $donnees['mobile']?> required>
                </div>

            <div class="form-group">
                   <label for="birthday">Date of birth :</label>
                  <input type="date" class="form-control" name="birthday" value=<?php echo $donnees['date_of_birth'] ?> required>
                </div>

                <div class="form-group">
                   <label for="Password">Password :</label>
                  <input type="password" class="form-control" name="Password" value=<?php echo $donnees['password']?> maxlength=20 required>
                </div>

                 <div class="form-group">
                   <label for="End_date">End_date :</label>
                  <input type="date" class="form-control" name="End_date" value=<?php echo $donnees['end_date']?> required>
                </div>


                <button type="submit" class="btn btn-default btn-lg"> Update Member</button>
                
              </form>

            </div>
          </div>
        </div>
      </div>
    </header>


   

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
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Custom scripts for this template -->
    <script src="../../js/grayscale.min.js"></script>


  </body>

</html>
