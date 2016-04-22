<?php
require_once($_SERVER['DOCUMENT_ROOT'].'fantasy/library/database.php');



class Model_Admin{
	private $db;

	public function __construct(){
		$this->db=DB::getInstance();
	}
		
	public function addItem($tab){

		

		$requete = "INSERT INTO items (type, typeName, itemName, description, descriptionb,
		price, stock, picture)
		VALUES (:type, :categorie, :nom, :description, :descriptionb, :prix, :quantite, :picture);";
		$tableau = array(
			"type" => $tab['type'],
			"categorie" => $tab['categorie'],
			"nom" => $tab['nom'],
			"description" => $tab['description'],
			"descriptionb" => $tab['descriptionb'],
			"prix" => $tab['prix'],
			"quantite" => $tab['quantite'],
			"picture" => $tab['picture']
		);
		$resultat = $this->db->recup($requete, $tableau);
	
		
	}


	public function updateItem($tab, $itemName){
		$req = "UPDATE items SET type = :type, typeName = :typeName, itemName=:itemName, description = :description, descriptionb = :descriptionb,
		 price = :price , stock = :stock, picture = :picture WHERE itemName = :itemName";
		
		 $tableau =array(
		 	"type" => $tab['type'],
		 	"typeName" => $tab['typeName'],
			"itemName" => $tab['itemName'],
			"description" => $tab['description'],
			"descriptionb" => $tab['descriptionb'],
			"price" => $tab['price'],
			"stock" => $tab['stock'],
			"picture"=> $tab['picture']

		 	);
		 $resultat = $this->db->recup($req, $tableau);
		
	}

	public function deleteItem($nom){
		var_dump($nom);
		$req = "DELETE FROM items WHERE itemName = :nom";
		$tableau =array(
		'nom'=>$nom
		);
		$resultat = $this->db->recup($req, $tableau);
		 return $resultat;
	}

	public function substract($id, $quantity){
		$req = "UPDATE items SET stock= stock-$quantity WHERE id = $id; ";
		$resultat = $this ->db->recup($req);

		 return $resultat;

	}

	
	
}