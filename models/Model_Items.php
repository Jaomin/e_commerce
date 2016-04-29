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


	public function navi(){
		$req = ("SELECT * FROM categories");
		$tab = array();
		$result = $this->db->recup($req, $tab);
		return $result;
	}

	
}

	
?>