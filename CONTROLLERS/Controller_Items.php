<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/site/library/database.php');

class Controller_Items{

	public function viewItem($Monid){
	require_once($_SERVER['DOCUMENT_ROOT'].'/site/models/Model_Items.php');
	$produit = new Model_m_Item();
	$monproduit = $produit ->getItem($typeName);
	require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/main.php');
	
	}



	public function viewItems($typeName){
		require_once($_SERVER['DOCUMENT_ROOT'].'/site/models/Model_Items.php');
		$produits = new Model_Items();
		$mesproduits = $produits ->getItems($typeName);
		return $mesproduits;
		
	}


	public function listItems(){
	require_once($_SERVER['DOCUMENT_ROOT'].'/site/models/Model_Items.php');
	$recup = new Model_Model_Items();
	$recup ->getListItems();
	require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/main.php');
	}	
		
		
	}			
	


?>