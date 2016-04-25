<?php
class Model_Basket {
	
	public function substract($id, $quantity){
		$req = "UPDATE items SET stock= stock-$quantity WHERE id = $id; ";
		$resultat = $this ->db->recup($req);
		return $resultat;

	}

		
	}

?>
