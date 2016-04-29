﻿<?php 
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'fantasy/controllers/Controller_Connection.php');


?>

<!doctype html>

<html>
	<head>
		<meta charset="utf-8" />
		<title>Fantasy</title>
		<link rel="stylesheet" href="/fantasy/views/style/bootstrap.css">
		<link rel="stylesheet" href="/fantasy/views/style/header.css">
		<link rel="stylesheet" href="/fantasy/views/style/main.css">
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>

<body>
	<div class="container">		
		<header>
			<div class="row">
				<div class="col-md-12">
					<div class="header-connection  col-xs-12 col-sm-8 col-md-3">
							<form action="" method="post">
								<input class="header-button" type="text" name="ident"  placeholder = "Pseudo" >
								<input  class ="header-button" type="password" name="pass" placeholder = "Mot de passe">
								<input class="header-button-ok" type="submit" name="submit" value="ok">
							</form>	
					</div>
					<div class="header-inscription col-xs-3 col-sm-4 col-md-4">					
						<form action ="/fantasy/index.php" method="get">
						<input id="hb3" class="header-button" type ="submit" name="action" value="inscription">
						</form>							
					</div>
					
<?php 
				

				if (!empty($_SESSION['ident'])) {
					echo'<div class="header-session col-xs-6 col-sm-6 col-md-2">';
					echo '<p id="hb2" >Bonjour '.$_SESSION['ident'].'</p>';
					echo'</div>';
					echo '<div class="header-session col-xs-3 col-sm-3 col-md-2">';
					echo '<form action ="" method="post">
					<input id="hb4" class="header-button" type ="submit" name="deconnect" value="deconnexion">
					</form></div>';
					if (isset($_POST['deconnect'])){
					session_destroy();
					}	
				}
				else{
					echo '<div class="header-identification col-xs-12 col-sm-4 col-md-4">';
					if(isset($message)){
					echo $message;}
					echo '</div>';
				}
			
				
?>
				
				<div  class="header-basket col-xs-3 col-sm-3 col-md-1">
					<a class="header-img" href="/fantasy/index.php?module=basket"><img class="header-img" src="/fantasy/images/bag.png" width="80px"/></a>
				</div>
				
			</div>
		</header>

	
		




