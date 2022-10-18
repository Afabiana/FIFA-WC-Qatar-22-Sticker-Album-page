<?php
require_once './app/controllers/teams.controller.php';
require_once './app/controllers/stickers.controller.php';
require_once './app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; 
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}


$params = explode('/', $action);

if(!empty($params[1])&&$params[0]!="team"){
    $name=ucfirst($params[1]);
    $controller = $name."Controller";
    $controller= new $controller();
}


switch ($params[0]) {
    case 'login':
        $controller->showLogin();
        break;
    case 'logout':
        $controller->logOut();
        break;
    case 'verify':
        $controller->verifyLogin();
        break;
    case 'logout';
        $controller->logOut();
        break;
    case 'home':
        $teamsController= new TeamsController();
        $teamsController->showTeamsAndStickers();
        break;
    case 'add':
        $controller->showFormAdd();
        break;
    case 'insert':
        $controller->insert();
        break;
    case 'delete': //controlador/:nombre-apellido
        $controller->delete($params[2]);
        break;
    case 'show': //controlador/:nombre-apellido
        $controller->showUpdateForm($params[2]);
        break;
    case 'update': //controllador/
        $controller->update();
        break;
    case 'team': // pais/ :nombre de pais
        $teamsController= new TeamsController();
        $teamsController->getStickersByTeam($params[1]);
        break;
    case 'selecciones':
        $teamsController= new TeamsController();
        $teamsController->showTeams();
        break;
    default:
        echo('404 Page not found');
        break;
}
