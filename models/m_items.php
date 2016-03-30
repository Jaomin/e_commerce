<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/site/library/database.php');

class Model_m_Items{

	private $db;

	public function __construct(){
		$this->db = DB::getInstance();

	}
	public function getItem($monid){
		$req = $bdd->prepare("SELECT * FROM items WHERE id=:id");
		$tableau =array(
		'typeName'=>$typeName);
		$resultat =$this->db->recup($requete_sql, $tableau);
		return $resultat;
		var_dump($resultat);
	}


	public function getItems($typeName){
		//$req = $bdd->prepare("SELECT * FROM items WHERE typeName=:typeName");
		$req = "SELECT * FROM items WHERE typeName=:typeName";
		$tableau =array(
		'typeName'=>$typeName);
		$resultat =$this->db->recup($req, $tableau);
		return $resultat;
		//var_dump($resultat);		
		}

		
	public function getlistItem(){
		$requete_sql =("SELECT * FROM items ");
		$tableau =array(
			);
		$resultat =$this->db->recup($requete_sql);
		return $resultat;
		//var_dump($resultat);
		
	}
	public function addItem(){
	if(!empty($_POST['type']) && !empty($_POST['typeName'])&& !empty($_POST['itemName']) 
	&& !empty($_POST['description']) && !empty($_POST['price'])&& !empty($_POST['stock']) 
	&& !empty($_POST['picture']) && isset($_POST['valider'])){
		
		$type = htmlspecialchars($_POST['type']);
		$typeName = htmlspecialchars($_POST['typeName']);
		$itemName = htmlspecialchars($_POST['itemName']);
		$description = htmlspecialchars($_POST['description']);
		$price = htmlspecialchars($_POST['price']);
		$stock = htmlspecialchars($_POST['stock']);
		$picture = htmlspecialchars($_POST['picture']);

		$requete = $bdd -> prepare("INSERT INTO items (type, typeName, itemName, description, 
		price, stock, picture)
		VALUES (:type, :typeName, :itemName, :description, :price, :stock, :picture); ");
		$requete -> execute(array(
			'type'=>$type,
			'typeName'=>$typeName,
			'itemName'=> $itemName,
			'description'=>$description,
			'price'=>$price,
			'stock'=>$stock,
			'picture'=>$picture));
		$success = true;
	}
	}
}
	
?>