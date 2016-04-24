<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/library/database.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/MODELS/Model_Items.php');


class Controller_Items{

	

	//permit the navigation
	public function viewItems($typeName){
		$produits = new Model_Items();
		$mesproduits = $produits ->getItems($typeName);
		require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/main.php');
		return $mesproduits;
		
	}
	//permit to have a total description of the item
	public function viewItem($id){
		$produit = new Model_Items();
		$monproduit = $produit ->getItem($id);
		require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/items/detail.php');
		return $monproduit;
	}
	
	//peut servir
	public function listAllItems(){
		$produits = new Model_Items();
		$mesproduits = $produits ->allItems();
		require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/administration/modifyItem.php');
		return $mesproduits;
		
	}
	
	
	

	public function createTrolley($item,$quantity){

			if(!empty($_SESSION['ident'])){
				var_dump($item);
				if(empty($_SESSION['panier'])){
							$check = new Model_items();
							$checkTrolley = $check->checkTrolley();
						}
				if($_POST['quantity'] <= $monproduit[0]['stock']){
					$tab=array(
						'id_item'=> $monproduit[0]['id'],
						'itemName'=> $monproduit[0]['itemName'],
						'quantity'=> $_POST['quantity'],
						'price'=> $monproduit[0]['price'], 
						'id_user'=> $_SESSION['idu']
					);
						
						$add = new Model_items();
						$addproduct = $add-> addPurchase($tab);
						
						}
				else{
					$message = 'commande non effectuée';
					return $message;

					}
				require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/items/panier.php');	
				return $addproduct;
				}
				
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