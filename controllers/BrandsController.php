<?php
include_once("./components/view.php");
include_once("./models/brand.php");
include_once("./components/helper.php");


 class BrandsController
 {
     
      private $array = [];
      protected $brands;

      public function __construct(){
         $this->view = new View();   
         $this->brands = new Brand();
      }

       public function actionList(){
        $title = "Brands";
       $array = $this-> brands -> GetBrands();
 
       $this->view -> GenerateView("brand_view", $array, $title);

        return true;
       }
       
      
       public function actionViewOneBrand($brand){
            
            $array = $this -> brands -> GetOneBrandProducts($brand);
            if(empty($array)){
               
                 header("HTTP/1.0 404 Not Found");
                 
            }
            else{
               $title = $brand;
            $this->view -> GenerateView("brand_one_view", $array, $title);
            }
       }

 }