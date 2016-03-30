<html>
<head>
	<link rel="stylesheet" href="views/bootstrap.css">
		 <link rel="stylesheet" href="views/main.css">
</head>
	

<?php 
include('top_header.php');	
include('views/header.php'); 
include('views/nav.php'); 
?>
		
<?php
if (isset($GET_['page'])){
	$typeName=strVal($_GET['page']);
	require_once('controller/c_items.php');
	$list= new controller_items();
	$list ->listItems($typeName);
}




 include ('views/footer.php'); ?>
 		
	</body>
</html>