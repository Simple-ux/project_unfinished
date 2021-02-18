<?php

include_once("./components/db.php");
include_once("./components/helper.php");
include_once("./components/recaptchalib.php");

   class User{

    public function checkIfLoginExists($login) {
            $db = connect();
            $query = "
              SELECT count(*) AS `count` 
              FROM `users`
              WHERE `user_login` = '$login';
            ";
            $result = mysqli_query($db, $query);
            $count = mysqli_fetch_all($result, MYSQLI_ASSOC);
            

            if ($count[0]['count'] == 1) {
              return true; 
            } else {
              return false;
            }
          }

          //  Регистрация пользователя
          public function Register($user){
            
            
            $db = connect();
            $query = "
				  INSERT INTO `users`
					SET `user_login` = '$user[login]',
               `user_email` = '$user[email]',
						`user_password` = '$user[password]';
			     ";
            $result = mysqli_query($db, $query);
            $result_register = mysqli_fetch_all($result, MYSQLI_ASSOC);

            $this -> Login($user);
            
            
            
            
          }


        //  Авторизация
          public function Login($user){

            $db = connect();
            $helper = new Helper();
            $isAuthorized = $helper -> isAuthorized();
           
            
            if($isAuthorized == false){
            $query = "
				SELECT * FROM `users`
					WHERE `user_login` = '$user[login]'
                    AND  `user_password` = '$user[password]';
			";
            $result = mysqli_query($db, $query);
            $login_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
            print_r($login_result);
            
            
           
                     if($login_result !== []){
                         $this -> fullAuthorizedUser($login_result[0]);
                         return  $login_result;
                      }
                      else
                      {
                          setcookie("error_auth", "1");
                          return  false;
                       }
                

                  }
                  else{
                      echo "Вы уже авторизованы";
                      return  false;
                  }
          }

        



          
          private function fullAuthorizedUser($user) {
			session_start();
			$helper = new Helper();
      $session_id = $_COOKIE["PHPSESSID"];  

			$token = $helper->generateToken();
			$tokenTime = time() + 60*60; 
			setcookie('token', $token, time() + 2*24*60*60, '/');
			setcookie('user_id', $user['user_id'], time() + 2*24*60*60, '/');
			setcookie('token_time', $tokenTime, time() + 2*24*60*60, '/');
            
            if($user['admin'] == 1){
                setcookie('admin', 1 , time() + 2*24*60*60, '/');
            }
            
            $db = connect();
			$query = "
				INSERT INTO `connects`
					SET `session_id` = '$session_id',
          `connect_token` = '$token', 
						`connect_user_id` = $user[user_id],
						`connect_token_time` = FROM_UNIXTIME($tokenTime);
			";
			$result = mysqli_query($db, $query);
           
		}


          //  Logout
          public function Logout(){

            $db = connect();
            $query = "
				DELETE FROM `connects`
					WHERE `connect_token` = '$_COOKIE[token]';
			";
            $result = mysqli_query($db, $query);
            

            $helper = new Helper();
            $isAdmin = $helper -> isAdmin();
            if($isAdmin == 1){
              setcookie('admin', "" , 1);
            }
            

          }

          public function reCaptchaCheck(){
            //секретный ключ
            $secret = "6LeeXFoaAAAAAJ6m6cV5eIQYc7syPeJv-BsAHNAN";
            //ответ
            $response = null;
            //проверка секретного ключа
            $reCaptcha = new ReCaptcha($secret);
             
            if (!empty($_POST)) {
             
                if ($_POST["g-recaptcha-response"]) {
                    $response = $reCaptcha->verifyResponse(
                        $_SERVER["REMOTE_ADDR"],
                        $_POST["g-recaptcha-response"]
                    );
                }
             
                if ($response != null && $response->success) {
                    return true;
                } else {
                    return false;
                }
             
            }
            
                  }


    
   }


      


 
