<?php
require_once($_SERVER['DOCUMENT_ROOT'].'fantasy/library/database.php');



class Model_Connection{
	private $db;

	public function __construct(){
		$this->db=DB::getInstance();
	}

	

	public function getConnection($tab){
		$req= 'SELECT * FROM users WHERE ident=:ident AND pass=:pass';
		$tableau= array(
			'ident' =>$tab['ident'],
			'pass'=>$tab['pass'], 
			);
		$resultat=$this->db->recup($req, $tableau);

		return $resultat;	
		
}



	public function getInscribe($tab){

        $requeteAjout = "INSERT INTO users (surName, name, birth_date, ident, pass, address, postalCode, city, email)
        VALUES(:nom,:prenom,:naissance,:ident,:pass,:adresse,:postal,:ville,:mail);";
        $tab = array(
                "nom" => $tab['nom'],
                "prenom" => $tab['prenom'],
                "naissance"=> $tab['naissance'],
                "ident" => $tab['ident'],
                "pass" => $tab['pass'],
                "adresse" => $tab['adresse'],
                "postal" => $tab['postal'],
                "ville" => $tab['ville'],
                "mail"=> $tab['mail']
                    );
		$resultat= $this->db->recup($requeteAjout, $tab);
		
		 	}

	public function isIdentExists ($ident){

		$req = "SELECT ident FROM users WHERE ident = :ident";
		$tab = array(
			'ident'=> $ident,
			);
		$resultat = $this->db->recup($req, $tab);
		return $resultat;
	}
}
?>