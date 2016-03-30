<?php
require_once($_SERVER['DOCUMENT_ROOT'].'site/library/database.php');

class model_connexion{
	private $db;

	public function __construct(){
		$this->db=DB::getInstance();
	}*/

	
	public function getConnexion($identifiant, $password){
		$requete=$bdd-> prepare('SELECT * FROM users WHERE identifiant=:identifiant AND password=:password ';);
		$requete->execute(array
			'identifiant'=>$identifiant,
			'password'=>$password
		));
	$resultat = $requete->fetch();
	var_dump ($resultat)
	if (!empty($resultat)){
		$_session['user']=$resultat;
		var_dump($resultat);
	}	

else {
		$message_erreur='<p>identifiant ou mot de passe incorrect</p>';}

	}
	

/*if( statut = admin && identifiant =
			password = )
		require_once($_SERVER['DOCUMENT_ROOT'].'site/views/administration.php');

	}
	else {
		echo ('Bonjour'./ name)
	}*/
}
?>