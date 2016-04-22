
<?php    
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/controllers/Controller_Admin.php');    
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/top_header.php');  
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/header.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/nav.php');  
?>
<link rel="stylesheet" href="/fantasy/views/style/administration.css">

                <div class="admin col-md-10">                  
                    </br><h1>ACTION</h1> 
                    <form action ="" method="post" name="admin">             
                        <select name= "choix">
                            <option value="1">Ajouter Article</option>
                            <option value="2">Modifier Article</option>
                            <option value="3">Supprimer Article</option>  
                        </select>  
                            <button type="submit" class="btn btn-default" name="valider">VALIDER</button>   
                      </form>
                  </div>
                    
<?php


if(isset($_POST['valider'])&& isset($_POST['choix'])) {
    $select = ($_POST['choix']);

    if ($select == 1){ 
        header('location:/fantasy/views/items/addItem.php');
  }    
   else if ($select == 2) { 
      header('location:/fantasy/views/items/modifyItem.php');
  }        
    else if ($select == 3) { 
      header('location:/fantasy/views/items/deleteItem.php');
  }        
}
?>  