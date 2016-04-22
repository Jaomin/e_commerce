<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/library/database.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/MODELS/Model_Admin.php');


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
		}else{
			$message = 'veuillez remplir tous les champs';
			return $message;
		}
		require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/administration.php');
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
		
	
	}

	public function deleteItems($nom){
		$del = new Model_Admin();
		$delete = $del-> deleteItem($nom);
		require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/administration.php');
	}

}

?>