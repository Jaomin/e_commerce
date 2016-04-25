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
		$monProduit = $produit ->getItem($id);
		require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/items/detail.php');
		return $monProduit;
	}
	
	//peut servir
	public function listAllItems(){
		$produits = new Model_Items();
		$mesproduits = $produits ->allItems();
		require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/administration/modifyItem.php');
		return $mesproduits;
		
	}
	
	}
	


?>