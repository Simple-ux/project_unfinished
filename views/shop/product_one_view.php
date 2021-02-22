<main class = "main_empty">
<div>

<?php
   foreach($array as $value){
       echo 
       '<img src="/assets/img/sneakers/'  . $value['sneakers_img'] .   '.png"  width="300px" height="300px">
       <div>'   . $value['sneakers_name'].   '</div>
       <div><span>Бренд: </span>'   . $value['brand_name'].   '</div> 
       <div><span>Цена: </span>'   . $value['sneakers_price'].   '<span> ₽</span></div> 
       <div><span>Артикул: </span>'   . $value['article_name'].   '</div> 
       
       ';  
   }
  ?>

 </div>
 <form>
 
<input type="hidden"  id="product_id" value="<?php echo $value['sneakers_id']?>" /><br>
<input type="hidden"  id="product_article" value="<?php echo $value['article_name']?>" /><br>
<input type="hidden"  id="product_brand" value="<?php echo $value['brand_name']?>" /><br>
<input type="hidden"  id="product_name" value="<?php echo $value['sneakers_name']?>" /><br>
<input type="hidden"  id="product_price" value="<?php echo $value['sneakers_price']?>" /><br>
<input type="hidden"  id="product_img" value="<?php echo $value['sneakers_img']?>" /><br>
<span>Доступные размеры: </span>

<?php
  if($value["availableSizes"] != null) {
   echo '<select id="product_size">';
   foreach($value["availableSizes"] as $key => $size){ 
      
            echo "<option>" . $size . "</option>";
        
        
        }
    
    echo '</select>';
  }
  else{
      echo "<span> Нет доступных размеров </span><br>";
  }
?>

 <input type="button" value="Добавить в корзину" onclick="addToCart()">
 </form>
</main>