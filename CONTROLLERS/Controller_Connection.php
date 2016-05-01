<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/MODELS/Model_Connection.php');

class Controller_Connection{

/**
* recover inscription posts.prepare the array which is going to besubmitted to the database after 2 checkings:
*@param $verif->ident has to be unique 
*pass and pass-test have to be same.
*/
	public function addUser(){

		if(!empty($_POST)){
			if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['naissance']) 
		    &&!empty($_POST['ident']) &&!empty($_POST['pass']) && !empty($_POST['pass-test'])
		    && !empty($_POST['adresse']) && !empty($_POST['postal']) && !empty($_POST['ville']) 
		    && !empty($_POST['mail'])) {
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
			
			    	$check = new Model_Connection();
			    	$verif = $check -> isIdentExists($tab['ident']);

			    		if (empty($verif)){

					    	if($tab['pass']==$tab['pass-test']){
								$inscribe = new Model_Connection();
								$inscription = $inscribe ->getInscribe($tab);
								$_SESSION['ident'] = $tab['ident'];
								require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/header.php');
								return $_SESSION;
								}
					
							else{
								$message = 'Les mots de passe saisis sont differents';
								require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/connection/inscription.php');
								return $message;					
								}
							}
						
					}
			}
		else{
			require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/connection/inscription.php');
			}
	}

/**
*When the user wants to connect, @param $userok check the existence of the ident and if it is associated whith the pass.
*if user is identified, this function choose which kind of session is required. if it's an admin session, the user is orientated 
*to the back office of the website.
*/
	public function checkIdentExists(){

		if(!empty($_POST['ident']) && (!empty($_POST['pass']) && isset($_POST['submit']))) {
		$tab =array(
			'ident' => htmlspecialchars($_POST['ident']), 
			'pass' => sha1($_POST['pass'])
			);	
			$user = new Model_Connection();
			$userOk = $user ->getConnection($tab);
			if (!empty($userOk)){
				if ($userOk[0]['admin'] == 1){
					$_SESSION['admin'] = $userOk[0]['admin'];
					require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/administration/administration.php');
					$_SESSION['ident']= $_POST['ident'];
					$_SESSION['idu'] = $userOk[0]['idu'];

				}
				else{
				$_SESSION['ident'] = $_POST['ident'];
				$_SESSION['idu'] = $userOk[0]['idu'];
				}
			}
			else {
				$message ='identifiant ou mot de passe incorrect';
				require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/header.php');
			}
		
		}
	}
/**
*the function get message recover the messages in the database.
*/
	public function getMessage(){
		if (!empty($_POST['nom']) && !empty($_POST['prenom'] && !empty($_POST['mail']) && !empty($_POST['message'])) ){
			$tab = array(
				'name' => htmlspecialchars($_POST['nom']),
				'firstName' => htmlspecialchars($_POST['prenom']),
				'mail'=> htmlspecialchars($_POST['mail']),
				'message' => htmlspecialchars($_POST['message'])
				);
				$recover = new Model_Connection();
				$recoverMessage = $recover->recoverMessage($tab);
				echo 'message envoyé';
				require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/connection/contact.php');
		}
		else{
			require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/connection/contact.php');

		}
	}
	
}
?>
