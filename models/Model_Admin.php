<?php
require_once($_SERVER['DOCUMENT_ROOT'].'fantasy/library/database.php');



class Model_Connection{
	private $db;

	public function __construct(){
		$this->db=DB::getInstance();
	}

	public function addItem($tab){

        $requeteAjout = ("INSERT INTO items (type, typeName, itemName, description, descriptionb, price, stock, picture)
        VALUES(:type,:categorie,:nom,:description,:descriptionb,:prix,:stock,:picture);");
        $tab = array(
        		"type" => $tab['type'],
                "categorie" => $tab['categorie'],
                "nom" => $tab['nom'],
                "description"=> $tab['description'],
                "descriptionb" => $tab['descriptionb'],
                "prix" => $tab['prix'],
                "stock" => $tab['stock'],
                "picture" => $tab['picture'],
                    );
		$resultat= $this->db->recup($requeteAjout, $tab);	
		return $resultat;
		
	}

	public function deleteItem(){}
	public function modifyItem(){}
	
}