<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/library/database.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/MODELS/Model_Items.php');

class Controller_Items{

	//return the placeholder to increase the visibility for the admin
	public function placeItem($nom){
		$produit = new Model_Items();
		$monproduit = $produit ->positionItem($nom);
		require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/items/modifyItem.php');
		return $monproduit;
		}

	//permit the navigation
	public function viewItems($typeName){
		$produits = new Model_Items();
		$mesproduits = $produits ->getItems($typeName);
		require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/main.php');
		return $mesproduits;
		
	}
	
	public function listAllItems(){
		$produits = new Model_Items();
		$mesproduits = $produits ->allItems();
		return $mesproduits;
		
	}
	
	
	public function addItem(){
		if (!empty($_POST['type']) && !empty($_POST['categorie']) && !empty($_POST['nom']) && !empty($_POST['description']) 
        && !empty($_POST['descriptionb']) &&!empty($_POST['prix']) && !empty($_POST['stock']) && !empty($_POST['picture']))
		{  
        	 
		  $tab = array(
            'type'=> htmlspecialchars($_POST['type']),
            'categorie'=> htmlspecialchars($_POST['categorie']),
            'nom'=> htmlspecialchars($_POST['nom']),
            'description'=> htmlspecialchars($_POST['description']),
            'descriptionb'=> nl2br($_POST['descriptionb']),
            'prix'=> htmlspecialchars($_POST['prix']),
            'quantite'=> htmlspecialchars($_POST['stock']),
            'picture'=> htmlspecialchars($_POST['picture'])
          
            );	
			
			$add = new Model_Items();
			$addItem = $add ->addItem($tab);										
		}else{
			$message = 'veuillez remplir tous les champs';
			return $message;
		}
		require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/administration.php');
	}

	public function modifyItem(){

		if (!empty($_POST['type']) && !empty($_POST['typeName']) && !empty($_POST['itemName']) && !empty($_POST['description'])
			&& !empty($_POST['descriptionb']) && !empty($_POST['price']) && !empty($_POST['stock'])) {  
			var_dump($_POST['itemName']);
			$tab = array(
	        'type'=> htmlspecialchars($_POST['type']),
	        'typeName'=> htmlspecialchars($_POST['typeName']),
	        'itemName'=> htmlspecialchars($_POST['itemName']),
	        'description'=> htmlspecialchars($_POST['description']),
	        'descriptionb'=> htmlspecialchars($_POST['descriptionb']),
	        'price'=> htmlspecialchars($_POST['price']),
	        'stock'=> htmlspecialchars($_POST['stock']),
	        'picture'=> htmlspecialchars($_POST['picture'])
	        );
				
			$item = new Model_Items();
			$update = $item -> updateItem($tab, $tab['itemName']);
			echo "Controller_Items in";
		}
		echo "Controller_Items";
		//require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/administration.php');	
	}

	public function deleteItems($nom){
		$del = new Model_Items();
		$delete = $del-> deleteItem($nom);
		require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/administration.php');
	}

	//permit to have a total description of the item
	public function viewItem($id){
		$produit = new Model_Items();
		$monproduit = $produit ->getItem($id);
		require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/items/detail.php');
		return $monproduit;
	}

	public function createTrolley(){

		if (isset($_POST['submit']) && !empty($monproduit) && !empty($_POST['quantity'])){
			if(!empty($_SESSION['ident'])){
				var_dump($monproduit);
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

					}
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