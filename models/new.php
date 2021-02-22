<?php

include_once("./components/db.php");


class NewProducts{


    public function GetNewProducts(){
        $db = connect();
        $query = 
        "SELECT * FROM `sneakers`

        LEFT JOIN `article`
        ON sneakers.sneakers_article_id = article.article_id

        LEFT JOIN `brands` 
        ON sneakers.sneakers_brand_id = brands.brand_id

        WHERE `sneakers_new` = '1'
        ";
        $result = mysqli_query($db, $query);
        $products_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
       

        return  $products_result;
        
    }

}