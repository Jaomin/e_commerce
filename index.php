
<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/fantasy/controllers/Controller_Items.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/controllers/Controller_Connection.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/controllers/Controller_Admin.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/controllers/Controller_basket.php');	
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/header.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/nav.php'); 
if (isset($_GET['page']) && $_GET['page'] == "HOME" ){
?>
<script src="http://localhost/fantasy/views/js/jquery.min.js"></script>
<script src="http://localhost/fantasy/views/js/bootstrap.min.js"></script>  
  
  
  <div class="shop col-md-10">
  <div id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li class="item1"></li>
      <li class="item2 active"></li>
      <li class="item3"></li>
      <li class="item4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="/fantasy/images/baltique1.jpg" alt="agneska" width="460" height="345">
        <div class="carousel-caption">
         <p>AGNESKA</p>
        </div>
      </div>


      <div class="item">
        <img src="/fantasy/images/ion1.jpg" alt="yakare" width="460" height="345">
        <div class="carousel-caption">
          <p>YAKARE</p>
        </div>
      </div>
    
      <div class="item">
        <img src="/fantasy/images/meri4 .jpg" alt="zoe" width="460" height="345">
        <div class="carousel-caption">
          <p>ZOE</p>
        </div>
      </div>

      <div class="item">
        <img src="/fantasy/images/ion2 .jpg" alt="jaomin" width="460" height="345">
        <div class="carousel-caption">
          <p>JAOMIN</p>
        </div>
      </div>
  
    </div>
    <script>
$(document).ready(function(){
    // Activate Carousel
    $("#myCarousel").carousel();
    
    // Enable Carousel Indicators
    $(".item1").click(function(){
        $("#myCarousel").carousel(0);
    });
    $(".item2").click(function(){
        $("#myCarousel").carousel(1);
    });
    $(".item3").click(function(){
        $("#myCarousel").carousel(2);
    });
    $(".item4").click(function(){
        $("#myCarousel").carousel(3);
    });
    
    // Enable Carousel Controls
    $(".left").click(function(){
        $("#myCarousel").carousel("prev");
    });
    $(".right").click(function(){
        $("#myCarousel").carousel("next");
    });
});
</script>
</div>
</div>
<?php
}
/**
*NAVIGATION
*permit to get the items by typeName to navigate un the website. the first function should permit a dynamic navigation.
*/
  /*$mytype = new controller_items();
  $mytype -> nav();*/

if (isset($_GET['page'])){
  if ($_GET['page']== 'home'){
   header('location:/fantasy/views/home.php');  
  }
  else{
    $typeName = strVal($_GET['page']);  
    $produits= new Controller_Items();
    $mesproduits = $produits -> viewItems($typeName);
  }
}
  
/**
* permit to get a detailed view of the item selected
*/
if (isset($_GET['id'])){
  $id =intVal($_GET['id']);
  $produit= new Controller_Items();
  $monproduit = $produit->viewItem($id);
}

/**
*CONNEXION
* permit to connect the user who wants to buy something or the administrator. Redirect him in the administration page
*/
if (!empty($_POST['ident'])&& !empty($_POST['pass'])){  
    $connect= new Controller_Connection();
    $connection = $connect->checkIdentExists();
	}


/**
*BASKET
*permit to get a basket page empty
*/
if (!isset($_SESSION['panier'])){
$_SESSION['panier']= array();
}
/*if (isset($_SESSION['panier'])){
  $total=new controller_basket();
  $total-> total();
}*/
if (isset ($_GET['validate'])){
  $manageqty = New Controller_basket();
  $manageqty -> substractItem();
  $full = new Controller_basket();
  $full->fullBasket();

}


/**
* permit to inscribe in the site to be able to navigate as admin or ident.
*/
if (isset($_GET['action'])){
	if ($_GET['action']=='inscription'){  
		$inscribe= new Controller_Connection();
	    $inscription = $inscribe->addUser();
	}
}

/**
*BASKET
* get the information to deal with the basket
*/

if (isset($_GET['quantity'])){
	$stock=intVal($_GET['stock']);
	$quantity = intVal($_GET['quantity']);
	$id=intVal($_GET['idb']);
	$price=intVal($_GET['price']);
	$itemName=$_GET['name'];
	$buy=new controller_basket();
	$buyitem=$buy-> createTrolley ($quantity, $id, $price,$itemName, $stock);	
		}
	
if (isset($_GET['deleteBuy'])){
	$cle = $_GET['deleteBuy'];
	$delete= new Controller_basket();
	$myDelete = $delete -> deleteBuy($cle);

}
/**	
*ADMINISTRATION
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
 		
    }
       
    else if ($select == 3) { 
    $type=new Controller_Admin();
 	$mytype = $type-> listAlltypeNamesDel();
  }        
}

/**
*ADD actions
*add the item
*/
if(isset($_POST['addItem'])){
	 $add= new Controller_Admin();
     $add->addItem();
}
/**
*MODIFY actions
*Get the name of the items belong to the typeName.
**/
if(isset($_POST['listType']) && isset($_POST['find'])){
	$typeName= $_POST['listType'];
	$choose= new controller_Admin();
	 $choose->showItems($typeName); 
}
/**
*get the description of the item choose.
*/
if(isset($_POST['choose']) && isset($_POST['update'])){
    $nom = $_POST['choose'];
    $product = new Controller_Admin();
   	$product->placeItem($nom);
}
/** 
*modify
*/
if (isset($_POST['modifyItem'])){
	 $mod= new Controller_Admin();
     $message = $mod->modifyItem();
} 

/**
*DELETE actions
*Get the name of the items belong to the typeName.
**/
if(isset($_POST['listTypeDel'])&& isset($_POST['find'])){
    $typeName= $_POST['listTypeDel'];
    $choose= new controller_Admin();
    $choose->showItemsDel($typeName);
}
/**
*delete item
*/
if (isset($_POST['delete'])){	
	$product = new Controller_Admin();
	$delProduct = $product->deleteItems();
}


 require_once ($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/footer.php'); 
 ?>
