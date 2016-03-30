<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/site/library/database.php');

class Controller_Items{

	public function viewItem($Monid){
	require_once($_SERVER['DOCUMENT_ROOT'].'/site/models/m_items.php');
	$produit = new Model_m_Item();
	$monproduit = $produit ->getItem($typeName);
	require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/main.php');
	}


	public function viewItems($typeName){
		require_once($_SERVER['DOCUMENT_ROOT'].'/site/models/m_items.php');
		$produits = new Model_m_Items();
		$mesproduits = $produits ->getItems($typeName);
		return $mesproduits;
		//require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/main.php');
	}


	public function listItems(){
	require_once($_SERVER['DOCUMENT_ROOT'].'/site/models/m_items.php');
	$recup = new Model_m_Items();
	$recup ->getListItems();
	require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/main.php');
	}	
		
		
	}			
	


?>