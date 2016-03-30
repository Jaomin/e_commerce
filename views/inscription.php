<?php
//require_once($_SERVER['DOCUMENT_ROOT'].'/site/library/database.php');

        

$bdd = new PDO('mysql:host=localhost; dbname=site', 'root', '');

if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['naissance']) 
    &&!empty($_POST['pass']) && !empty($_POST['pass-test'])
    && !empty($_POST['adresse']) && !empty($_POST['postal']) && !empty($_POST['ville']) 
    && !empty($_POST['mail']) && isset($_POST['valider'])) {

    if ($_POST['pass']== $_POST['pass-test']){

        $surname= htmlspecialchars($_POST['nom']);
        $name= htmlspecialchars($_POST['prenom']);
        $birth_date= htmlspecialchars($_POST['naissance']);
        $identifiant= htmlspecialchars($_POST['nom']);
        $password= sha1($_POST['pass']);
        $address= htmlspecialchars($_POST['adresse']);
        $postalcode= htmlspecialchars($_POST['postal']);
        $city= htmlspecialchars($_POST['ville']);
        $email= htmlspecialchars($_POST['mail']);  

        $requeteajout =$bdd->prepare("INSERT INTO users (surName, name, birth_date, identifiant, password, address, postalCode, city, email)
        VALUES(:nom,:prenom,:naissance,:nom,:pass,:adresse,:postal,:ville,:mail);");
        $requeteajout -> execute(
        array (
                "nom" => $surname,
                "prenom" => $name,
                "naissance"=> $birth_date,
                "nom" => $identifiant,
                "pass" => $password,
                "adresse" => $address,
                "postal" => $postalcode,
                "ville" => $city,
                "mail"=> $email
                    ));
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
                            <form action="" method="post" name= "connect">
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
        <?require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/nav.php');  
?>      
    </body>
</html>