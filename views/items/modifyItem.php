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
        <div class="row">
            <div class="modify col-md-9">
                <form action ="" method="post" name="update">  
                    <select class="modify_listDer" name="choose">
     <?php
     foreach($chooseItem as $item)   {
         ?>                    
                    <option class="modify_listDer" value="<?php echo $item['itemName'];?>"><?php echo $item['itemName']; ?></option>      
    <?php
}       
?>                   
                    </select>
                    <button type="submit" class="btn btn-default" name="update">MODIFIER</button>
                </form>
            </div>
       
    
     
    </body>
</html>
<?php
if(isset($_POST['choose']) && isset($_POST['update'])){
    $nom = $_POST['choose'];
    $product = new Controller_Items();
    $modProduct = $product->placeItem($nom);

   foreach($modProduct as $cle=>$champs){

  ?>
   
            
                    
                        <div class="col-md-offset-1 col-md-7">
                            <form action="" method="post" name= "modifyItem">
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="type" value="<?php echo $champs['type'];?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="typeName" value="<?php echo $champs['typeName']; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="itemName" value="<?php echo $champs['itemName']; ?>">
                                </div>
                                <div class="form-group">
                                     <div class="form-group">
                                    <input type="text" class="form-control" name="description" value="<?php echo $champs['description']; ?>">
                                </div>
                                <div class="form-group">
                                    <textarea class=" modify_item_textarea " name="descriptionb" ><?php echo $champs['descriptionb']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name = "price" value="<?php echo $champs['price']; ?>">
                                 </div>
                                  <div class="form-group">
                                    <input type="text" class="form-control" name="stock" value="<?php echo $champs['stock'] ;?>">
                                 </div>
                                  <div class="form-group">
                                    <input type="file" class="form-control" name="picture" value="<?php echo $champs['picture']; ?>">
                                 </div>
                                 <!--<input type="hidden" name="modify" value="modify">-->
                                 <button type="submit" class="btn btn-default" name="modify" >Modifier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        </div>
        </div>        
    </body>
</html>
<?php
}
}
if ($_SERVER['REQUEST_METHOD']=='POST'){
     $mod= new Controller_Admin();
     $message = $mod->modifyItem();
     
       
    }
?>  


