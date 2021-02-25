<main class = "main_empty">
<div><b>Редактировать информацию</b></div>

<form enctype = "multipart/form-data" method="post" action="<?php echo SITE_ROOT . "admin/update"?>">
<span>Название бренда: </span>

<?php 

foreach($array as $value){
echo "<span>" . $value["brand_name"] . "</span>";
}

?>



<div>
<label>Название продукта</label>
<input type="text"  name="product_name" value="<?= $value["sneakers_name"]?>"  required/><br>
</div>

<div>
<label>Цена</label>
<input type="number" min="0"  name="product_price" value="<?= $value["sneakers_price"]?>" required/><br>
</div>

<select name="product_new">
<option value = "0">Старая коллекция</option>
<option value = "1">Новинка</option>
</select>
<br>

<select name="product_gender">
<option value = "2">Мужчинам</option>
<option value = "1">Женщинам</option>
</select>
<br>
<label>Артикул товара</label>
<span><?= $value["article_name"]?></span>
<input name="product_article" type="hidden" min="100000" max="999999" id="product_article" value="<?= $value["article_name"]?>"  readonly/><br>

<input name="picture" type="file" name="product_img"/>
<input type="submit" value="Добавить" />


</form>

</main>