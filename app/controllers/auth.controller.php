<?php
require_once './app/models/user.model.php';
require_once './app/views/auth.view.php';

class AuthController{
    private $model;
    private $view;
    public function __construct(){
        $this->model= new UserModel();
        $this->view= new AuthView();
    }

    public function showLogin(){
        $this->view->showLogin();
    }
    
    public function logOut(){
        //VA AL SERVIDOR Y BORRA TODO LO REFERENTE A LA SESSION. BORRA EL $_SESSION MIO
        session_start();
        session_destroy();
        $this->view->showLogin("Cierre de sesion exitoso!");
    }

    public function verifyLogin(){
      if(!empty($_POST['email'])&&!empty($_POST['password'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
      }
        $usuario=$this->model->getUserByEmail($email);
        if($usuario && password_verify($password, $usuario->password)){
            session_start(); //cada vez que yo quiero acceder a $_session arriba tiene que estar el session start. 
            //Hago ss para iniciar la consulta de la variable $_session
            //$_SESSION["email"]=$email;
            $_SESSION['USER_ID'] = $usuario->id;
            $_SESSION['USER_EMAIL'] = $usuario->email;
            $_SESSION['IS_LOGGED'] = true;

            header("Location: ".BASE_URL);
        }else{
            $this->view->showLogin("acceso denegado");
        }
    }
}