<?php
include_once("./components/view.php");
include_once("./models/user.php");
include_once("./components/helper.php");



class UserController
{

      protected $user = [];


      public function __construct()
      {
            $this->view = new View();
            $this->user = new User();
            $this->helper = new Helper();
      }

      //  View страницы авторизации
      public function actionAuth()
      {
            $title = "Authorization";
            setcookie('login_error', '0');
            setcookie("error_auth", '0');
            setcookie("captcha_error", '0');


            // LogOut, если авторизован
            $isAuthorized = $this->helper->isAuthorized();
            if ($isAuthorized == 1) {

                  $this->user->Logout();
                  header('Location:  /shop ');
            } else {


                  $array = null;
                  $this->view->GenerateView("auth_view", $array, $title);
            }

            return true;
      }



      //  Авторизация пользователя 
      public function actionLogin()
      {

            if (isset($_POST['login']) & isset($_POST['password'])) {

                  $user['login'] = $_POST['login'];
                  $user['password'] = md5($_POST['password']);
                  $login_result = $this->user->Login($user);

                  if ($login_result == true) {
                        setcookie("error_auth", '0');
                        header('Location:  /shop ');
                  } else {

                        header('Location:  /auth ');
                  }
            }


            return true;
      }


      //  Регистрация пользователя
      public function actionReg()
      {



            $user['login'] = $_POST['login'];
            $user['email'] = $_POST['email'];
            $user['password'] = md5($_POST['password']);
            $checkIfLoginExists = $this->user->checkIfLoginExists($user['login']);
            $reCaptchaCheck = $this->user->reCaptchaCheck();


            if ($checkIfLoginExists == true) {
                  // если логин существует, отобразить ошибку
                  header('Location:  /auth ');
                  setcookie('login_error', '1');
            } else if ($reCaptchaCheck == false) {
                  header('Location:  /auth ');
                  setcookie('captcha_error', '1');
            } else {



                  $this->user->Register($user);
                  header('Location:  /shop ');
            }


            return true;
      }
}
