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
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="../../css/grayscale.css" rel="stylesheet">
<body>
<?php
if (isset($_SESSION['numero']) && isset($_SESSION['Password']) && $_SESSION['role']=="staff" || $_SESSION['role']=="admin"){
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=GYM;charset=utf8', 'root', 'root');
		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
		}
		$N = (int) $_POST["numero"];
		$reponse = $bdd->query("SELECT * FROM member WHERE member_no = $N ");

		$C = (int) 0;
		while ($donnees = $reponse->fetch())
		{
			if($donnees['family']==0)
			{
				?>




				<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <!-- Sintoni home button -->
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="../../Home.php">Sintoni Sports Club</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>

      <a class="navbar-brand" href="../dashboard/redirect.php"> | <?php echo $_SESSION['first_name']; ?> |</a>
      <a class="navbar-brand"> | Payment | </a>


            <!-- Login / Logout -->
      <ul class="navbar-nav mr-auto">
        <li class="navbar-item">
          <a class="navlink" href="../../membership/login/logout.php">Logout</a>
        </li>
      </ul>

      </div>
    </nav>
    	<!-- Intro Header -->

      <form action="payment3.php" method="POST">
    <section id="News" class="download-section content-section text-center">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">


            	<label>Offers :</label> 
					<select name="offers" class="custom-select">
					<option value="1">3 months 120€</option>
					<option value="2">6 months 200€</option>
					<option value="3">1 year 300€</option>
					</select>


					<div class="form-group">
                   <label for="start_date">Start Date :</label>
                  <input type="date" class="form-control" name="start_date" value=<?php echo $donnees['start_date']?> required>
                </div>

					<div class="form-group">
                   <label for="End_date">End_date :</label>
                  <input type="date" class="form-control" name="End_date" value=<?php echo $donnees['end_date']?> required>
                </div>

                <button type="submit" class="btn btn-default btn-lg"> Update Payment</button>
                <a href="../dashboard/redirect.php" class="btn btn-default btn-lg">DashBoard</a>
              

                <div class="form-group">
                   <label for="numero">Member number :</label>
                  <input type="text" class="form-control" name="numero" value=<?php echo $donnees['member_no'] ?> READONLY>
                </div>

                <div class="form-group">
                   <label for="First_Name">First Name :</label>
                  <input type="text" class="form-control" name="First_Name" value=<?php echo $donnees['first_name'] ?> maxlength=20 READONLY>
                </div>

                <div class="form-group">
                   <label for="Last_Name">Last Name :</label>
                  <input type="text" class="form-control" name="Last_Name" value=<?php echo $donnees['last_name'] ?> maxlength=20 READONLY>
                </div>

               

                <div class="form-group">
                   <label for="gender">Gender :</label>
                  <input type="text" class="form-control" name="gender" value=<?php echo $donnees['gender'] ?> maxlength=20 READONLY>
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
                   <label for="email">Mail Address :</label>
                  <input type="email" class="form-control" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  value= <?php echo $donnees['email'] ?> READONLY>
                </div>

                <div class="form-group">
                   <label for="Adress">Adress :</label>
                  <input name="Address" value=<?php echo $donnees['address'] ?> class="form-control" READONLY></input>  
                </div>

            <div class="form-group">
                   <label for="Phone_Home">Home No :</label>
                  <input type="tel" class="form-control" name="Phone_Home" pattern="[+]{0,1}[0-9]*" maxlength=12 value=<?php echo $donnees['home_tel']?> READONLY>
                </div>

            <div class="form-group">
                   <label for="Phone_Mobile">Mobile No :</label>
                  <input type="tel" class="form-control" name="Phone_Mobile" pattern="[+]{0,1}[0-9]*" maxlength=12 value=<?php echo $donnees['mobile']?> READONLY>
                </div>

            <div class="form-group">
                   <label for="birthday">Date of birth :</label>
                  <input type="date" class="form-control" name="birthday" value=<?php echo $donnees['date_of_birth'] ?> READONLY>
                </div>

                <div class="form-group">
                   <label for="Password">Password :</label>
                  <input type="password" class="form-control" name="Password" value=<?php echo $donnees['password']?> maxlength=20 READONLY>
                </div>

                
            
      </div>
    </div>
  </div>
</section>
    </form>

				<?php
					
			}else
			{
				?>


				<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <!-- Sintoni home button -->
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="../../Home.php">Sintoni Sports Club</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>

      <a class="navbar-brand" href="../dashboard/redirect.php"> | <?php echo $_SESSION['first_name']; ?> |</a>
      <a class="navbar-brand"> | Payment | </a>


            <!-- Login / Logout -->
      <ul class="navbar-nav mr-auto">
        <li class="navbar-item">
          <a class="navlink" href="../../membership/login/logout.php">Logout</a>
        </li>
      </ul>

      </div>
    </nav>
    	<!-- Intro Header -->

      <form action="payment3.php" method="POST">
    <section id="News" class="download-section content-section text-center">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">


            	<label>Offers :</label> 
					<select name="offers" class="custom-select">
					<option value="1">3 months 96€</option>
					<option value="2">6 months 160€</option>
					<option value="3">1 year 240€</option>
					</select>


					<div class="form-group">
                   <label for="start_date">Start Date :</label>
                  <input type="date" class="form-control" name="start_date" value=<?php echo $donnees['start_date']?> required>
                </div>

					<div class="form-group">
                   <label for="End_date">End_date :</label>
                  <input type="date" class="form-control" name="End_date" value=<?php echo $donnees['end_date']?> required>
                </div>

                <button type="submit" class="btn btn-default btn-lg"> Update Payment</button>
                <a href="../dashboard/redirect.php" class="btn btn-default btn-lg">DashBoard</a>
              

                <div class="form-group">
                   <label for="numero">Member number :</label>
                  <input type="text" class="form-control" name="numero" value=<?php echo $donnees['member_no'] ?> READONLY>
                </div>

                <div class="form-group">
                   <label for="First_Name">First Name :</label>
                  <input type="text" class="form-control" name="First_Name" value=<?php echo $donnees['first_name'] ?> maxlength=20 READONLY>
                </div>

                <div class="form-group">
                   <label for="Last_Name">Last Name :</label>
                  <input type="text" class="form-control" name="Last_Name" value=<?php echo $donnees['last_name'] ?> maxlength=20 READONLY>
                </div>

               

                <div class="form-group">
                   <label for="gender">Gender :</label>
                  <input type="text" class="form-control" name="gender" value=<?php echo $donnees['gender'] ?> maxlength=20 READONLY>
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
                   <label for="email">Mail Address :</label>
                  <input type="email" class="form-control" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  value= <?php echo $donnees['email'] ?> READONLY>
                </div>

                <div class="form-group">
                   <label for="Adress">Adress :</label>
                  <input name="Address" value=<?php echo $donnees['address'] ?> class="form-control" READONLY></input>  
                </div>

            <div class="form-group">
                   <label for="Phone_Home">Home No :</label>
                  <input type="tel" class="form-control" name="Phone_Home" pattern="[+]{0,1}[0-9]*" maxlength=12 value=<?php echo $donnees['home_tel']?> READONLY>
                </div>

            <div class="form-group">
                   <label for="Phone_Mobile">Mobile No :</label>
                  <input type="tel" class="form-control" name="Phone_Mobile" pattern="[+]{0,1}[0-9]*" maxlength=12 value=<?php echo $donnees['mobile']?> READONLY>
                </div>

            <div class="form-group">
                   <label for="birthday">Date of birth :</label>
                  <input type="date" class="form-control" name="birthday" value=<?php echo $donnees['date_of_birth'] ?> READONLY>
                </div>

                <div class="form-group">
                   <label for="Password">Password :</label>
                  <input type="password" class="form-control" name="Password" value=<?php echo $donnees['password']?> maxlength=20 READONLY>
                </div>

                
            
      </div>
    </div>
  </div>
</section>
    </form>


				<?php
				
			}		
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