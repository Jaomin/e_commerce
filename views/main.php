<?php 
require_once( $_SERVER['DOCUMENT_ROOT'].'/fantasy/controllers/Controller_Items.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/top_header.php');	
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/header.php'); 


if (isset($_GET['page'])){
		$typeName = strVal($_GET['page']);
		require_once( $_SERVER['DOCUMENT_ROOT'].'/fantasy/controllers/Controller_Items.php');
		$produits= new Controller_Items();
		$mesproduits = $produits -> viewItems($typeName);
	}

?>

		<main>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
					<?php require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/nav.php'); ?>
					<div class="col-md-11">
				
<?php
	
 				foreach($mesproduits as $item){
	?>
			
										
							<div class=" shop_pictures col-xs-12 col-sm-6 col-md-2">
								<h4><?php echo $item['itemName'];?></h4>
								<a href="/fantasy/views/items/detail.php?id=<?php echo $item['id']; ?>" ><img class="shop_pictures-img" src="/fantasy/images/<?php echo $item['picture'];?>" alt="<?php $item['itemName'];?>" height="220x" width="250px"/>
								<p class="shop_price_text"><?php echo $item['price'];?> euros</p>								
							</div>		
		
	<?php
		
		
			}
		
	

?>					</div>
					</div>
				</div>
			</div>
		</main>
<?php	
require_once ($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/footer.php'); 	                                                                                          	
?>	