<main>


    <img class="main_img" src="/assets/img/main_img.png" width='100%'>


<div class="new">

<div class="new_line">
<h2>новинки</h2> </div>

</div>

<div class="carousel_container">

<div class="carousel" data-flickity='{ "groupCells": true }'>

    <?php
    $i=0;
   foreach($array as $value){
        
        if($value['sneakers_new'] == 1 && $i < 10){
         $i++;  
       echo '<div class="carousel-cell">
       <a href="' . SITE_ROOT . 'products/' . $value['article_name']. '" >
       <img src="/assets/img/sneakers/' . $value['sneakers_img'] . '.png" height="256px">
       </a>
        </div>';
        }
   }
 ?>
</div>

</div>
<div class="sneakers_line">
<h2>кроссовки</h2> </div>

<div class="sneakers_container">
 
<?php


$i=0;
   foreach($array as $value){
     
    if($value['sneakers_new'] == 0){
        if($i < 8){
         $i++;  
         
         
       echo 
       '<div class="sneakers_item">
       <a href="' . SITE_ROOT . 'products/' . $value['article_name']. '" >
       <img src="/assets/img/sneakers/'  . $value['sneakers_img'] .   '.png"  width="300px" height="300px">
       <div class="sneakers_item_name">'   . $value['sneakers_name'].   '</div>
       <div class="sneakers_item_price">'   . $value['sneakers_price'].   '<span> ₽</span></div> 
       </a>
       </div>';
         }

        }
   }



  
  
  

  ?>
 
</div>

</div>
</main>
 