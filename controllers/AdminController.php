<?php
include_once("./components/view.php");
include_once("./models/admin.php");
include_once("./models/product.php");
include_once("./components/helper.php");


class AdminController{


public function __construct()
      {
            $this->view = new View();
            $this->helper = new Helper();
            $this->products = new Products();
            $this->admin = new Admin();
            
            
      }


public function actionAdminView(){
            
    $isAdmin = $this -> helper -> isAdmin();

    if($isAdmin){
          
          $title = "Admin";
          $array = $this-> products -> GetBrands();

          $this->view -> GenerateView("admin_view", $array, $title);
    }
    else{
      header('Location:  /shop ');
    }
}


public function actionAddShoes(){
    
    if($_FILES['picture']['type'] === "image/png"){
    $this -> admin -> addSneakers($_POST);
    header('Location:  /shop ');
}
    else{
      echo "Изображение должно быть в формате PNG";
      
    }
      
}

}