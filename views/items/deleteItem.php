 <?php
 require_once($_SERVER['DOCUMENT_ROOT'].'fantasy/controllers/Controller_Items.php');
 ?>

     

       <?php        
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/top_header.php');   
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/header.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/nav.php');  

    

  $choose= new Controller_Items();
     $chooseItem = $choose ->listAllItems();
     ?>
      <link rel="stylesheet" href="/fantasy/views/style/administration.css">
     <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action ="" method="post" name="update">  
                    <select class="listDer" name="choose">
     <?php
     foreach($chooseItem as $item)   {
         ?>                    
                    <option class="listDer" value="<?php echo $item['itemName'];?>"><?php echo $item['itemName']; ?></option>      
    <?php
}       
?>                   
                    </select>
                    <button type="submit" class="btn btn-default" name="delete">SUPPRIMER</button>
                </form>
            </div>
        </div>
    </div>
     
    </body>
</html>
<?php
if(isset($_POST['choose']) && isset($_POST['delete'])){
    $nom = $_POST['choose'];
    $product = new Controller_Items();
    $delProduct = $product->deleteItems($nom);
}