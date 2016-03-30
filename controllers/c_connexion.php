<?php
class Controller_connexion{

	
	public function checkUser(){
		
		require_once($_SERVER['DOCUMENT_ROOT'].'site/models/m_connexion.php');
		$user = new Model_m_connexion();
		$connexion = $user ->getconnexion($monIdentifiant, $mdp);
		require_once($_SERVER['DOCUMENT_ROOT'].'site/views/top_header.php');
	}

	public function addUser(){
	
	
	public function addAdmin(){
		if(!empty($_POST)){
		var_dump($_POST);
				
				
//je verifie que les données sont correctes
			//	j'insere la bdd

			}
			require_once($_SERVER['DOCUMENT_ROOT'].'site/views/main.php');
		
		
	}
}
}