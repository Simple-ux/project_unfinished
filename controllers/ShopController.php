<?php
include_once("./components/view.php");
include_once("./models/product.php");
// include_once("./models/main.php");




 class ShopController
 {
     
      
      private $array = [];
      protected $products;

      public function __construct(){
         $this->view = new View();   
         $this->products = new Products();
      }
     

       public function actionIndex(){
         $title = "Sneakerdrop";
         
        $array = $this-> products -> GetProducts();
        $this->view -> GenerateView("main_view", $array, $title);        
        return true;
       }


 }
 
 