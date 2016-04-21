
<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/fantasy/controllers/Controller_Items.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'fantasy/controllers/Controller_Connection.php');

require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/top_header.php');	
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/header.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/nav.php'); 


if (!empty($_POST['ident'])&& !empty($_POST['pass'])){  
    $connect= new Controller_Connection();
    $connection = $connect->checkIdentExists();
	}

if (isset($_GET['page'])){
		$typeName = strVal($_GET['page']);
		require_once( $_SERVER['DOCUMENT_ROOT'].'/fantasy/controllers/Controller_Items.php');
		$produits= new Controller_Items();
		$mesproduits = $produits -> viewItems($typeName);
	}






if (isset($_GET['inscription'])){ 
if(($_SERVER['REQUEST_METHOD']=='POST')) {
	$inscribe= new Controller_Connection();
    $inscription = $inscribe->addUser();
	}
}


if (isset($_GET['id'])){
	$id =intVal($_GET['id']);
	require_once( $_SERVER['DOCUMENT_ROOT'].'/fantasy/controllers/Controller_Items.php');
	$produit= new Controller_Items();
	$monproduit = $produit->viewItem($id);
}





 require_once ($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/footer.php'); 
 ?>
 		
	