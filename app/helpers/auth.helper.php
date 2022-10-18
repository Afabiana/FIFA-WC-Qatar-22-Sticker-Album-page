<?php
class AuthHelper{

    //lo puedo usar para cualquier tipo de controller o view
    public function checkLoggedIn(){
        session_start();
    
       if(!isset($_SESSION['USER_EMAIL'])){
           return false;
        }
        
        else {
            return true;
        }
    }
}