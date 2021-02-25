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
         
       echo '<div class="carousel-cell box">
       
       <a href="' . SITE_ROOT . 'products/' . $value['article_name']. '" >
       
       <img src="/assets/img/sneakers/' . $value['sneakers_img'] . '.png" height="256px">
       <div class="boxContent">
 <h3 class="title">' . $value['sneakers_name'] . '</h3>
 <span class="post">' . $value['sneakers_price'] . '<span> ₽</span></span>
 </div>
       
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
       <div class="sneakers_item_name">'   . $value['sneakers_name'].   ' </div>
       <div class="sneakers_item_price">'   . $value['sneakers_price'].   '<span> ₽</span>   </div></a>';
       
       if($isAdmin){
       echo '
       <div class="sneakers_item_icons"> 
       <img src="/assets/img/icons/edit.png" height=20px> 
       <a onclick="return confirm()" href = ' . SITE_ROOT . 'admin/delete/' . $value['article_name']. ' ><img src="/assets/img/icons/delete.png" width=20px></a>
       </div> ';
       }
       echo ' </div>';
         }

        }
   }



  
  
  

  ?>
 
</div>

</div>
</main>
 