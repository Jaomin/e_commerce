<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/models/model_basket.php');


	class controller_basket {
/**
*This function check  first at all if the user is connected.
*two, it compares the quantity required with the stock of the shop.
*three, if the basket has already been created, the function check if the item is already order and the add the quantity wanted, else add the item.
*four, calcul the amount of each purchase.
*/
	public function manageTrolley($quantity, $id, $price, $itemName, $stock){

			if(!empty($_SESSION['ident'])){
				if ($quantity<=$stock){
					$itemFound = false;
					if(!empty($_SESSION['panier'])){
							foreach ($_SESSION['panier'] as $cle => $item) {
								if ($id == $item['idItem']){
									$_SESSION['panier'][$cle]['quantity'] += $quantity;
									$itemFound = true;
								}
							}
						}

					if ($itemFound == false){
						$_SESSION['panier'][] = array(
							'idItem'=>$id,
							'itemName'=>$itemName,
							'price'=>$price,
							'quantity'=>$quantity,
							'idu'=>$_SESSION['idu'],
							'ident'=>$_SESSION['ident'],
							
						);
				
				}
				$montant=0;
					foreach ($_SESSION['panier'] as $key => $price){
						$montant=  $montant + $price['price']*$price['quantity'];
						require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/items/basket.php');	
					}
				
			}
	}
}
	
/**
* the user can get items out of his basket.
*/	
	public function deleteBuy($cle){
		unset($_SESSION['panier'][$cle]);
		require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/items/basket.php');
	}

	
/**
* When the purchase is validate, the quantity of items are get out of stocks.
*/

	public function substractItem(){
		foreach($_SESSION['panier'] as $key=>$item){
			$id= $item['idItem']; 
			$quantity = $item['quantity'];
			$substract = new Model_basket();
			$substractItem = $substract -> substract($id, $quantity);
		}	
		}
/**
*after validation of the order, the table achats is filled in.
*/
	public function fullBasket(){
		foreach($_SESSION['panier'] as $key=>$item){
			$idItem= $item['idItem']; 
			$itemName= $item['itemName'];
			$quantity= $item['quantity']; 
			$price= $item['price']; 
			$idu = $_SESSION['idu'];
			$full=new Model_basket();
			$full-> delivery($idItem, $itemName, $price, $quantity, $idu);
			unset($_SESSION['panier'][$key]);

	}
	require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/items/basket.php');	
	}

/**
* the user has the possibility to have a look in all his old orders.
*/
	public function showEstate(){
		if (!empty($_SESSION['idu'])){
		$idu = $_SESSION['idu'];
		$estate= new Model_basket();
		$userEstate = $estate -> getEstate($idu);
		require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/connection/compteUtilisateur.php');	
		}
		
	}
}

?>