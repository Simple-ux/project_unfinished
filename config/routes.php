<?php

return array(

   /*     URI => ControllerName/ActionName      */

  "shop" => "shop/index",   

  "products/([0-9]+)" => "products/view/$1",
  "products" => "products/list",
  "brands" => "brands/list",
  "new" => "new/list",

  "cart" => "cart/view",
  
  "admin" => "admin/adminView",
  "admin/add" => "admin/AddShoes",

  "auth" => "user/auth",
  "login" => "user/login",
  "reg" => "user/reg",

  "delivery" => "delivery/info",


);

