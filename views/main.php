<?php 
require_once( $_SERVER['DOCUMENT_ROOT'].'/site/controllers/Controller_Items.php');
?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset="uft-8">

		<title>Fantasy</title>
		<link rel="stylesheet" href="bootstrap.css">
		 <link rel="stylesheet" href="main.css">
	</head>

	<body>
<?php		
require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/top_header.php');	
require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/header.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/nav.php'); 	
?>		
		<main>

			<div class="container">
				<div class="row">
					<div id="table_head" class="col-lg-12">
						<div class="col-lg-offset-4 col-lg-5">
							<h1 id="table_head__describ">DESCRIPTIF</h1>
						</div>
						<div class="col-lg-2">
							<h1 id="table_head__price">PRIX</h1>
						</div>
					</div>
				</div>
<?php
	if (isset($_GET['page'])){
		$typeName = strVal($_GET['page']);
		require_once( $_SERVER['DOCUMENT_ROOT'].'/site/controllers/Controller_Items.php');
		$produits= new Controller_Items();
		$mesproduits = $produits -> viewItems($typeName);

		foreach($mesproduits as $item){
	?>
			
					<div class="row">
						<div class="col-lg-12">					
							<div id="picture" class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
								<img src="../<?php echo $item['picture'];?>" alt="<?php $item['itemName'];?>"/>
							</div>
							<div id="total_description" class=" col-xs-6 col-sm-8 col-md-5 col-lg-5">
								<h2><?php echo $item['itemName'];?></h2>
								<p id="description"><?php echo $item['description'];?></p>		
							</div>
							<div id="descript__price" class="col-xs-2 col-sm-4 col-md-1 col-lg-2">
								<p id="price"><?php echo $item['price'];?> euros</p>
								<form action="" method="post" name= "panier">							
								 	<button type="submit" class="btn btn-default" name="valider"><div class="text_submit">AJOUTER AU PANIER</div></button>
								<form>	
							</div>	
						</div>				
					</div>
		
	<?php
	//}
}
}
?>
			</div>		
		</main>
<?php	
require_once ($_SERVER['DOCUMENT_ROOT'].'/site/views/footer.php'); 		
?>	