<?php
include_once("./components/view.php");
include_once("./models/new.php");
include_once("./components/helper.php");


 class NewController
 {
     
      private $array = [];
      protected $newProducts;

      public function __construct(){
         $this->view = new View();   
         $this->newProducts = new NewProducts();
      }

       public function actionList(){
        $title = "New sneakers";
       $array = $this-> newProducts -> GetNewProducts();

       $this->view -> GenerateView("new_view", $array, $title);

        return true;
       }

       


 }
 