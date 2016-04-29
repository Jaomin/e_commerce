<?php
class Model_Basket {
	private $db;

	public function __construct(){
		$this->db=DB::getInstance();
	}
	
	public function substract($id, $quantity){
		$req = "UPDATE items SET stock= stock-$quantity WHERE id = $id; ";
		$resultat = $this ->db->recup($req);
		return $resultat;

	}
	public function delivery($idItem, $itemName, $price, $quantity, $idu){
		$requete = "INSERT INTO achats (idItem, itemName, price, quantity, idu)
		VALUES (:idItem, :itemName, :price, :quantity, :idu);";
		$tableau = array(
			"idItem" => $idItem,
			"itemName" => $itemName,
			"price" => $price,
			"quantity" => $quantity,
			"idu" => $idu
		);
		$resultat = $this->db->recup($requete, $tableau);
	

	}
			
	}

?>
