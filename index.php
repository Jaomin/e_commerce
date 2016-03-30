

<html>
<head>
	<link rel="stylesheet" href="views/bootstrap.css">
		 <link rel="stylesheet" href="views/main.css">
</head>
	

<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/top_header.php');	
require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/header.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/nav.php'); 

if (isset($_GET['page'])){
$typeName = strVal($_GET['page']);
	require_once( $_SERVER['DOCUMENT_ROOT'].'/site/controllers/c_items.php');
	$produits= new Controller_Items();
	$produits -> viewItems($typeName);

}


 require_once ($_SERVER['DOCUMENT_ROOT'].'/site/views/footer.php'); ?>
 		
	</body>
</html>