<?php

include_once("./components/helper.php");


class View{
     
      

      public function __construct(){
        $this->helper = new Helper();

      }
  
    public function GenerateView($content_view, $data = null, $title){
        $isAuthorized = $this -> helper -> isAuthorized();
        $isAdmin = $this -> helper -> isAdmin();

        

        
      if($data != 0){
        $array =[];
        foreach($data as $value => $key){
        array_push($array, $key);

        }
    }
        include_once("./views/templates/header.php");
        include_once("./views/shop/" . $content_view . ".php");
        include_once("./views/templates/footer.php");
     }
    
     
     
}