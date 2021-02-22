<?php

include_once("./components/db.php");


class Brand{

    public function GetBrands(){
        $db = connect();

        $query = 
        "SELECT `brand_name` FROM `brands`
        ";
        $result = mysqli_query($db, $query);
        $products_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
       

        return  $products_result;
        
    }

    public function GetOneBrandProducts($brand){
        $db = connect();
        $query = 
        "SELECT * FROM `sneakers`

        LEFT JOIN `article`
        ON sneakers.sneakers_article_id = article.article_id

        LEFT JOIN `brands` 
        ON sneakers.sneakers_brand_id = brands.brand_id
        WHERE `brand_name` = '$brand'
        ";
        $result = mysqli_query($db, $query);
        $products_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
       

        return  $products_result;
        
    }


}