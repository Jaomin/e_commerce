<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/fantasy/controllers/Controller_basket.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/header.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/nav.php'); 
?>
<link rel="stylesheet" href="/fantasy/views/style/basket.css">
	
		
<?php

if (isset($_GET['action'])){
  if ($_GET['action']=='Voir mes commandes'){ 
		if(!empty($userEstate)){
?>
		<div class="col-md-offset-2 col-md-8">
			<table>
				<tr>
					<th>Meduse</th>
					<th>quantite</th>
					<th>prix unitaire</th>
					<th>total</th>
				</tr>
<?php
			foreach($userEstate as $key => $item){
?>			
		
				<tr>
					<td><p><?php echo $item['itemName']; ?></p></td>
					<td><p><?php echo $item['quantity']; ?></p></td>
					<td><p><?php echo $item['price']; ?></p></td>
					<td><p><?php echo $item['price']* $item['quantity']; ?></p></td>
				</tr>
			
<?php
				}
?>
		</table>
<?php
		}
	}

else{
?>

		<div class="col-md-offset-3 col-md-6">
			<form action ="/fantasy/index.php" method="get">
				<input type ="submit" name="action" value="Voir mes commandes">
			</form>	
		</div>

<?php	
}
}	
?>		
		</div>

<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/footer.php'); 