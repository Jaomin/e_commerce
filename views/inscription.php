<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){  
 require_once($_SERVER['DOCUMENT_ROOT'].'site/controllers/Controller_Connection.php');
 $inscribe= new Controller_Connection();
 $check = $inscribe ->checkIdentExists();

 //$inscription = $inscribe->addUser();
}
else{ $messageError = "Vous êtes déjà inscrit, veuillez vous connecter!";

}
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="bootstrap.css">
         <link rel="stylesheet" href="main.css">
        <title>ESPACE MEMBRE</title>
    </head>
    <body>
       <?php        
require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/top_header.php');   
require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/header.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/nav.php');  
?>      
        ?>
        <div  class="container"
            <div class="row">
                <div class="inscription_color" class="col-lg-12">
                    </br><h1 id="inscription_title"> Bienvenue chez Fantasy</h1>
                    <div class="row">
                        <div id="inscription" class="col-lg-offset-3 col-lg-6">
                            <form action="<?php $inscription?>" method="post" name= "connect">
                                <div class="form-group">
                                    <label class="inscription_title">Nom</label>
                                    <input type="text" class="form-control" name="nom" placeholder="Nom">
                                </div>
                                <div class="form-group">
                                    <label class="inscription_title">Prenom</label>
                                    <input type="text" class="form-control" name="prenom" placeholder="Prenom">
                                </div>
                                <div class="form-group">
                                     <div class="form-group">
                                    <label class="inscription_title"> Date de naissance</label>
                                    <input type="date" class="form-control" name="naissance" placeholder="Date de naissance">
                                </div>
                                <div class="form-group">
                                    <label class="inscription_title"> Adresse</label>
                                    <input type="text" class="form-control" name="adresse" placeholder="Adresse">
                                </div>
                                <div class="form-group">
                                    <label class="inscription_title">Code postal</label>
                                    <input type="text" class="form-control" name = "postal" placeholder="Code Postal">
                                 </div>
                                  <div class="form-group">
                                    <label class="inscription_title">Ville</label>
                                    <input type="text" class="form-control" name="ville" placeholder="Ville">
                                 </div>
                                  <div class="form-group">
                                    <label class="inscription_title">E-mail</label>
                                    <input type="email" class="form-control" name="mail" placeholder="email">
                                 </div>
                                <div class="form-group">
                                    <label class="inscription_title">Identifiant</label>
                                    <input type="text" class="form-control" name="ident" placeholder="Identifiant">
                                </div>
                                 <div class="form-group">
                                    <label class="inscription_title">Mot de passe</label>
                                    <input type="password" class="form-control" name="pass" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label class="inscription_title">Mot de passe</label>
                                    <input type="password" class="form-control" name="pass-test" placeholder="Password">
                                </div> 
                                 <button type="submit" class="btn btn-default" name="valider">VALIDER</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/footer.php');   
?>      
    </body>
</html>