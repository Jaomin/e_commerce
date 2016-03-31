<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" href="bootstrap.css">
		 <link rel="stylesheet" href="main.css">
</head>

<body>
    <?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/top_header.php');   
require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/header.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/nav.php');
        ?>
	<div  class="container" >
			<div class="inscription_color"  class="col-lg-12">
				</br><h1 class="inscription_title">CONTACT</h1>
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
                            <label for="message"  class="inscription_title"> Votre message</label></br>
                            <textarea  name="message" placeholder="message"></textarea>
                        </div> 
                        <div>	                		
                            <button type="submit" class="btn btn-default" name="valider">VALIDER</button>
                		</div></br>
                	</form>
		          </div>	
	           </div>
            </div>
        </div>
    
    <?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/site/views/footer.php');      
     ?>
</body>
</html>