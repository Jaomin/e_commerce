 <?php
require_once($_SERVER['DOCUMENT_ROOT'].'fantasy/controllers/Controller_Admin.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/header.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/nav.php'); 
?>  
<link rel="stylesheet" href="/fantasy/views/style/administration.css">

    <div class="row">
            <div class="modify col-md-9">
<?php
 if (!isset($_POST['listTypeDel'])){
 ?>

                <form action ="/fantasy/index.php" method="post" name="listTypeName">  
                    <select class="modify_listDer" name="listTypeDel">
     <?php
     foreach($mytype as $type)   {
         ?>                  
                    <option class="modify_listDer" value="<?php echo $type['name'];?>"><?php echo $type['name']; ?></option>      
    <?php
    }     
?>                   
                    </select>
                    <button type="submit" class="btn btn-default" name="find">Categorie</button>
                </form>

<?php 
}  
else if (!isset($_POST['choose']) && !isset($_POST['delete'])){
   
?>
                <form action ="/fantasy/index.php" method="post" name="delete">  
                    <select class="modify_listDer" name="choose">
     <?php
     foreach($chooseItem as $item)   {
         ?>                  
                    <option class="modify_listDer" value="<?php echo $item['itemName'];?>"><?php echo $item['itemName']; ?></option>      
    <?php
}       
?>                   
                    </select>
                    <button type="submit" class="btn btn-default" name="delete">Supprimer</button>
                </form>      
       
<?php 
}
?>    
            </div>
        </div>
<?php
 require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/footer.php'); 
 ?>




         