 <?php
require_once($_SERVER['DOCUMENT_ROOT'].'fantasy/controllers/Controller_Admin.php');       
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/header.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/nav.php');  

?>  
 <link rel="stylesheet" href="/fantasy/views/style/administration.css">    
     <div class="container">
            <div class="row">
                <div class="modify_item col-md-10">
                    <div class="row">
                        <div class=" col-sm-12 col-lg-offset-3 col-lg-6">
                            <form action="/fantasy/index.php" method="post" name="addItem">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="type" placeholder="type">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="categorie" placeholder="Categorie">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nom" placeholder="Nom">
                                </div>
                                <div class="form-group">
                                     <div class="form-group">
                                    <input type="text" class="form-control" name="description" placeholder="titre">
                                </div>
                                <div class="form-group">
                                    <textarea  class="form-control" name="descriptionb" placeholder="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name = "prix" placeholder="prix">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="stock" placeholder="stock">
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="picture" placeholder="adresse de l'image">
                                </div>
                                <button type="submit" class="btn btn-default" name="addItem">AJOUTER</button>
                                 <?php
                                 if(!empty($message)){
                                 echo $message;
                                 }?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
       
<?php
 require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/footer.php'); 
 ?>
















