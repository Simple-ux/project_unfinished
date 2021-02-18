<?php
include_once("./components/db.php");

class Helper{

    function isAdmin() 
        {
            return isset($_COOKIE['admin']) && $_COOKIE['admin'] == 1;
        }
    
    
    
    function generateToken($size = 32)
        {
            
            $symbols = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd'];
            $lenght = count($symbols) - 1;
            $token = '';
            for ($i = 0; $i < $size; $i++) {
                $token .= $symbols[rand(0, $lenght)];
                
            }
            return $token;
        }
    
    function isAuthorized()
        {
            $isAuthorized = false;
            if (isset($_COOKIE['user_id']) and isset($_COOKIE['token'])){
                $user_id = $_COOKIE['user_id'];
                $token = $_COOKIE['token'];
                $db = connect();
                $query = "
                    SELECT `connect_id`, UNIX_TIMESTAMP(`connect_token_time`) AS `token_time`
                    FROM `connects`
                    WHERE `connect_user_id` = $user_id
                    AND `connect_token` = '$token';
                ";
                $result = mysqli_query($db, $query);
                $connect_info = mysqli_fetch_assoc($result);
                
                if ($connect_info) {
                    $isAuthorized = true;
                   
                    if (time() > $connect_info['token_time']) {
                        
                        $new_token = $this -> generateToken();
                        $new_token_time = time() + 15*60;
                        $connect_id = $connect_info['connect_id'];
                        
                        $query = "
                            UPDATE `connects`
                            SET `connect_token` = '$new_token',
                                `connect_token_time` = FROM_UNIXTIME($new_token_time)
                            WHERE `connect_id` = $connect_id;
                        ";
                        
                        
                        mysqli_query($db, $query);
                        setcookie('token', $new_token, time() + 2*24*60);
                        if($_COOKIE['admin'] == 1){
                        setcookie('admin', 0);
                        }
                    }
                    
                }
            }
            
                
            
            return $isAuthorized;
        }
       }