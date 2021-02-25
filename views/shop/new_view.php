<main>
<h1 class="new_h1">Новинки</h1>
<div class="sneakers_container">
 
<?php



   foreach($array as $value){
     
    
         
         
       echo 
       '<div class="sneakers_item">
       <a href="' . SITE_ROOT . 'products/' . $value['article_name']. '" >
       <img src="/assets/img/sneakers/'  . $value['sneakers_img'] .   '.png"  width="300px" height="300px">
       <div class="sneakers_item_name">'   . $value['sneakers_name'].   '</div>
       <div class="sneakers_item_price">'   . $value['sneakers_price'].   '<span> ₽</span></div> 
       </a>';

       if($isAdmin){
        echo '</a>
        <div class="sneakers_item_icons"> 
        <img src="/assets/img/icons/edit.png" width=20px> 
        <a onclick="return confirm()" href = ' . SITE_ROOT . 'admin/delete/' . $value['article_name']. ' ><img src="/assets/img/icons/delete.png" width=20px></a>
        </div> ';
        }
        echo ' </div>';
       

        
   }



  
  
  

  ?>
 
</div>


</main>