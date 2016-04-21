<?php 
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'fantasy/controllers/Controller_Connection.php');
 


?>


<!DOCTYPE html>

<html>
	<head>
		
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

		<title>Fantasy</title>
		<link rel="stylesheet" href="/fantasy/views/style/bootstrap.css">
		<link rel="stylesheet" href="/fantasy/views/style/top_header.css">
		<link rel="stylesheet" href="/fantasy/views/style/main.css">
	</head>

	<body>
	<header>
		<div  class="container">
			<div class="row">
				<div class="top_header col-lg-12">
					<div class="top_header-connection  col-xs-12 col-sm-8 col-md-4">
							<form action="" method="POST">
								<input class="top_header-button" type="text" name="ident"  placeholder = "NOM" >
								<input class ="top_header-button" type="password" name="pass" placeholder = "MOT DE PASSE">
								<input type="submit" name="submit" value="ok">
							</form>	
					</div>
					<div  class="top_header-inscription col-xs-6 col-sm-4 col-md-2">					
						<form action ="/fantasy/views/connection/inscription.php" method="post">
						<input class="top_header-button" type ="submit" name="inscription" value="inscription">
						</form>							
					</div>
<?php 
				if(empty($_SESSION['ident'])){

					echo '<div class="top_header-identification col-xs-12 col-sm-4 col-md-4">';
					echo '</div>';
				 
				}
				if (!empty($_SESSION['ident'])) {
					echo'<div class="top_header-session col-xs-6 col-sm-6 col-md-2">';
					echo 'Bonjour '.$_SESSION['ident'];
					echo'</div>';
					echo '<div class = "top_header-session col-xs-6 col-md-2">';
					echo '<form action ="" method="post">
					<input id="top_header-button" type ="submit" name="deconnect" value="deconnexion">
					</form></div>';
					if (isset($_POST['deconnect'])){
					session_destroy();
					}	
				else{
					if (!empty($message)){
						echo ($message);
					}
				}
			}
				
				?>
				
				<div  class="top_header-basket col-xs-6 col-sm-6 col-md-1">
					<a class="top_header-img" href="/fantasy/views/items/panier.php"><img class="top_header-img" src="/fantasy/images/bag.png" height="50px"/></a>
				</div>	
			</div>
		</div>
	</div>

		





