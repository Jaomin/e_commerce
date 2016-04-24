<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/fantasy/controllers/Controller_Items.php');	
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/header.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/nav.php'); 

foreach ($monproduit as $cle => $champs){				
	?>
	<link rel="stylesheet" href="/fantasy/views/style/detail.css">
				<div class="detail col-md-10">
					<form action ="" method="post" name="add">
						<div class="detail_picture col-xs-12 col-sm-10 col-md-12">
							<h1 ><?php echo $champs['itemName']; ?></h1>
							<img class= "detail_picture-img" src="/fantasy/images/<?php echo $champs['picture'];?>" width="600px" />
						</div>
						<div class="row">
							<div class=" col xs-12 col-sm-10 col-md-12">
								<h3 class="detail_description_title"><?php echo $champs['description']; ?></h3>
								<p class="detail_description_total" ><?php echo $champs['descriptionb']; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="detail_buy_user col-md-12">
								<div class="detail_buy_stock_box col-xs-12 col-sm-6 col-md-4">
									<p id="detail_buy_stock"><?php echo $champs['stock']; ?> articles disponibles</p>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-3">
									<p id="detail_buy_price"><?php echo $champs['price']; ?> euros</p>
								</div>
								<div class="detail_buy_button col-xs-12 col-sm-6 col-md-2">
									<input id="detail_buy_text" type="text" class="form-control" name="quantity" placeholder="Quantite">
								</div>
								<div class="detail_buy_submit col xs-12 col-sm-6 col-md-3">			
									<input  class="" type ="submit" name="add" value="Ajouter">						
								</div>
							</div>
						</div>
					</div>
				</form>
			

<?php
					
	
	if (isset($_POST['add']) && !empty ($_POST['quantity'])){
		$item=$champs['id'];
		$quantity=$_POST['quantity'];
		var_dump($quantity);
		var_dump($item);
		$buy=new controller_Items($item);
		$buyitem=$buy-> createTrolley ($item, $quantity);

	}
}


require_once ($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/footer.php'); 	


	?>		