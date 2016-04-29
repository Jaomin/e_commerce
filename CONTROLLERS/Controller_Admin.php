<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/MODELS/Model_Admin.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/MODELS/Model_Items.php');

class Controller_Admin{


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
			
			$add = new Model_Admin();
			$addItem = $add ->addItem($tab);
			require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/administration/addItem.php');										
		}
		else{
			$message = 'veuillez remplir tous les champs';
			require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/administration/addItem.php');	
			return $message;
			}
		}
	


	public function modifyItem(){

		if (!empty($_POST['type']) && !empty($_POST['typeName']) && !empty($_POST['itemName']) && !empty($_POST['description'])
			&& !empty($_POST['descriptionb']) && !empty($_POST['price']) && !empty($_POST['stock'])) {  
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
				
			$item = new Model_Admin();
			$update = $item -> updateItem($tab, $tab['itemName']);
			
		}
		require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/administration/administration.php');
		
	
	}

//DELETE
	public function listAllTypeNamesDel(){
	$type = new Model_Admin();
	$mytype = $type -> allTypeName();
	require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/administration/deleteItem.php');
	

	}
	public function showItemsDel($typeName){
		$produits = new Model_items();
		$chooseItem = $produits ->getItems($typeName);
		require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/administration/deleteItem.php');
		
	}
	
	public function deleteItems(){
		if(isset($_POST['choose']) && isset($_POST['delete'])){
    	$nom = $_POST['choose'];
		$del = new Model_Admin();
		$delete = $del-> deleteItem($nom);
		require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/administration/administration.php');
	}

}

//MODIFY
		public function showItems($typeName){
		$produits = new Model_items();
		$chooseItem = $produits ->getItems($typeName);
		require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/administration/modifyItem.php');
		
	}
	public function listAllTypeNames(){
	$type = new Model_Admin();
	$mytype = $type -> allTypeName();
	require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/administration/modifyItem.php');
	

	}
	//return the placeholder to increase the visibility for the admin
	public function placeItem($nom){
		$produit = new Model_Admin();
		$modProduct = $produit ->positionItem($nom);
		require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/administration/modifyItem2.php');
		
		}
}

?>