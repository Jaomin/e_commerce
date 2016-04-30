<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/fantasy/controllers/Controller_basket.php');	
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/header.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/nav.php'); 
?>
<link rel="stylesheet" href="/fantasy/views/style/basket.css">
	<div class="col-md-9">
<?php		
if(!empty($_SESSION['panier'])){ 
	?>

		
			<form action="/fantasy/index.php" name="deleteBuy" method="get">
				<table>
					<tr>
						<th>Nom</th>
						<th>Quantite</th>
						<th>Prix</th>
						<th>Total/méduse</th>
					</tr>

		<?php
foreach($_SESSION['panier'] as $cle => $item){
 ?>
 			<tr>
 				<td><h2><?php echo $item['itemName']; ?></h2></td> 
			 	<td><h4><?php echo $item['quantity']; ?></h4></td> 
			 	<td><p><?php echo $item['price']; ?></p></td> 
			 	<td><h4><?php echo $item['price']* $item['quantity']; ?></h4></td> 

			 	<td> 
			 		<input type = "submit" name= "deleteBuy" value="delete">
		 			<input type = "hidden" name= "deleteBuy" value="<?php echo $cle;?>">
		 		</td>
			</tr>
	 		
	 
 <?php
 }


?>	
				</table>		
			</form>
			<div class="row">
				<div class=" col-md-offset-7 col-md-5">
					<h1>TOTAL : <?php 
					$montant = 0;
					foreach ($_SESSION['panier'] as $key => $price){
						$montant =  $montant + $price['price']*$price['quantity'];}

					echo $montant;?></h1>
				</div>
				<div class ="buy col-md-offset-9 col-md-2">
					<form action ="/fantasy/index.php?" method="get" name="buy">
						<input type ="submit" name="validate" value="Valider le panier">
					</form>
				</div>
			</div>
		</div>
	</div>
		
<?php
}
else{
	?>
		<div class=" hidden col-md-9">
		</div>

<?php
}
require_once ($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/footer.php'); 
?>