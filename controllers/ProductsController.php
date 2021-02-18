<?php
include_once("./components/view.php");
include_once("./models/product.php");
include_once("./components/helper.php");


 class ProductsController
 {

      private $array = [];
      protected $products;

      public function __construct(){
         $this->view = new View();   
         $this->products = new Products();
      }
     


       public function actionList(){
        echo "Список товаров";
        return true;
       }
        
       public function actionView($article){
            $array = $this-> products -> GetOneProduct($article);
            $title = $array[0]['sneakers_name'];
            $this->view -> GenerateView("product_view", $array, $title);
            
            
            
            return true;
           }

 }