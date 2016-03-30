<?php
class DB {
	public $bdd;

	private static $_instance = null;

	private function __construct(){
		$this->bdd = new PDO('mysql:host=localhost; dbname=site', 'root', '');

	}
	public function recup($requete, $tableau = array()){
		$requete = $this->bdd->prepare($requete);
		$requete->execute($tableau);
		return $requete->fetchAll();
	}


	public static function getInstance(){
		if (is_null(self::$_instance)){
			self::$_instance = new DB();

		}
		
		return self::$_instance;
	}
}



?>