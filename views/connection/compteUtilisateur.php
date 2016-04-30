<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/fantasy/controllers/Controller_basket.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/header.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/nav.php'); 
?>
<link rel="stylesheet" href="/fantasy/views/style/basket.css">
	<div class="col-md-9">
		<div class=" orders col-md-offset-4 col-md-4">
			<form action ="/fantasy/index.php" method="get">
				<input type ="submit" name="action" value="Voir mes commandes">
			</form>	
		</div>	
<?php
if (isset($_GET['action'])){
  if ($_GET['action']=='Voir mes commandes'){ 
if(!empty($userEstate)){
?>
		<div class=" col-md-6">
			<table>
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
}
?>
			</table>
<?php
}
}
else {
	echo'pas de commandes!';
}
require_once ($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/footer.php'); 