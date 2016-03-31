<?php
require_once($_SERVER['DOCUMENT_ROOT'].'site/library/database.php');

class Model_Connection{
	private $db;

	public function __construct(){
		$this->db=DB::getInstance();
	}

	

	public function getConnection($ident, $pass){
		$req='SELECT * FROM users WHERE ident=:ident AND pass=:pass;';
		$tab= array(
			'ident' =>$ident,
			'pass'=>$pass
			);
		$resultat=$this->db->recup($req, $tab);
		//var_dump $resultat;
		return $resultat;
	}
	
	public function getInscribe($tab){

        $requeteAjout = ("INSERT INTO users (surName, name, birth_date, identifiant, password, address, postalCode, city, email)
        VALUES(:nom,:prenom,:naissance,:ident,:pass,:adresse,:postal,:ville,:mail);");
        $tab= (
        array (
                "nom" => $tab['nom'],
                "prenom" => $tab['prenom'],
                "naissance"=> $tab['naissance'],
                "ident" => $tab['ident'],
                "pass" => $tab['pass'],
                "adresse" => $tab['adresse'],
                "postal" => $tab['postal'],
                "ville" => $tab['ville'],
                "mail"=> $tab['mail']
                    ));
$resultat= $this->db->recup($requeteAjout, $tab);
return $resultat;
	}

}
?>