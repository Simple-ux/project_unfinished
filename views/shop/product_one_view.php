
<main class = "main_empty">

<div class="container_one_view">
<?php
   foreach($array as $value){
       echo 
       '<div class=img_one_view><img src="/assets/img/sneakers/'  . $value['sneakers_img'] .   '.png"  width="400px" height="400px"></div>
       <div class=info_one_view>
       <h3>'   . $value['sneakers_name'].   '</h3>
       <div><span>Цена: </span><b>'   . $value['sneakers_price'].   '<span> ₽</span></b></div> 
       <div><span>Бренд: </span>'   . $value['brand_name'].   '</div> 
       <div><span>Артикул: </span>'   . $value['article_name'].   '</div> 
       
       ';  
   }
  ?>
  <?php
  if($value["availableSizes"] != null) {
   echo '<div>Выберите размер: <select id="product_size">';
   foreach($value["availableSizes"] as $key => $size){ 
      
            echo "<option>" . $size . "</option>";
        
        
        }
    
    echo '</select></div>';
  }
  else{
      echo "<div><span> Нет доступных размеров </span></div>";
  }
?>

 <div><button type="submit" onclick="addToCart(); counter();" class="btn-addToCart">В корзину</button></div>
 </div>
</div>

 <form>
 
<input type="hidden"  id="product_id" value="<?php echo $value['sneakers_id']?>" />
<input type="hidden"  id="product_article" value="<?php echo $value['article_name']?>" />
<input type="hidden"  id="product_brand" value="<?php echo $value['brand_name']?>" />
<input type="hidden"  id="product_name" value="<?php echo $value['sneakers_name']?>" />
<input type="hidden"  id="product_price" value="<?php echo $value['sneakers_price']?>" />
<input type="hidden"  id="product_img" value="<?php echo $value['sneakers_img']?>" />



 </form>
</main>