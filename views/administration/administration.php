
<?php    
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/controllers/Controller_Admin.php');     
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/header.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/nav.php');  
?>
<link rel="stylesheet" href="/fantasy/views/style/administration.css">

                <div class="admin col-md-10">                  
                    <form action ="/fantasy/index.php" method="post" >             
                        <select name= "choice">
                            <option value="1">Ajouter Article</option>
                            <option value="2">Modifier Article</option>
                            <option value="3">Supprimer Article</option>  
                        </select>  
                            <button type="submit" class="btn btn-default" name="select">VALIDER</button>   
                      </form>
                  </div>
                    
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/footer.php'); 
?> 