<?php



  class Router 
  {
      private $routes;
      public function __construct(){
       $routesPath = "./config/routes.php";
       $this -> routes = include($routesPath);
      }


      
      private function getURI(){
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], "/");
        }
      }
      



      public function run(){


        $uri=  $this-> getURI();

             if($uri == null){
              header('Location:  /shop ');
                  }
              else{

        foreach ($this->routes as $uriPattern => $path) {
        $r = preg_replace("~$uriPattern$~", $path, $uri);

        
        if(preg_match("~^$uriPattern$~", $uri)){
            
            $segments = explode("/", $r);

            $controllerName = ucfirst(array_shift($segments)."Controller");
            
            $actionName = "action".ucfirst(array_shift($segments));
            
            $controllerFile = "./controllers/" . $controllerName . ".php";

            $parameters = $segments;
            
            

            if(file_exists($controllerFile)){
                include_once($controllerFile);
            }
         
            
            
            setcookie('login_error', '0');
            setcookie("error_auth", '0');
            setcookie("captcha_error", '0');
            
            $controllerObject = new $controllerName;
            
            // Передаем параметры в action
            $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
            
            if($result != null){
              
                break;
            }
            
        }
        
        else {
          header('HTTP/1.1 404 Not Found ');
        }
        
        }
      }
      }
  }
  