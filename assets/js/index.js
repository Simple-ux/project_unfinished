"use strict";

// проверка чекбокса регистрации
function checkboxReg(){

  let element = document.querySelector('#checkInfo');   
  let btn = document.querySelector(".btn-signup");


   if(!element.checked){
    btn.disabled;
    btn.classList.add("disabled");
   }
   else{
    btn.classList.remove("disabled");
   }
}


var flkty = new Flickity( '.main-gallery', {
    // options
    
    cellAlign: 'left',
    contain: true
  });
  


 // Валидация логина при регистрации
  function ValidationRegLogin(value){
         let errors = document.querySelector(".errors");
         let btn = document.querySelector(".btn-signup");
         
      
         
        if(value.length < 6 || value.length >19 ){
           
          btn.disabled;
          btn.classList.add("disabled");
          errors.innerHTML = "*Логин должен быть от 6 до 20 символов";
        }

        else if(/^[a-zA-Z1-9]+$/.test(value) === false){

          btn.disabled;
          btn.classList.add("disabled");
          errors.innerHTML = "*Логин может содержать только буквы латинского алфавита и цифры";

        }
        else{
          errors.innerHTML = "";
          btn.classList.remove("disabled");
          checkboxReg();
       }  

  }
  

 // Валидация пароля при регистрации
  function ValidationRegPass(value){
   
  
    let confirmPass = document.querySelector(".confirmpassword");
    let errors = document.querySelector(".errors");
    let btn = document.querySelector(".btn-signup");
    
   
  
  if(value.length < 6){

    btn.disabled;
    btn.classList.add("disabled");
    errors.innerHTML = "*Пароль должен быть не менее 6 символов";

  }
  

  else{
     errors.innerHTML = "";
     btn.classList.remove("disabled");
     checkboxReg();

  }
  

  }
 // Проверка совпадения паролей
  function ValidationRegConfirmPass(value){
   
    let pass = document.querySelector(".password").value;
    let confirmPass = document.querySelector(".confirmpassword").value;
    let errors = document.querySelector(".errors");
    let btn = document.querySelector(".btn-signup");
   

  if(pass != confirmPass){

    errors.innerHTML = "*Пароли не совпадают";
    return false;
  }

  else if(/^[a-zA-Z1-9]+$/.test(pass) === false){
    
    errors.innerHTML = "*Пароль может содержать только <br> буквы латинского алфавита и цифры";
    return false;
  }

 

  else{
     errors.innerHTML = "";
     return true;
  }
}



// Корзина----------------------------------------------

function addToCart(){

  
  let article = document.querySelector("#product_article ").value;
  let name = document.querySelector("#product_name").value;
  let price = document.querySelector("#product_price").value;
  let size = document.querySelector("#product_size").value;
  let img = document.querySelector("#product_img").value;
  let brand = document.querySelector("#product_brand").value;



  if(localStorage.getItem('cart') == null){
    
    let cart = [];                                      // Если localstorage['cart'] не задана, объявляем массив, 
    let array = {article, name, brand, price, size,img};
    cart.push(array);                                     // Добавляем в него объект с информацией о товаре
    localStorage.setItem('cart',JSON.stringify(cart));    // Преобразуем объект в JSON, и добавляем в localstorage
  }
  else{
    let array = {article, name, brand, price, size, img};
    let cart = JSON.parse(localStorage.getItem("cart"));
    cart.push(array);
    localStorage.setItem('cart',JSON.stringify(cart));
  }

  console.log(JSON.parse(localStorage.getItem("cart")));
  
}
if(document.querySelector(".cart") != null){
 document.addEventListener("DOMContentLoaded",cartView());
 
}


 // Отображение корзины
function cartView(){
  
  let view = document.querySelector(".cart");
  
  let cart = JSON.parse(localStorage.getItem("cart"));
  let fullPrice = 0;
  

  cart.forEach(function(item){
   console.log(item);
   fullPrice += Number(item['price']);
   view.innerHTML += "<div>" + "<img src= ./assets/img/sneakers/" + item['img'] + ".png width=150px> " + "</div>";
   view.innerHTML += "<div>Артикул товара: <span>" + item['article'] + "</span></div>";
   view.innerHTML += "<div>Бренд: <span>" + item['brand'] + "</span></div>";
   view.innerHTML += "<div> <span>Размер : </span><span>" + item['size'] + "</span> </div>";
   view.innerHTML += "<div>Название: <span>" + item['name'] + "</span></div>";
   view.innerHTML += "<div>Цена: <span>" + item['price'] + "</span></div>";
   
   view.innerHTML += "<button   onclick =  deleteFromCart(" + item['id'] + ")  >Удалить из корзины </button>";
   
  })
  view.innerHTML += "<div> сумма " + fullPrice + "</div>";
  

}



 // Удаление позиции из корзины
function deleteFromCart(id){
  
  
   
  let cart = JSON.parse(localStorage.getItem("cart"));

for(let i=0; i < cart.length; i++ ){
  if(cart[i]['id'] == id){

          delete cart[i];
          cart.sort();
          cart.pop();
          console.log(cart);

      localStorage.setItem('cart',JSON.stringify(cart)); 
      window.location.reload();
    break;
  }
}

}




