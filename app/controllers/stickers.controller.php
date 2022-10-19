<?php
require_once './app/models/stickers.model.php';
require_once './app/views/stickers.view.php';
require_once './app/helpers/auth.helper.php';

class StickersController{
    private $model;
    private $view;

    function __construct()
    {
        $this->view= new StickersView;
        $this->model= new StickersModel;
        $this->authHelper = new AuthHelper();
    }

    function showFormAdd()
    {
        $this->authHelper->checkLoggedIn();
        $teams=$this->model->getTeams();
        $this->view->showFormAdd($teams);
    }

    function insert()
    {
        $this->authHelper->checkLoggedIn();
        if((isset($_POST['nombre'])&&!empty($_POST['nombre']))&&
        (isset($_POST['apellido'])&&!empty($_POST['apellido']))&&
        (isset($_POST['numero'])&&!empty($_POST['numero']))&&
        (isset($_POST['seleccion'])&&!empty($_POST['seleccion']))){
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $numero=$_POST['numero'];
            $seleccion=$_POST['seleccion'];
            if($_FILES['image_dir']["type"]=="image/png"){
                $this->model->insert($nombre,$apellido,$numero,$_FILES['image_dir']['tmp_name'],$seleccion);
            }
        }
        header("Location: ". BASE_URL);
    }

    function delete($arrNames)
    {   
        $this->authHelper->checkLoggedIn();
        $names=explode("-",$arrNames);
        $nombre=$names[0];
        $apellido=$names[1];
        $this->model->delete($nombre,$apellido);
        header("Location: ".BASE_URL);
    }

    function showUpdateForm($arrNames)
    {
        $this->authHelper->verifySession();
        $names=explode("-",$arrNames);
        $nombre=$names[0];
        $apellido=$names[1];
        $info=$this->model->getIndividualInfo($nombre,$apellido);
        $this->view->showUpdateForm($info->StickerInfo, $info->teams);
    }

    function update()
    {
        $this->authHelper->checkLoggedIn();
        $id=$_POST['id'];
        //podria usar la variable numero antes de que sea seteada? SI pero si justo esa variable viene vacia SE ROMPE TODO

        if(isset($_POST['nombre'])&&!empty($_POST['nombre'])){
            $nombre=$_POST['nombre'];
            $this->model->setNamebyId($id,$nombre);
        }
        if(isset($_POST['apellido'])&&!empty($_POST['apellido'])){
            $apellido=$_POST['apellido'];
            $this->model->setApellidobyId($id,$apellido);
        }
        if(isset($_POST['pais'])&&!empty($_POST['pais'])){
            $seleccion=$_POST['pais'];
            $this->model->setSeleccionbyId($id,$seleccion);
        }
        if($_FILES['image_dir']['type']=="image/png"){
            $tmpname=$_FILES["image_dir"]["tmp_name"];
            $this->model->setImageDirbyId($id,$tmpname);
        } 
        //si o si setear ultimo el numero
        //sino la bd va a buscar x dato con un id que todavia no existe
        if(isset($_POST['numero'])&&!empty($_POST['numero'])){
            $numero=$_POST['numero'];
            $sticker=$this->model->alreadyExists($numero);

            if(!empty($sticker)&&isset($sticker)){
                $this->showError($id);
            }else{
                $this->model->setNumerobyId($id,$numero);
                $id=$numero;
            }

        }
        //redirecciono
        $nombres=$this->model->getNamesById($id);
        $nombre=$nombres[0]->nombre;
        $apellido=$nombres[0]->apellido;
        header("Location: ".BASE_URL."show/stickers/$nombre-$apellido");
    }

    private function showError($id){
        $nombres=$this->model->getNamesById($id);
        $nombre=$nombres[0]->nombre;
        $apellido=$nombres[0]->apellido;
        $info=$this->model->getIndividualInfo($nombre,$apellido);
        $this->view->showUpdateForm($info->StickerInfo, $info->teams, "Lo sentimos ese numero ya fue asignado");
    }
}