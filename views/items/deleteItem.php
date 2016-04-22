 <?php
 require_once($_SERVER['DOCUMENT_ROOT'].'fantasy/controllers/Controller_Admin.php');
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
     
       
            <div class="col-md-10">
                <form action ="" method="post" name="update">  
                    <select name="choose">
     <?php
     foreach($chooseItem as $item)   {
         ?>                    
                    <option value="<?php echo $item['itemName'];?>"><?php echo $item['itemName']; ?></option>      
    <?php
}       
?>                   
                    </select>
                    <button type="submit" class="btn btn-default" name="delete">SUPPRIMER</button>
                </form>
            </div>
        
     
    </body>
</html>
<?php
if(isset($_POST['choose']) && isset($_POST['delete'])){
    $nom = $_POST['choose'];
    $product = new Controller_Admin();
    $delProduct = $product->deleteItems($nom);
}