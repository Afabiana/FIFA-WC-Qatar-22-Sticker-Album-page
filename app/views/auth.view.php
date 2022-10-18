<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class AuthView{

    private $smarty;

    public function __construct()
    {
        $this->smarty= new Smarty();
    }

    public function showLogin($error=null)
    {
        $this->smarty->assign('title', 'Log In');
        $this->smarty->assign('error', $error);
        $this->smarty->display('login.tpl');
    }
    //password_Verify: obtiene el hash

    public function showHomeLocation(){
        header('Location: '.BASE_URL."home");
    }
}