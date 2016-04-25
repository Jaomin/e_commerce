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
							'idItem'=>	$id,
							'itemName'=>$itemName,
							'price'=>$price,
							'quantity'=>$quantity,
							'idu'=>$_SESSION['idu'],
							'ident'=>$_SESSION['ident']
						);
					}
				}
				require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/items/basket.php');
			}
		else{
			$message='veuillez vous connecter!';
			require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/items/basket.php');
		}
	}



	public function deleteBuy($cle){
		var_dump($cle);
		var_dump($_SESSION['panier'][$cle]);
		unset($_SESSION['panier'][$cle]);


	}


	public function total(){
		$total = 0;
		if (isset($_SESSION['panier']) && $_SESSION['panier']['close']){
			return true;
		}
		else{
			return false;
			}
		}
				
			
			
					//je soustrais la quantité de ma table items
	public function substractItem(){
		$substract = new Model_Items();
		$substractItem = $substract -> substract($id, $quantity);
		}		
	}

?>