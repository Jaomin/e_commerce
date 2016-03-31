<?php
class Controller_Connection{

	public function addUser(){
		
		if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['naissance']) 
	    &&!empty($_POST['ident']) &&!empty($_POST['pass']) && !empty($_POST['pass-test'])
	    && !empty($_POST['adresse']) && !empty($_POST['postal']) && !empty($_POST['ville']) 
	    && !empty($_POST['mail']) && isset($_POST['valider'])) {
		$tab = array(
		'nom'=> htmlspecialchars($_POST['nom']),
        'prenom'=> htmlspecialchars($_POST['prenom']),
        'naissance'=> htmlspecialchars($_POST['naissance']),
       	'ident'=> htmlspecialchars($_POST['ident']),
        'pass'=> sha1($_POST['pass']),
        'pass-test'=> sha1($_POST['pass-test']),
        'adresse'=> htmlspecialchars($_POST['adresse']),
        'postal'=> htmlspecialchars($_POST['postal']),
        'ville'=> htmlspecialchars($_POST['ville']),
        'mail'=> htmlspecialchars($_POST['mail'])
);
    	if ($_POST['pass']== $_POST['pass-test']){  
		require_once($_SERVER['DOCUMENT_ROOT'].'/site/models/Model_Connection.php');
		$inscribe = new Model_Connection();
		$inscription = $inscribe ->getInscribe($tab);
		return $inscription;
		}
	}
	else{
		$messageNotFull ="La totalité du formulaire n'est pas encore remplie";
		require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/inscription.php');
	}
	}

	public function checkIdentExists(){

		if(!empty($_POST['ident']) && !empty($_POST['pass'])) {
			$ident = htmlspecialchars($_POST['ident']);
			$pass = sha1($_POST['pass']);
		require_once($_SERVER['DOCUMENT_ROOT'].'/site/models/Model_Connection.php');
		$user = new Model_Connection();
		$check = $user ->getConnection($ident, $pass);
		if (!empty ($check)){
			$inscription = $inscribe->addUser();
		}
	}
}

	

	public function addAdmin(){
		if(!empty($_POST)){
		var_dump($_POST);
				
				
//je verifie que les données sont correctes
			//	j'insere la bdd

			}
			require_once($_SERVER['DOCUMENT_ROOT'].'site/views/main.php');
		
		
	}
}
