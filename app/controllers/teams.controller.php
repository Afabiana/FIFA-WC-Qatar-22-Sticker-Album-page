<?php
include_once './app/models/teams.model.php';
include_once './app/views/teams.view.php';
require_once './app/helpers/auth.helper.php';

class TeamsController{
    private $view;
    private $model;

    function __construct()
    {
        $this->view= new TeamsView;
        $this->model= new TeamsModel;
        $this->authHelper = new AuthHelper();
    }

    function showTeamsAndStickers()
    {
        $this->authHelper->verifySession();
        $allContent=$this->model->getAll();
        $this->view->ShowAll($allContent->teams,$allContent->stickers);
    }

    function showFormAdd()
    {
        $this->authHelper->checkLoggedIn();
        $this->view->showFormAdd();
    }

    function insert()
    { 
        $this->authHelper->checkLoggedIn();
        $pais=$_POST['pais'];
        if(!empty($_POST['pais'])&&isset($_POST['pais'])&&
        !empty($_FILES['bandera_dir']['name'])&&isset($_FILES['bandera_dir']['name'])&&
        $_FILES['bandera_dir']["type"]=="image/png"){
            $this->model->insert($pais,$_FILES['bandera_dir']['tmp_name']);
        }
        header("Location: ".BASE_URL.'selecciones');
    }

    function delete($pais)
    {
        $this->authHelper->checkLoggedIn();
        $this->model->delete($pais);
        header("Location: ".BASE_URL."selecciones");
    }

    function showUpdateForm($pais)
    {
        $this->authHelper->verifySession();
        $infopais=$this->model->getIndividualInfo($pais);
        $this->view->showIndividualInfo($infopais);
    }

    function update()
    {
        $this->authHelper->checkLoggedIn();
        $id=$_POST['id'];

        if(isset($_POST['pais'])&&!empty($_POST['pais'])){
            $pais=$_POST['pais'];
            $this->model->setPaisbyId($id,$pais);
        }
        if($_FILES['bandera_dir']['type']=="image/png"){
            $tmpname=$_FILES["bandera_dir"]["tmp_name"];
            $this->model->setBanderaDirbyId($id,$tmpname);
        } 
        $paisToURL=$this->model->getPaisById($id);
        header("Location: ".BASE_URL."show/teams/$paisToURL");
    }

    function getStickersByTeam($pais){
        $this->authHelper->verifySession();
        $stickers=$this->model->getStickersByTeam($pais);
        $this->view->showStickersByTeam($pais, $stickers);
    }

    function showTeams(){
        $this->authHelper->verifySession();
        $teams=$this->model->getAllTeams();
        $this->view->showTeams($teams);
    }
}