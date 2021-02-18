<?php

include_once("./components/db.php");


class Admin{

    protected $info = [];

    public function addSneakers($data){
     
     $info = $data;
    
    $db = connect();
    $arr = explode( "." , $_FILES['picture']['name']);
    $img_name = array_shift($arr);
    $format = array_shift($arr);

    move_uploaded_file($_FILES['picture']['tmp_name'],"./assets/img/sneakers/" . $_FILES['picture']['name']);


    $put = "
				INSERT INTO `article`
				SET `article_name` = $info[product_article]
			     ";
        $put_result = mysqli_query($db, $put);


        $article = "  
        SELECT `article_id` FROM `article`
        WHERE `article_name` = $info[product_article]
        ";
        $article_result = mysqli_query($db, $article);
        $id_arr = mysqli_fetch_all($article_result, MYSQLI_ASSOC);
        $article_id = $id_arr[0]['article_id'];
      
       $brand = "  
        SELECT `brand_id` FROM `brands`
        WHERE `brand_name` = '$info[product_brand]'
        ";
        $brand_query = mysqli_query($db, $brand);
        $brand_result = mysqli_fetch_all($brand_query, MYSQLI_ASSOC);
        $brand_id = $brand_result[0]['brand_id'];

       



    $query = "

       INSERT INTO `sneakers` 
       SET `sneakers_name` = '$info[product_name]',
        `sneakers_price` = $info[product_price],
        `sneakers_new` = $info[product_new],
        `sneakers_brand_id` = $brand_id,
        `sneakers_gender_id` = $info[product_gender],
       `sneakers_article_id` = $article_id,
       `sneakers_img` = '$img_name'
    ";
    $result = mysqli_query($db, $query);

    return true; 
    }

   
}