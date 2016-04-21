<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/fantasy/controllers/Controller_Items.php');

require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/top_header.php');	
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/header.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/nav.php'); 

if (isset($_GET['id'])){
	$id =intVal($_GET['id']);
	$produit= new Controller_Items();
	$monproduit = $produit->viewItem($id);
	

foreach ($monproduit as $cle => $champs){				
	?>
	<link rel="stylesheet" href="/fantasy/views/style/detail.css">
	<div class="container">
			<div class="detail row">
				<div class="col-lg-12">
					<h4><?php echo $champs['itemName']; ?></h4>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="detail_picture col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-4 col-md-4">
						<img src="/fantasy/images/<?php echo $champs['picture'];?>" width="400px"/>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class=" col xs-12 col-sm-10 col-md-12">
					<h2 class="detail_description_title"><?php echo $champs['description']; ?></h2>
				</div>
			</div>
			
			<div class="row">
				<div class="detail_description_total col-sm-12 col-md-offset-1 col-md-10">
					<p><?php echo $champs['descriptionb']; ?></p>
				</div>
			</div>
			<div class="row">
				<div class="detail_buy_user col-lg-12">
					<div class=" detail_buy_stock_box col-xs-12 col-sm-6 col-md-2">
						<p id="detail_buy_stock"><?php echo $champs['stock']; ?> articles disponibles</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4">
						<p id="detail_buy_price"><?php echo $champs['price']; ?> euros</p>
					</div>
					<div class="detail_buy_button col-xs-12 col-sm-6 col-md-3">
						<form action="/fantasy/views/items/detail.php?action=buy" name="<?php echo $champs['id']; ?>" method = "post">
						<input id="detail_buy_text" type="text" class="form-control" name="quantity" placeholder="Quantite">
					</div>
					<div class="col xs-12 col-sm-6 col-md-3">
						<input id="detail_buy_submit" type="submit" name="submit" value="Ajouter au panier">
						</form>
					</div>
				</div>
			</div>
				


<?php
						if(!empty($message)){
						echo($message);
						}
?>

						</div>	
					</div>
				</div>		
			</div>
		</div>
<?php
	}
}

		$purchase = new Controller_Items();
		$myPurchase = $purchase-> createTrolley();
	

require_once ($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/footer.php'); 	


	?>		