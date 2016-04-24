<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/library/database.php');

class Model_Items{

	private $db;

	public function __construct(){
		$this->db = DB::getInstance();
	}

	//function which isolate the item choosen to give its complete description
	public function getItem($id){
		$req = ("SELECT * FROM items WHERE id=:id");
		$tableau =array(
		'id'=>$id);
		$resultat =$this->db->recup($req, $tableau);
		return $resultat;
		
	}


	public function allItems(){
		$req=("SELECT * FROM categories INNER JOIN items ON categories.id = items.type ORDER BY itemName ASC");
		$tableau =array();
		$resultat =$this->db->recup($req, $tableau);
		return $resultat;					
}

	//function which permit the navigation	
		public function getItems($typeName){
		$req=("SELECT * FROM categories INNER JOIN items ON categories.id = items.type WHERE typeName=:typeName;");
		$tableau =array(
		'typeName'=>$typeName);
		$resultat =$this->db->recup($req, $tableau);
		return $resultat;	
				
	}


	public function substract($id, $quantity){
		$req = "UPDATE items SET stock= stock-$quantity WHERE id = $id; ";
		$resultat = $this ->db->recup($req);
		return $resultat;

	}

	public function checkTrolley(){
		$req= "CREATE TABLE if not exists panier (
			id INT not null AUTO_INCREMENT, 
			id_item INT (50) not null , 
			itemName VARCHAR (50) not null , 
			quantity INT(50) not null , 
			price INT (90) not null , 
			id_user INT (25) not null , 
			PRIMARY KEY (id))";
}

	public function addPurchase($tab){
		$requete = "INSERT INTO panier (id_item, itemName, quantity, price, id_user)
		VALUES (:id_item, :itemName, :quantity, :price, :id_user);";
		$panier = array(
			"id_item" => $tab['id'],
			"itemName" => $tab['itemName'],
			"quantity" => $tab['quantity'],
			"price" => $tab['price'],
			"id_user" => $_SESSION['idu']
		);
		$resultat = $this->db->recup($requete, $panier);
		return $resultat;
			
		}
	

	
	
		/*$requete = "INSERT INTO panier (id_item, itemName, price, quantity)
		VALUES (:id, :itemName, :price, :quantity);";
		$tableau = array(
			"id" => $_SESSION['panier']['id'],
			"itemName" => $_SESSION['panier']['itemName'],
			"price" => $_SESSION['panier']['price'],
			"quantity" =>$_SESSION['panier']['quantity']	
		);
		$resultat = $this->db->recup($requete, $tableau);
		return $resultat;
	}*/
}

	
?>