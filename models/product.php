<?php

include_once("./components/db.php");


class Products{
 
    public function GetProducts(){
        $db = connect();
        $query = 
        "SELECT * FROM `sneakers`

        LEFT JOIN `article`
        ON sneakers.sneakers_article_id = article.article_id

        LEFT JOIN `brands` 
        ON sneakers.sneakers_brand_id = brands.brand_id
        ";
        $result = mysqli_query($db, $query);
        $products_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
       

        return  $products_result;
        
    }

    public function GetOneProduct($article){
        
        $db = connect();
        $query = 
        " SELECT * FROM `sneakers`

          LEFT JOIN `article`
          ON sneakers.sneakers_article_id = article.article_id

          LEFT JOIN `brands` 
          ON sneakers.sneakers_brand_id = brands.brand_id

          WHERE `article_name` = $article
         ; ";

        $result = mysqli_query($db, $query);
        $products_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $availableSizes = $this -> GetSizes($products_result);
        $products_result[0]["availableSizes"] = $availableSizes;

        return  $products_result;
    }



    // Ф-ция возвращает доступные для покупки размеры
    public function GetSizes($oneProduct){
        
       $article_id = $oneProduct[0]['sneakers_article_id'];
       $db = connect();
       $query = 
        " SELECT `size_number` FROM `sizes`
          LEFT JOIN `goods`
          ON sizes.size_id = goods.good_size_id
          WHERE `good_article_id` = $article_id
         ; ";
         $result = mysqli_query($db, $query);
         $sizes_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
         $availableSizes = [];

         forEach($sizes_result as $key => $value){
            forEach($value as $key => $size){
                array_push($availableSizes, $size);
            }
         }
         return array_unique($availableSizes);           


    }


    public function GetBrands(){

        $db = connect();
        $query = 
        " SELECT * FROM `brands`; 
        ";
        $result = mysqli_query($db, $query);
        $brands_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $brands_result;

    }

    
}