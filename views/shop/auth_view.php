
<main class = "main_empty">

<link rel="stylesheet" href="./assets/css/auth.css">  
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

<div class="container">
  <div class="frame">
    <div class="nav">
      <ul class="links">

        <li class="signin-active <?php if($_COOKIE['login_error'] === '1' || $_COOKIE['captcha_error'] === '1'){ echo "signin-inactive";}?> "><a class="btn">Вход</a></li>
        <li class="signup-inactive <?php if($_COOKIE['login_error'] === '1' || $_COOKIE['captcha_error'] === '1'){ echo "signup-active";}?> " ><a class="btn">Регистрация </a></li>
      
      </ul>
    </div>
    <div ng-app ng-init="checked = false">
      
                                         
				        <form class="form-signin <?php if($_COOKIE['login_error'] === '1' || $_COOKIE['captcha_error'] === '1'){ echo "form-signin-left";}?>" action="<?=SITE_ROOT . "login"?>" method="post" name="form">
          <label for="username">Логин</label>
          <input class="form-styling" type="text" name="login" placeholder="" required/>
          <label for="password">Пароль</label>
          <input class="form-styling" type="password" name="password" placeholder="" required/>
          <!-- <input type="checkbox" id="checkbox"/>
          <label for="checkbox" ><span class="ui"></span>Оставаться в системе</label> -->
          <div class="btn-animate">

          <span class='errors_auth'>
             <?php if($_COOKIE['error_auth'] === '1'){ echo "*Неверный логин или пароль"; }?>

            </span>

            <button type="submit" class="btn-signin">Вход</button>
           
          </div>
				        </form>
        
				        <form class="form-signup <?php if($_COOKIE['login_error'] === '1' || $_COOKIE['captcha_error'] === '1'){ echo "form-signup-left";}?> " 
                 onsubmit="return ValidationRegConfirmPass()" action="<?=SITE_ROOT . "reg"?>" method="post" name="form">
                
          <label for="fullname">Логин   </label>
          
          <input class="form-styling" type="text" name="login" placeholder="" onkeyup="ValidationRegLogin(this.value)" autocomplete="off" required/>
          
          <label for="email">Email</label>
          <input class="form-styling" type="email" name="email" placeholder="" required/>
          <label for="password">Пароль</label>
          <input class="form-styling password" type="password" name="password"  placeholder="Не менее 6 символов" onkeyup="ValidationRegPass(this.value)" required/>
          <label for="confirmpassword">Повторите пароль</label>
          <input class="form-styling confirmpassword" type="password" name="confirmpassword" placeholder="" required/>
          
         
          
          
          
          <input type="checkbox" id="checkInfo" onclick ="checkboxReg()"/>
          <label for="checkInfo">Согласие на обработку личных данных</label>

          <span class='errors'>

             <?php if($_COOKIE['login_error'] === '1'){ echo "*Логин уже занят"; }
             else if($_COOKIE['captcha_error'] === '1'){ echo "*Подтвердите, что вы не робот"; }
             ?> 

            </span>

          <div class="g-recaptcha" data-sitekey="6LeeXFoaAAAAAFsMmm-w3TqPZjkV-5wVkKRIxMgM" ></div>
          <button type="submit" class="btn-signup" >Регистрация</button>
          
          
				        </form>
     
      
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js'></script>
<script src='https://www.google.com/recaptcha/api.js'></script>

    <script src="./assets/js/auth.js"></script>


    </main>
