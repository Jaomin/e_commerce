 <?php
 require_once($_SERVER['DOCUMENT_ROOT'].'fantasy/controllers/Controller_Items.php');       
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/top_header.php');   
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/header.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/nav.php');  

if ($_SERVER['REQUEST_METHOD']=='POST'){
     $add= new Controller_Items();
     $message = $add->addItem();
     
       
        }
?>  
 <link rel="stylesheet" href="/fantasy/views/style/administration.css">    
     <div class="container">
            <div class="row">
                <div class="modify_item col-lg-12">
                    <div class="row">
                        <div class="col-lg-offset-3 col-lg-6">
                            <form action="" method="post" name= "addItem">
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
                                 <button type="submit" class="btn btn-default" name="ajouter">AJOUTER</button>
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
       
     
    </body>
</html>
















