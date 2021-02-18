<?php
include_once("./components/view.php");
// include_once("./models/cart.php");
include_once("./components/helper.php");



      

 class CartController
 {

      private $array = [];
      protected $products;

      public function __construct(){
         $this->view = new View();   
      }
     

       public function actionView(){
       
      $array = null;
      $title = "Cart";
      $this->view -> GenerateView("cart_view", $array, $title); 

        return true;
       }

       


 }