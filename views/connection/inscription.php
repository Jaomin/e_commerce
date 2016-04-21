<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/top_header.php');    
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/header.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/nav.php'); 
if ($_SERVER['REQUEST_METHOD']=='POST'){  
require_once($_SERVER['DOCUMENT_ROOT'].'fantasy/controllers/Controller_Connection.php');
    $inscribe= new Controller_Connection();
    $inscription = $inscribe->addUser();
   }     

?>      
        <link rel="stylesheet" href="/fantasy/views/style/inscription.css">
        
<?php
  if (!empty($message)){ 
?>           
         
        <div class="col-md-9">
                <h4><?php echo $message; ?></h4>
        </div>
            
<?php
    }
?>
                   
                    <div class="inscription_color col-md-9">
                    </br><h1 id="inscription_title"> Bienvenue chez Fantasy</h1>
                        <div id="inscription">
                            <form action="" method="post" name= "connect">
                                <div class="form-group">
                                    <label class="inscription_title">Nom</label>
                                    <input type="text" id="name" class="champs form-control" name="nom" placeholder="Nom">
                                </div>
                                <div class="form-group">
                                    <label class="inscription_title">Prenom</label>
                                    <input type="text" id="firstName" class="champs form-control" name="prenom" placeholder="Prenom">
                                </div>
                                <div class="form-group">
                                     <div class="form-group">
                                    <label class="inscription_title"> Date de naissance</label>
                                    <input type="date" id="date" class=" form-control" name="naissance" placeholder="Date de naissance">
                                </div>
                                <div class="form-group">
                                    <label class="inscription_title"> Adresse</label>
                                    <input type="text" id="address" class="champs form-control" name="adresse" placeholder="Adresse">
                                </div>
                                <div class="form-group">
                                    <label class="inscription_title">Code postal</label>
                                    <input type="text" id="postal" class="champs form-control" name = "postal" placeholder="Code Postal">
                                 </div>
                                  <div class="form-group">
                                    <label class="inscription_title">Ville</label>
                                    <input type="text" id="city" class="champs form-control" name="ville" placeholder="Ville">
                                 </div>
                                  <div class="form-group">
                                    <label class="inscription_title">E-mail</label>
                                    <input type="email" id="email"class="champs form-control" name="mail" placeholder="email">
                                 </div>
                                <div class="form-group">
                                    <label class="inscription_title">Identifiant</label>
                                    <input type="text" id="ident"class="champs form-control" name="ident" placeholder="Identifiant">
                                </div>
                                 <div class="form-group">
                                    <label class="inscription_title">Mot de passe</label>
                                    <input type="password" id="pass" class="champs form-control" name="pass" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label class="inscription_title">Mot de passe</label>
                                    <input type="password" id ="passtest" class="champs form-control" name="pass-test" placeholder="Password">
                                </div> 
                                 <input type="submit" id="submit" class="btn btn-default" name="valider">
                                 <input type="reset" id="refresh">
                            </form>
                            <!--<div id="error">
                                <p>Vous n'avez pas rempli correctement les champs du formulaire !</p>
                                </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div> 
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/footer.php');   
?>      
    </body>
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
$(document).ready(function(){

    var $name=$('#name'),
        $firstName=('#firstName'),
        $date=('#date'),
        $address = ('#address'),
        $postal = $('#postal'),
        $city = $('#city'),
        $ident = $('.ident'),
        $pass = $('#pass'),
        $passtest = $('#passtest'),
        $email = $('.email'),
        $submit = $('#submit'),
        $reset = $('.refresh'),
        $error = $('#error'),
        $champs = $('.champs');

    $champs.keyup(function(){
        if($(this).val().length < 3){ // si la chaîne de caractères est inférieure à 5
            $(this).css({ // on rend le champs rouge
                borderColor : 'red',
                color : 'red'
            });
         }
         else{
             $(this).css({ // si tout est bon, on le rend vert
             borderColor : 'grey',
             color : 'grey'
         });
         }
    });

    $passtest.keyup(function(){
        if($(this).val() != $pass.val()){ // si la confirmation est différente du mot de passe
            $(this).css({ // on rend le champ rouge
                borderColor : 'red',
                color : 'red'
            });
        }
        else{
        $(this).css({ // si tout est bon, on le rend vert
            borderColor : 'grey',
            color : 'grey'
        });
        }
    });

    $submit.click(function(e){
        e.preventDefault(); // on annule la fonction par défaut du bouton d'envoi

        // puis on lance la fonction de vérification sur tous les champs :
        check($name);
        check($firstName);
        check($address);
        check($postal);
        check($city);
        check($ident);
        check($pass);
        check($passtest);
        check($email);
    });

    $reset.click(function(){
        $champs.css({ // on remet le style des champs comme on l'avait défini dans le style CSS
            borderColor : 'grey',
            color : 'black'
        });
        $error.css('display', 'none'); // on prend soin de cacher le message d'erreur
    });

    function check(champs){
        if(champs.val() == ""){ // si le champs est vide
            $error.css('display', 'block'); // on affiche le message d'erreur
            champs.css({ // on rend le champ rouge
                borderColor : 'red',
                color : 'red'
            });
        }
    }

});

   
</script>-->

</html>