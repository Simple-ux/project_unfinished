<?php



 function connect(){
   $connect= mysqli_connect('localhost', 'root', '', 'sneakershop');
   mysqli_set_charset($connect, 'utf8');
		return $connect;

}

   
?>
