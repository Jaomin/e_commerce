<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/models/model_basket.php');

	class controller_basket {

	public function createTrolley($quantity, $id, $price, $itemName, $stock){
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
	
	
		
	public function deleteBuy($cle){
		unset($_SESSION['panier'][$cle]);
		require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/items/basket.php');
	}

	
					//je soustrais la quantité de ma table items
	public function substractItem(){
		foreach($_SESSION['panier'] as $key=>$item){
			$id= $item['idItem']; 
			$quantity = $item['quantity'];
			$substract = new Model_basket();
			$substractItem = $substract -> substract($id, $quantity);
		}	
		}

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
}

?>