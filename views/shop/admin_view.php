<main class = "main_empty">
<div><b>Добавить обувь</b></div>

<form enctype = "multipart/form-data" method="post" action="<?=SITE_ROOT . "admin/add"?>">
<span>Название бренда: </span>
<select name="product_brand">
<?php 

foreach($array as $value){
echo "<option>" . $value["brand_name"] . "</option>";
}

?>

</select>

<div>
<label>Название продукта</label>
<input type="text"  name="product_name" required/><br>
</div>

<div>
<label>Цена</label>
<input type="number" min="0"  name="product_price" required/><br>
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
<input name="product_article" type="number" min="100000" max="999999" id="product_article"  required/><br>

<input name="picture" type="file" name="product_img" required/>
<input type="submit" value="Добавить" />


</form>

</main>