<?php
class AuthHelper{

    public function checkLoggedIn() {
        session_start();
        if (!isset($_SESSION['IS_LOGGED'])) {
            header("Location: " . BASE_URL . 'login/Auth');
            die();
        }
    } 

     //abro la "caja" $_SESSION. Si esta vacia muestra la vista publica, sino vista de admin 
    public function verifySession(){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

}