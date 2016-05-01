<?php
require_once($_SERVER['DOCUMENT_ROOT'].'fantasy/library/database.php');



class Model_Admin{
	private $db;

	public function __construct(){
		$this->db=DB::getInstance();
	}
/**
* function which add the item in the database
*/		
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

/**
* function which modify the item in the database
*/		
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
/**
* function which delete the item in the database
*/		
	public function deleteItem($nom){
		$req = "DELETE FROM items WHERE itemName = :nom";
		$tableau =array(
		'nom'=>$nom
		);
		$resultat = $this->db->recup($req, $tableau);
		 return $resultat;
	}
/**
* function which substract the quantity in the database after validation of the trolley
*/		
	public function substract($id, $quantity){
		$req = "UPDATE items SET stock= stock-$quantity WHERE id = $id; ";
		$resultat = $this ->db->recup($req);

		 return $resultat;
	}
	public function allTypeName(){
		$req= ("SELECT * FROM categories ORDER BY name;");
		$tableau=array();
		$resultat=$this->db->recup($req,$tableau);
		return $resultat;
	}
/**
* function which the entire description of the item before updating it 
*/		
	public function positionItem($nom){
		$req = ("SELECT * FROM items WHERE itemName=:nom");
		$tableau =array(
		'nom'=>$nom);
		$resultat =$this->db->recup($req, $tableau);
		//var_dump($resultat);
		return $resultat;
		
	}

/**
*function made for the administrator who wants to modify an Item. It represents the list of all of them
*/
	public function findItem($nom){
		$req = ("SELECT * FROM items WHERE nom=:nom;");
		$tableau =array(
		'nom'=>$nom
		);
		$resultat =$this->db->recup($req, $tableau);
		return $resultat;

	}
	
}