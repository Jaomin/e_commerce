<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" href="bootstrap.css">
		 <link rel="stylesheet" href="main.css">
</head>

<body>
    <?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/header.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/nav.php');
        ?>
	<div  class="container" >
			<div class="col-md-9">
                <div class="col-md-offset-3 col-md-6">
				<h1 class="contact_title">CONTACT</h1>
                </div>
				<div class="row">
				<div class= "col-lg-offset-2 col-lg-8 col-md-offset-3 col-md-6 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10" >
				    <form action="" method="post" name= "contact">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nom" placeholder="Nom">
                        </div>
                        <div class="form-group">
                             <input type="text" class="form-control" name="prenom" placeholder="Prenom">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="mail" placeholder="e-mail">
                        </div>
                        <div class="form-group">
                            <label for="message"  class="inscription_title"><p> Votre message</p></label></br>
                            <textarea  name="message" placeholder="je n'ai pas eu le temps de gérer l'envoi sur mail"></textarea>
                        </div> 
                        <div>	                		
                            <input type="submit" class="btn btn-default" name="mail" value="Envoyer">
                		</div></br>
                	</form>
		          </div>	
	           </div>
            </div>
        </div>
    
    <?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/footer.php');      
     ?>
</body>
</html>