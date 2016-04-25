<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/fantasy/controllers/Controller_Items.php');	
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/header.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/nav.php'); 
?>
	
		<div class="col-md-9">
			<form action="/fantasy/index.php" name="deleteBuy" method="get">
		<?php
foreach($_SESSION['panier'] as $cle => $item){
 ?>

 	
	
	 			<div class= "panier_article col-md-offset-1 col-md-5">
	 				<h4><?php echo $item['itemName'];?> </h4>
	 			</div>
	 			<div class="col-md-3">
	 				<h4><?php echo $item['quantity'];?> </h4>
	 			</div>
	 			<div class="col-md-1">
	 				<input type = "submit" name= "deleteBuy" value="delete">
	 				<input type = "hidden" name= "deleteBuy" value="<?php echo $cle;?>">
	 			</div></br>
	 		
	 
 <?php
 }
?>			</form>
		</div>
	
		
<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/footer.php'); 
?>