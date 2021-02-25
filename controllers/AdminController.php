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
    header('Location:  /admin ');
    
        
   }
    else{
      echo "Изображение должно быть в формате PNG";
      
    }

}

public function actionDeleteShoes($article){
      $isAdmin = $this -> helper -> isAdmin();
      if($isAdmin){

          $delete = $this -> admin -> deleteSneakers($article);
          if($delete  == true){
              header('Location:  /shop ');
            }
      }
      
}

public function actionEditShoesView($article){
        $isAdmin = $this -> helper -> isAdmin();
        if($isAdmin){

            
                  $oneProduct = $this->products -> GetOneProduct($article);
                  $title = "Edit";
                  $array = $oneProduct;
                  $this->view -> GenerateView("edit_view", $array, $title);
                 
            }
            
        

}
public function actionUpdateShoes(){
      $isAdmin = $this -> helper -> isAdmin();
        if($isAdmin){

            if(!empty($_POST)){
      
               $update = $this -> admin -> editSneakers($_POST);
                if($update  == true){
                  header('Location:  /shop ');
                }
            }
                 
            }
}


}