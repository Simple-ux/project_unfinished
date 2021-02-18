<!DOCTYPE html>
<html lang="ru">
<head>
 
    <title><?= $title ?></title>
    <link  href="/assets/css/normalize.css" rel="stylesheet"> 
    <link rel="stylesheet" href="./assets/libs/flickity/css/flickity.css"> 
    <link  href="/assets/css/style.css" rel="stylesheet"> 
    
   
    <script src="/assets/libs/flickity/js/flickity.pkgd.min.js"></script>
    <script src="/assets/js/index.js" defer></script>
     
</head>
<body>  
  <header>   
   
  <div class="menu-logo">
                <a href="<?=SITE_ROOT . "shop"?>"><img src="/assets/img/logo.png" class="logo-img"  alt=""></a>
            </div>
<container>

            

           
             <div class="menu">
            

            <div class="menu-item">
                <a class="menu-a" href= "<?=SITE_ROOT . "new"?>"  data-action="tracks">
                    Новинки</a>
            </div>
            <div class="menu-item">
                <a class="menu-a" href="#" >
                    Кросссовки</a>
            </div>
            <div class="menu-item">
                <a class="menu-a" href="#" >
                    Бренды</a>
            </div>
            <div class="menu-item">
                <a class="menu-a" href="#">
                   Доставка </a>
            </div>

            
           
            

         <? if ($isAuthorized == 0 ) : ?>
            <div class="menu-item menu_offset"  >
                <a class="menu-a "  href="<?=SITE_ROOT . "auth"?>">
                 
                  Вход

                  
                </a>
            </div>
         <? endif; ?>
         
         

         <? if ($isAuthorized == 1 ) : ?>
            <div class="menu-item menu_offset"  >
                <a class="menu-a "  href="<?=SITE_ROOT . "auth"?>">
                
                
                   Выход
                  
                
                </a>
            </div>
         <? endif; ?>

         <? if ($isAdmin == 1 ) : ?>
            <div class="menu-item"  >
                <a class="menu-a "  href="<?=SITE_ROOT . "admin"?>">
                 
                  Админ

                  
                </a>
            </div>
         <? endif; ?>
  
            <div class="menu-item">
                <a class="menu-a" href="<?=SITE_ROOT . "cart"?>">
                    Корзина
                </a>
            
                </div> 

               

            
           
        
        
</container> 



  </header> 



