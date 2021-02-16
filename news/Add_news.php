<!DOCTYPE html>
<html>
<head>
<head>
	<meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
</head>
</head>
<body>
	<h1>News importation :</h1>
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$errors = array(); // for recording the errors
            }


///////////////////////////////////////////////////////////////////////////////////////////////

    try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=GYM;charset=utf8', 'root', 'root');
		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
        }
        
        $N = (int) $_POST["Title"];
         $reponse = $bdd->query("SELECT Title, text, picloc FROM news WHERE Title = $N ");
        
        if(empty(strip_tags($_POST['Title']))) {
			$errors[] = 'You forgot to enter your Title.';
            }

  //          if ($_POST['Title']= $reponse->fetch()){
//				$errors[] = 'Title already used.';
//			}	
                 else {
			$Title = strip_tags($_POST['Title']); }
            
            if (empty ($_POST['Text'])){
                $Text = '';}

			else $Text =  strip_tags($_POST['Text']);
           
            if ($_FILES['Myfile']['error'] > 0) $errors[] = 'Error of uploading';
            $maxsize = 1048576;
            if ($_FILES['Myfile']['size'] > $maxsize) $errors[] = "Size of the picture is too big";

            $extensions_valides = array( 'jpg' , 'jpeg' , 'png' );
            //1. strrchr renvoie l'extension avec le point (« . »).
            //2. substr(chaine,1) ignore le premier caractère de chaine.
            //3. strtolower met l'extension en minuscules.
            $extension_upload = strtolower(  substr(  strrchr($_FILES['Myfile']['name'], '.')  ,1)  );
            if ( in_array($extension_upload,$extensions_valides) ) echo "";
            else $errors[] = 'Extension incorrect.';

            if(empty($errors)) {
            $nom = "pic/{$_POST['Title']}.{$extension_upload}";
			$id_img=str_replace(' ','',$nom);
            $resultat = move_uploaded_file($_FILES['Myfile']['tmp_name'],$id_img);
			}


            
///////////////////////////////////////////////////////////////////////////////////////////////


	if(empty($errors)) {
	
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=GYM;charset=utf8', 'root', 'root');
		}
		catch (Exception $e)
		{
		    die('Erreur : ' . $e->getMessage());
		}
		
///////////////////////////////////////////////////////////////////////////////////////////////



		$req=$bdd->prepare('INSERT INTO news(Title, text, picloc, news_date) VALUES(:Title,  :text, :picloc, NOW())');
		$req->execute(array(
		'Title'=>$Title,
		'text'=>$Text,
		'picloc'=>$id_img
        ));
        

///////////////////////////////////////////////////////////////////////////////////////////////
	

		if($req) { // if the query ran successfully

			header ('location: success.html');

			} else {
			echo 'Error! '.mysqli_error($db_connection);
			}
		
		$req->closeCursor();
	}
		
		
		else { // print each error.
			echo "<h2>Error!</h2> <h3>The following error(s) occurred:</h3>";
			foreach ($errors as $msg) {
			echo "- $msg <br/>";
			}
		}

	
    ?>
    
    

</body>
</html>