
<?php        
require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/top_header.php');   
require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/header.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/nav.php');  
?>      
        ?>
        <div  class="container">
            <div class="row">
                <div  id="choix" class= "inscription_color" class="col-lg-12">                  
                    </br><h1>ACTION</h1>                
                        <select  name= "choix">
                            <option value="value 1" selected>Ajouter Article</option>
                            <option value="value 2">Modifier Article</option>
                            <option value="value 1">Annuler Article</option>
                            <option value="value 1">Creer Categorie</option>
                        </select>
                        <button type="submit" class="btn btn-default" name="valider">VALIDER</button>
                    </div>
                </div>
            </div>
                
      
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/footer.php');  
?>      
    </body>
</html>