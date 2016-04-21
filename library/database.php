<?php
class DB {
	public $bdd;

	private static $_instance = null;

	private function __construct(){
		$this->bdd = new PDO('mysql:host=localhost; dbname=site', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

	}
	public function recup($requete, $tableau = array()){
		$requete = $this->bdd->prepare($requete);
		$requete->execute($tableau);
		return $requete->fetchAll();
	}

	public function req($requete){
		$requete = $this->bdd->prepare($requete);
		$requete->execute($requete);
		return $requete->fetch();
	}

	public static function getInstance(){
		if (is_null(self::$_instance)){
			self::$_instance = new DB();

		}
		
		return self::$_instance;
	}
}



?>