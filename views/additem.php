<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="bootstrap.css">
         <link rel="stylesheet" href="main.css">
        <title>Administration</title>
    </head>
    <body>
       <?php        
require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/top_header.php');   
require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/header.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/nav.php');  
?>      
        ?>
        <div  class="container">
            <div class="row">
            	<div class="col-lg-12">
            		<div class="row">
                		<div class="inscription_color" class="col-lg-offset-2 col-lg-6">
		                            <form action="" method="post" name="addItem">
		                                <div class="form-group">
		                                    <input type="text" class="form-control" name="categorie" placeholder="CATEGORIE">
		                                </div>
		                                <div class="form-group">
		                                    <input type="text" class="form-control" name="nom" placeholder="NOM">
		                                </div>
		                                <div class="form-group">
		                                    <input type="text" class="form-control" name="description" placeholder="DESCRIPTION">
		                                </div>
		                                <div class="form-group">                                  
		                                    <input type="textarea" class="form-control" name="description+" placeholder="DESCRIPTION TOTALE">
		                                </div>
		                                <div class="form-group">
		                                    <input type="text" class="form-control" name = "prix" placeholder="PRIX ">
		                                </div>
		                                <div class="form-group">
		                                    <input type="text" class="form-control" name="quantité" placeholder="QUANTITE">
		                                </div>
		                                <div class="form-group">
		                                    <input type="text" class="form-control" name="adresse_image" placeholder="ADRESSE IMAGE">
		                                </div>
		                                 <button type="submit" class="btn btn-default" name="valider">VALIDER</button>
		                            </form>
		                        </div>
                        	</div>
                    	</div>
                	</div>                
        		</div> 
        	</div>
        </div> 
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/footer.php');  
?>      
    </body>
</html>
















