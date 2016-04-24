<?php 
require_once( $_SERVER['DOCUMENT_ROOT'].'/fantasy/controllers/Controller_Items.php');	
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/header.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/nav.php'); 
?>
							<div class="shop col-md-10">
								<div class="row">

<?php
 				foreach($mesproduits as $item){
	?>
								
									<div class="shop_pictures col-xs-12 col-sm-6 col-md-5">
										<h1><?php echo $item['itemName'];?></h1>
										<a href="/fantasy/index.php?id=<?php echo $item['id']; ?>" ><img class="shop_pictures-img" src="/fantasy/images/<?php echo $item['picture'];?>" alt="<?php $item['itemName'];?>" height="200px"/>
										<div class="shop_price-text">
											<h4><?php echo $item['price'];?> euros</h4>
										</div>
									</div>
								
								
		
	<?php
			}
?>						</div>
					</div>
				</div>
			
		</main>
<?php	
require_once ($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/footer.php'); 	                                                                                          	
?>	