<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/fantasy/controllers/Controller_Items.php');	
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/header.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/nav.php'); 
	
 foreach($mypurchase as $cle => $item){
 ?>

 	
	 		<div class= "col-md-offset-2 col-md-8">
	 			<div class= "panier_article">
	 				<p> <?php echo $_SESSION['panier']['quantity'];?></p>
	 				<h4> <?php echo $_SESSION['panier']['itemName'];?></h4>
	 				<p> <?php echo $_SESSION['panier']['price'];?></p>
	 				<h2><?php echo $_SESSION['panier']['total']=($_SESSION['panier']['price'])*($_SESSION['panier']['quantity']);?></h2>
	 			</div>
	 		</div>
	 	</div>
	 
 <?php
 }
?>

<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/footer.php'); 
?>