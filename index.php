
<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/fantasy/controllers/Controller_Items.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/controllers/Controller_Connection.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/controllers/Controller_Admin.php');	
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/header.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/nav.php'); 

/**
 * permit to connect the user who wants to buy something or the administrator. Redirect him in the administration page
 */
if (!empty($_POST['ident'])&& !empty($_POST['pass'])){  
    $connect= new Controller_Connection();
    $connection = $connect->checkIdentExists();
	}

/**
* permit to get the items by typeName to navigate un the website
*/
if (isset($_GET['page'])){
		$typeName = strVal($_GET['page']);
		require_once( $_SERVER['DOCUMENT_ROOT'].'/fantasy/controllers/Controller_Items.php');
		$produits= new Controller_Items();
		$mesproduits = $produits -> viewItems($typeName);
	}
/**
* permit to get a detailed view of the item selected
*/
if (isset($_GET['id'])){
	$id =intVal($_GET['id']);
	require_once( $_SERVER['DOCUMENT_ROOT'].'/fantasy/controllers/Controller_Items.php');
	$produit= new Controller_Items();
	$monproduit = $produit->viewItem($id);
}

if (isset($_GET['action'])){


	if ($_GET['action']=='modify'){
	 $type=new Controller_Admin();
 	$mytype = $type-> listAlltypeNamesDel();	
	}


/**
* permit to inscribe in the site to be able to navigate as admin or ident.
*/
	if ($_GET['action']=='inscription'){  
		$inscribe= new Controller_Connection();
	    $inscription = $inscribe->addUser();
	}
	

	if($_GET['action']=='ajouter'){
		$purchase = new Controller_Items();
		$myPurchase = $purchase->createTrolley();
	}
}
/**	
*the administrator choose the action he wants to make on the website
*/
if(isset($_POST['select'])&& isset($_POST['choice'])) {
   $select = ($_POST['choice']);
    if ($select == 1){ 
    require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/administration/addItem.php');     

  }    
   else if ($select == 2) { 
   	$type=new Controller_Admin();
 	$mytype = $type-> listAlltypeNames();
 	require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/administration/modifyItem.php'); 
 		
    }
       
    else if ($select == 3) { 
    $type=new Controller_Admin();
 	$mytype = $type-> listAlltypeNamesDel();
    require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/administration/deleteItem.php'); 
  }        
}


if(isset($_POST['listType']) && isset($_POST['find'])){
	$typeName= $_POST['listType'];
	
	$choose= new controller_Admin();
	$chooseItem = $choose->showItems($typeName);
    require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/administration/modifyItem.php'); 

}

if(isset($_POST['choose']) && isset($_POST['update'])){
    $nom = $_POST['choose'];
    $product = new Controller_Admin();
    $modProduct = $product->placeItem($nom);
    require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/administration/modifyItem.php'); 

}

if (isset($_POST['modifyItem'])){
	 $mod= new Controller_Admin();
     $message = $mod->modifyItem();
} 


if(isset($_POST['addItem'])){
	 $add= new Controller_Admin();
     $message = $add->addItem();
}


/**
*delete page
*/

if (isset($_POST['delete'])){	
	$product = new Controller_Admin();
	$delProduct = $product->deleteItems();
}


/*if(isset($_POST['listType'])){
    $typeName= $_POST['listType'];
    var_dump($typeName);
    $choose= new controller_Admin();
    $chooseItem = $choose->showItems($typeName);
}*/

 require_once ($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/footer.php'); 
 ?>
 		
	