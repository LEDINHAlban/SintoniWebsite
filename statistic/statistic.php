<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>

	<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=gym;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


$X=0;
$date2 = date("Y-m-d");

$rep = $bdd->query('SELECT * FROM member ORDER BY member_no');
while ($donnees = $rep->fetch())
{
    if(strtotime($donnees['end_date']) < strtotime($date2)) $X++;
}


echo "<h1><center> Expired Memberships : " .$X ."</h1></center><br/>";





/////////////////////////////////////////////////////////////////////////////////////////////////////
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=gym;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$jan=0;$jan1=date('2018-01-01');$jan2=date('2018-01-31');
$feb=0;$feb1=date('2018-02-01');$feb2=date('2018-02-28');
$mar=0;$mar1=date('2018-03-01');$mar2=date('2018-03-31');
$apr=0;$apr1=date('2018-04-01');$apr2=date('2018-04-30');
$may=0;$may1=date('2018-05-01');$may2=date('2018-05-31');
$jun=0;$jun1=date('2018-06-01');$jun2=date('2018-06-30');
$jul=0;$jul1=date('2018-07-01');$jul2=date('2018-07-31');
$aug=0;$aug1=date('2018-08-01');$aug2=date('2018-08-31');
$sep=0;$sep1=date('2018-09-01');$sep2=date('2018-09-30');
$oct=0;$oct1=date('2018-10-01');$oct2=date('2018-10-31');
$nov=0;$nov1=date('2018-11-01');$nov2=date('2018-11-30');
$dec=0;$dec1=date('2018-12-01');$dec2=date('2018-12-31');

$rep = $bdd->query('SELECT * FROM member ORDER BY member_no');
while ($donnees = $rep->fetch())
{
    if(strtotime($donnees['inscription_date']) >= strtotime($jan1)&&strtotime($donnees['inscription_date']) <= strtotime($jan2)) $jan++;
    if(strtotime($donnees['inscription_date']) >= strtotime($feb1)&&strtotime($donnees['inscription_date']) <= strtotime($feb2)) $feb++;
    if(strtotime($donnees['inscription_date']) >= strtotime($mar1)&&strtotime($donnees['inscription_date']) <= strtotime($mar2)) $mar++;
    if(strtotime($donnees['inscription_date']) >= strtotime($apr1)&&strtotime($donnees['inscription_date']) <= strtotime($apr2)) $apr++;
    if(strtotime($donnees['inscription_date']) >= strtotime($may1)&&strtotime($donnees['inscription_date']) <= strtotime($may2)) $may++;
    if(strtotime($donnees['inscription_date']) >= strtotime($jun1)&&strtotime($donnees['inscription_date']) <= strtotime($jun2)) $jun++;
    if(strtotime($donnees['inscription_date']) >= strtotime($jul1)&&strtotime($donnees['inscription_date']) <= strtotime($jul2)) $jul++;
    if(strtotime($donnees['inscription_date']) >= strtotime($aug1)&&strtotime($donnees['inscription_date']) <= strtotime($aug2)) $aug++;
    if(strtotime($donnees['inscription_date']) >= strtotime($sep1)&&strtotime($donnees['inscription_date']) <= strtotime($sep2)) $sep++;
    if(strtotime($donnees['inscription_date']) >= strtotime($oct1)&&strtotime($donnees['inscription_date']) <= strtotime($oct2)) $oct++;
    if(strtotime($donnees['inscription_date']) >= strtotime($nov1)&&strtotime($donnees['inscription_date']) <= strtotime($nov2)) $nov++;
    if(strtotime($donnees['inscription_date']) >= strtotime($dec1)&&strtotime($donnees['inscription_date']) <= strtotime($dec2)) $dec++;
   
}




?>


