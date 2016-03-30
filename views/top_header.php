<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="bootstrap.css">
		 <link rel="stylesheet" href="main.css">
</head>
	<header>
		<div  class="container">
			<div id="top_header"class="row">
				<div class=" col-xs-12 col-md-6 col-lg-5">
						<form action="" method="POST">
							<input type="text" name="identifiant"  placeholder = "NOM">
							<input type="password" name="password" placeholder = "MOT DE PASSE">
							<input type="submit" name="Valider" value="ok">
						</form>	
				</div>
				<div id="thsinscrire" class=" col-md-4 col-lg-5">
					<div class="row">						
						<p><a href="/site/views/inscription.php">S'INSCRIRE</a></p>							
					</div>
				</div>			
				<div id="thpanier" class=" col-md-2 col-lg-2">
					<a href="../index.php">PANIER</a>
				</div>	
			</div>
		<div>

<?php
$bdd = new PDO('mysql:host=localhost; dbname=site', 'root', '');
	if (!empty($_POST['identifiant'])&& (!empty($_POST['password']))){
		$identifiant=htmlspecialchars($_POST['identifiant']);
		$password=sha1($_POST['password']);
	//require_once('models/c_connexion.php');
	//$authentification= getConnexion($identifiant, $password);
		$requete=$bdd-> prepare("SELECT * FROM users WHERE identifiant=:identifiant AND password=:password ;");
		$requete->execute(array(
			'identifiant'=>$identifiant,
			"password"=>$password
		));
	$resultat = $requete->fetch();
	var_dump ($resultat);
	if (!empty($resultat)){
		$_session['user']= $resultat;
		var_dump($resultat);
	}		

	}
	


	

	?>