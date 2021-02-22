<main class = "main_empty">
<h1 class="new_h1">Бренды</h1>
<ul>
<?php



   foreach($array as $value){
     
    
         
         
       echo 
      
       '<a href="' . SITE_ROOT . 'brands/' . $value['brand_name']. '" >
       <li>'   . $value['brand_name'].   '</li>

       </a>';
       
         

        
   }



  
  
  

  ?>

</ul>

</main>