<center><h1> Member Registration 2018 </h1></center>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<canvas id="no" width="400" height="100"></canvas>
<script>
var ctx = document.getElementById("no").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: { 
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [{
            label: 'Number of registration',
            data: [<?php echo $jan; ?>,  <?php echo $feb; ?>,  <?php echo $mar; ?>,  <?php echo $apr; ?>,  <?php echo $may; ?>,  <?php echo $jun; ?>,  <?php echo $jul; ?>,  <?php echo $aug; ?>,  <?php echo $sep; ?>,  <?php echo $oct; ?>,  <?php echo $nov; ?>,  <?php echo $dec; ?>,  ],
            backgroundColor: [
                'rgba(183, 149, 11, 0.5)'
          
            ],
            borderColor: [
                'rgba(0, 0, 0, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
    



    <?php
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    try
{
    $bdd = new PDO('mysql:host=localhost;dbname=gym;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$xjan=0;$jan1=date('2018-01-01');$jan2=date('2018-01-31');
$xfeb=0;$feb1=date('2018-02-01');$feb2=date('2018-02-28');
$xmar=0;$mar1=date('2018-03-01');$mar2=date('2018-03-31');
$xapr=0;$apr1=date('2018-04-01');$apr2=date('2018-04-30');
$xmay=0;$may1=date('2018-05-01');$may2=date('2018-05-31');
$xjun=0;$jun1=date('2018-06-01');$jun2=date('2018-06-30');
$xjul=0;$jul1=date('2018-07-01');$jul2=date('2018-07-31');
$xaug=0;$aug1=date('2018-08-01');$aug2=date('2018-08-31');
$xsep=0;$sep1=date('2018-09-01');$sep2=date('2018-09-30');
$xoct=0;$oct1=date('2018-10-01');$oct2=date('2018-10-31');
$xnov=0;$nov1=date('2018-11-01');$nov2=date('2018-11-30');
$xdec=0;$dec1=date('2018-12-01');$dec2=date('2018-12-31');


$rep = $bdd->query('SELECT * FROM member ORDER BY member_no');
while ($donnees = $rep->fetch())
{
    if(strtotime($donnees['start_date']) >= strtotime($jan1)&&strtotime($donnees['start_date']) <= strtotime($jan2)) 
    
    {
           if($donnees['offer']==1 && $donnees['familly']==0) $xjan += 120;
        if($donnees['offer']==1 && $donnees['familly']==1) $xjan +=  96;

        if($donnees['offer']==2 && $donnees['familly']==0) $xjan += 200;
        if($donnees['offer']==2 && $donnees['familly']==1) $xjan +=  160;

        if($donnees['offer']==3 && $donnees['familly']==0) $xjan += 300;
        if($donnees['offer']==3 && $donnees['familly']==1) $xjan +=  240;

    }
    if(strtotime($donnees['start_date']) >= strtotime($feb1)&&strtotime($donnees['start_date']) <= strtotime($feb2)) 
    {   if($donnees['offer']==1 && $donnees['familly']==0) $xfeb += 120;
        if($donnees['offer']==1 && $donnees['familly']==1) $xfeb +=  96;

        if($donnees['offer']==2 && $donnees['familly']==0) $xfeb += 200;
        if($donnees['offer']==2 && $donnees['familly']==1) $xfeb +=  160;

        if($donnees['offer']==3 && $donnees['familly']==0) $xfeb += 300;
        if($donnees['offer']==3 && $donnees['familly']==1) $xfeb +=  240;

    }
    
    if(strtotime($donnees['start_date']) >= strtotime($mar1)&&strtotime($donnees['start_date']) <= strtotime($mar2)) 
    {   if($donnees['offer']==1 && $donnees['familly']==0) $xmar += 120;
        if($donnees['offer']==1 && $donnees['familly']==1) $xmar +=  96;

        if($donnees['offer']==2 && $donnees['familly']==0) $xmar += 200;
        if($donnees['offer']==2 && $donnees['familly']==1) $xmar +=  160;

        if($donnees['offer']==3 && $donnees['familly']==0) $xmar += 300;
        if($donnees['offer']==3 && $donnees['familly']==1) $xmar +=  240;

    }
    if(strtotime($donnees['start_date']) >= strtotime($apr1)&&strtotime($donnees['start_date']) <= strtotime($apr2)) 
    {   if($donnees['offer']==1 && $donnees['familly']==0) $xapr += 120;
        if($donnees['offer']==1 && $donnees['familly']==1) $xapr +=  96;

        if($donnees['offer']==2 && $donnees['familly']==0) $xapr += 200;
        if($donnees['offer']==2 && $donnees['familly']==1) $xapr +=  160;

        if($donnees['offer']==3 && $donnees['familly']==0) $xapr += 300;
        if($donnees['offer']==3 && $donnees['familly']==1) $xapr +=  240;

    }
    if(strtotime($donnees['start_date']) >= strtotime($may1)&&strtotime($donnees['start_date']) <= strtotime($may2)) 
    {   if($donnees['offer']==1 && $donnees['familly']==0) $xmay += 120;
        if($donnees['offer']==1 && $donnees['familly']==1) $xmay +=  96;

        if($donnees['offer']==2 && $donnees['familly']==0) $xmay += 200;
        if($donnees['offer']==2 && $donnees['familly']==1) $xmay +=  160;

        if($donnees['offer']==3 && $donnees['familly']==0) $xmay += 300;
        if($donnees['offer']==3 && $donnees['familly']==1) $xmay +=  240;

    }
    if(strtotime($donnees['start_date']) >= strtotime($jun1)&&strtotime($donnees['start_date']) <= strtotime($jun2)) 
    {   if($donnees['offer']==1 && $donnees['familly']==0) $xjun += 120;
        if($donnees['offer']==1 && $donnees['familly']==1) $xjun +=  96;

        if($donnees['offer']==2 && $donnees['familly']==0) $xjun += 200;
        if($donnees['offer']==2 && $donnees['familly']==1) $xjun +=  160;

        if($donnees['offer']==3 && $donnees['familly']==0) $xjun += 300;
        if($donnees['offer']==3 && $donnees['familly']==1) $xjun +=  240;

    }
    if(strtotime($donnees['start_date']) >= strtotime($jul1)&&strtotime($donnees['start_date']) <= strtotime($jul2)) 
    {   if($donnees['offer']==1 && $donnees['familly']==0) $xjul += 120;
        if($donnees['offer']==1 && $donnees['familly']==1) $xjul +=  96;

        if($donnees['offer']==2 && $donnees['familly']==0) $xjul += 200;
        if($donnees['offer']==2 && $donnees['familly']==1) $xjul +=  160;

        if($donnees['offer']==3 && $donnees['familly']==0) $xjul += 300;
        if($donnees['offer']==3 && $donnees['familly']==1) $xjul +=  240;

    }
    if(strtotime($donnees['start_date']) >= strtotime($aug1)&&strtotime($donnees['start_date']) <= strtotime($aug2)) 
    {   if($donnees['offer']==1 && $donnees['familly']==0) $xaug += 120;
        if($donnees['offer']==1 && $donnees['familly']==1) $xaug +=  96;

        if($donnees['offer']==2 && $donnees['familly']==0) $xaug += 200;
        if($donnees['offer']==2 && $donnees['familly']==1) $xaug +=  160;

        if($donnees['offer']==3 && $donnees['familly']==0) $xaug += 300;
        if($donnees['offer']==3 && $donnees['familly']==1) $xaug +=  240;

    }
    if(strtotime($donnees['start_date']) >= strtotime($sep1)&&strtotime($donnees['start_date']) <= strtotime($sep2)) 
    {   if($donnees['offer']==1 && $donnees['familly']==0) $xsep += 120;
        if($donnees['offer']==1 && $donnees['familly']==1) $xsep +=  96;

        if($donnees['offer']==2 && $donnees['familly']==0) $xsep += 200;
        if($donnees['offer']==2 && $donnees['familly']==1) $xsep +=  160;

        if($donnees['offer']==3 && $donnees['familly']==0) $xsep += 300;
        if($donnees['offer']==3 && $donnees['familly']==1) $xsep +=  240;

    }
    if(strtotime($donnees['start_date']) >= strtotime($oct1)&&strtotime($donnees['start_date']) <= strtotime($oct2)) 
    {   if($donnees['offer']==1 && $donnees['familly']==0) $xoct += 120;
        if($donnees['offer']==1 && $donnees['familly']==1) $xoct +=  96;

        if($donnees['offer']==2 && $donnees['familly']==0) $xoct += 200;
        if($donnees['offer']==2 && $donnees['familly']==1) $xoct +=  160;

        if($donnees['offer']==3 && $donnees['familly']==0) $xoct += 300;
        if($donnees['offer']==3 && $donnees['familly']==1) $xoct +=  240;

    }
    if(strtotime($donnees['start_date']) >= strtotime($nov1)&&strtotime($donnees['start_date']) <= strtotime($nov2)) 
    {   if($donnees['offer']==1 && $donnees['familly']==0) $xnov += 120;
        if($donnees['offer']==1 && $donnees['familly']==1) $xnov +=  96;

        if($donnees['offer']==2 && $donnees['familly']==0) $xnov += 200;
        if($donnees['offer']==2 && $donnees['familly']==1) $xnov +=  160;

        if($donnees['offer']==3 && $donnees['familly']==0) $xnov += 300;
        if($donnees['offer']==3 && $donnees['familly']==1) $xnov +=  240;

    }
    if(strtotime($donnees['start_date']) >= strtotime($dec1)&&strtotime($donnees['start_date']) <= strtotime($dec2)) 
    {   if($donnees['offer']==1 && $donnees['familly']==0) $xdec += 120;
        if($donnees['offer']==1 && $donnees['familly']==1) $xdec +=  96;

        if($donnees['offer']==2 && $donnees['familly']==0) $xdec += 200;
        if($donnees['offer']==2 && $donnees['familly']==1) $xdec +=  160;

        if($donnees['offer']==3 && $donnees['familly']==0) $xdec += 300;
        if($donnees['offer']==3 && $donnees['familly']==1) $xdec +=  240;

    }
   
}




?>


<center><h1> Membership Fees Received 2018 (Euro) </h1></center>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<canvas id="noo" width="400" height="100"></canvas>
<script>
var ctx = document.getElementById("noo").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: { 
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [{
            label: 'Fees in euro',
            data: [<?php echo $xjan; ?>,  <?php echo $xfeb; ?>,  <?php echo $xmar; ?>,  <?php echo $xapr; ?>,  <?php echo $xmay; ?>,  <?php echo $xjun; ?>,  <?php echo $xjul; ?>,  <?php echo $xaug; ?>,  <?php echo $xsep; ?>,  <?php echo $xoct; ?>,  <?php echo $xnov; ?>,  <?php echo $xdec; ?>,  ],
            backgroundColor: [
                'rgba(255, 87, 51, 0.5)'
          
            ],
            borderColor: [
                'rgba(0, 0, 0, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
    



<?php
//////////////////////////////////////////////////////////////////////////////////////////////////////		
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=gym;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


$Y=0;
$Z=0;
$F=0;
$S=0;

$repp = $bdd->query('SELECT * FROM not_member ORDER BY first_name');
while ($donnees = $repp->fetch())
{
    if($donnees['yoga'] == 1) $Y++;
     if($donnees['zumba'] == 1) $Z++;
     if($donnees['fitness'] == 1) $F++;
     if($donnees['step'] == 1) $S++; 
}

$rep = $bdd->query('SELECT * FROM member ORDER BY member_no');
while ($donnees = $rep->fetch())
{
    if($donnees['yoga'] == 1) $Y++;
     if($donnees['zumba'] == 1) $Z++;
     if($donnees['fitness'] == 1) $F++;
     if($donnees['step'] == 1) $S++; 
}
/*
echo "number of subscription for yoga courses : ".$Y."<br/>";
echo "number of subscription for Zoumba courses : ".$Z."<br/>";
echo "number of subscription for Fitness courses : ".$F."<br/>";
echo "number of subscription for Step courses : ".$S."<br/>";
$max_course = max($Y, $Z, $F, $S) + 1;
*/

?>

<center><h1> Number of Course's Participant </h1></center>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<canvas id="course" width="400" height="100"></canvas>
<script>
var ctx = document.getElementById("course").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: { 
        labels: ["Yoga", "Zumba", "Fitness", "Step"],
        datasets: [{
            label: 'Courses',
            data: [<?php echo $Y; ?>, <?php echo $Z; ?>, <?php echo $F; ?>, <?php echo $S; ?>, ],
            backgroundColor: [
                'rgba(127, 179, 213, 0.5)',
                'rgba(236, 240, 241, 0.5)',
                'rgba(192, 57, 43, 0.5)',
                'rgba(75, 192, 192, 0.5)'
            ],
            borderColor: [
                'rgba(0, 0, 0,1)',
                'rgba(0, 0, 0, 1)',
                'rgba(0, 0, 0, 1)',
                'rgba(0, 0, 0, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>

<?php



$H=0;
$E=0;
$N=0;
$C=0;



if(file_exists("home.txt")) // check if .txt exist
{
    $compteur_f = fopen("home.txt", 'r'); // open read
    $H = fgets($compteur_f);
}

if(file_exists("contact.txt")) // check if .txt exist
{
    $compteur_f = fopen("contact.txt", 'r'); // open read
    $C = fgets($compteur_f);
}
if(file_exists("event.txt")) // check if .txt exist
{
    $compteur_f = fopen("event.txt", 'r'); // open read
    $E = fgets($compteur_f);
}
if(file_exists("news.txt")) // check if .txt exist
{
    $compteur_f = fopen("news.txt", 'r'); // open read
    $N = fgets($compteur_f);
}



?>

<center><h1> Statistics visited pages </h1></center>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<canvas id="page" width="400" height="100"></canvas>
<script>
var ctx = document.getElementById("page").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: { 
        labels: ["Home", "Event", "News", "Contact mail sends"],
        datasets: [{
            label: 'Pages',
            data: [<?php echo $H; ?>, <?php echo $E; ?>, <?php echo $N; ?>, <?php echo $C; ?>, ],
            backgroundColor: [
                'rgba(127, 179, 213, 0.5)',
                'rgba(236, 240, 241, 0.5)',
                'rgba(192, 57, 43, 0.5)',
                'rgba(75, 192, 192, 0.5)'
            ],
            borderColor: [
                'rgba(0, 0, 0,1)',
                'rgba(0, 0, 0, 1)',
                'rgba(0, 0, 0, 1)',
                'rgba(0, 0, 0, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>



    <?php	
    ////////////////////////////////////////////////////////////////////////////////////////////
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=gym;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


$Male=0;
$Female=0;


$rep = $bdd->query('SELECT * FROM member ORDER BY member_no');
while ($donnees = $rep->fetch())
{
    if($donnees['gender'] == 'Male') $Male++;
     if($donnees['gender'] == 'Female') $Female++;

}

/*
echo "number of subscription for yoga courses : ".$Y."<br/>";
echo "number of subscription for Zoumba courses : ".$Z."<br/>";
echo "number of subscription for Fitness courses : ".$F."<br/>";
echo "number of subscription for Step courses : ".$S."<br/>";
$max_course = max($Y, $Z, $F, $S) + 1;
*/

?>

<center><h1> Member Gender Repartition :  </h1></center>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<canvas id="gender" width="400" height="100"></canvas>
<script>
var ctx = document.getElementById("gender").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: { 
        labels: ["Male", "Female"],
        datasets: [{
            label: 'Gender',
            data: [<?php echo $Male; ?>, <?php echo $Female; ?>,],
            backgroundColor: [
                'rgba(127, 179, 213, 0.5)',
                'rgba(192, 57, 43, 0.5)'         
            ],
            borderColor: [
                'rgba(0, 0, 0,1)',
                'rgba(0, 0, 0,, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>

<?php
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=gym;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$jany=0;$jan1=date('2018-01-01');$jan2=date('2018-01-31');
$feby=0;$feb1=date('2018-02-01');$feb2=date('2018-02-28');
$mary=0;$mar1=date('2018-03-01');$mar2=date('2018-03-31');
$apry=0;$apr1=date('2018-04-01');$apr2=date('2018-04-30');
$mayy=0;$may1=date('2018-05-01');$may2=date('2018-05-31');
$juny=0;$jun1=date('2018-06-01');$jun2=date('2018-06-30');
$july=0;$jul1=date('2018-07-01');$jul2=date('2018-07-31');
$augy=0;$aug1=date('2018-08-01');$aug2=date('2018-08-31');
$sepy=0;$sep1=date('2018-09-01');$sep2=date('2018-09-30');
$octy=0;$oct1=date('2018-10-01');$oct2=date('2018-10-31');
$novy=0;$nov1=date('2018-11-01');$nov2=date('2018-11-30');
$decy=0;$dec1=date('2018-12-01');$dec2=date('2018-12-31');

$rep = $bdd->query('SELECT * FROM quires ORDER BY email');
while ($donnees = $rep->fetch())
{
    if(strtotime($donnees['quires_date']) >= strtotime($jan1)&&strtotime($donnees['quires_date']) <= strtotime($jan2)) $jany++;
    if(strtotime($donnees['quires_date']) >= strtotime($feb1)&&strtotime($donnees['quires_date']) <= strtotime($feb2)) $feby++;
    if(strtotime($donnees['quires_date']) >= strtotime($mar1)&&strtotime($donnees['quires_date']) <= strtotime($mar2)) $mary++;
    if(strtotime($donnees['quires_date']) >= strtotime($apr1)&&strtotime($donnees['quires_date']) <= strtotime($apr2)) $apry++;
    if(strtotime($donnees['quires_date']) >= strtotime($may1)&&strtotime($donnees['quires_date']) <= strtotime($may2)) $mayy++;
    if(strtotime($donnees['quires_date']) >= strtotime($jun1)&&strtotime($donnees['quires_date']) <= strtotime($jun2)) $juny++;
    if(strtotime($donnees['quires_date']) >= strtotime($jul1)&&strtotime($donnees['quires_date']) <= strtotime($jul2)) $july++;
    if(strtotime($donnees['quires_date']) >= strtotime($aug1)&&strtotime($donnees['quires_date']) <= strtotime($aug2)) $augy++;
    if(strtotime($donnees['quires_date']) >= strtotime($sep1)&&strtotime($donnees['quires_date']) <= strtotime($sep2)) $sepy++;
    if(strtotime($donnees['quires_date']) >= strtotime($oct1)&&strtotime($donnees['quires_date']) <= strtotime($oct2)) $octy++;
    if(strtotime($donnees['quires_date']) >= strtotime($nov1)&&strtotime($donnees['quires_date']) <= strtotime($nov2)) $novy++;
    if(strtotime($donnees['quires_date']) >= strtotime($dec1)&&strtotime($donnees['quires_date']) <= strtotime($dec2)) $decy++;
   
}




?>


<center><h1> Quires statics (contact us mail) </h1></center>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<canvas id="queries" width="400" height="100"></canvas>
<script>
var ctx = document.getElementById("queries").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: { 
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [{
            label: 'Number of registration',
            data: [<?php echo $jany; ?>,  <?php echo $feby; ?>,  <?php echo $mary; ?>,  <?php echo $apry; ?>,  <?php echo $mayy; ?>,  <?php echo $juny; ?>,  <?php echo $july; ?>,  <?php echo $augy; ?>,  <?php echo $sepy; ?>,  <?php echo $octy; ?>,  <?php echo $novy; ?>,  <?php echo $decy; ?>,  ],
            backgroundColor: [
                'rgba(183, 149, 11, 0.5)'
          
            ],
            borderColor: [
                'rgba(0, 0, 0, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>

















	
</body>
</html>