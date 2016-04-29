<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/controllers/Controller_basket.php');	
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/nav.php');


?>
<script src="http://localhost/fantasy/views/js/jquery.min.js"></script>
<script src="http://localhost/fantasy/views/js/bootstrap.min.js"></script>	
  
  
  <div class="shop col-md-10">
  <div id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li class="item1"></li>
      <li class="item2 active"></li>
      <li class="item3"></li>
      <li class="item4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="/fantasy/images/baltique1.jpg" alt="agneska" width="460" height="345">
        <div class="carousel-caption">
         <p>AGNESKA</p>
        </div>
      </div>


      <div class="item">
        <img src="/fantasy/images/adria1.jpg" alt="yakare" width="460" height="345">
        <div class="carousel-caption">
          <p>YANAELLE</p>
        </div>
      </div>
    
      <div class="item">
        <img src="/fantasy/images/meri4 .jpg" alt="zoe" width="460" height="345">
        <div class="carousel-caption">
          <p>ZOE</p>
        </div>
      </div>

      <div class="item">
        <img src="/fantasy/images/ion2 .jpg" alt="jaomin" width="460" height="345">
        <div class="carousel-caption">
          <p>JAOMIN</p>
        </div>
      </div>
  
    </div>
    <script>
$(document).ready(function(){
    // Activate Carousel
    $("#myCarousel").carousel();
    
    // Enable Carousel Indicators
    $(".item1").click(function(){
        $("#myCarousel").carousel(0);
    });
    $(".item2").click(function(){
        $("#myCarousel").carousel(1);
    });
    $(".item3").click(function(){
        $("#myCarousel").carousel(2);
    });
    $(".item4").click(function(){
        $("#myCarousel").carousel(3);
    });
    
    // Enable Carousel Controls
    $(".left").click(function(){
        $("#myCarousel").carousel("prev");
    });
    $(".right").click(function(){
        $("#myCarousel").carousel("next");
    });
});
</script>
</div>
</div>
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/fantasy/views/footer.php');
?>