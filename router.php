<?php
require_once './app/controllers/series.controller.php';
require_once './app/controllers/platforms.controller.php';
require_once './app/controllers/login.controller.php';

require_once('./libs/smarty/Smarty.class.php');

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

define('LOGIN', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/login');



$action = 'home'; // acción por defecto


if(!empty($_GET['action'])) {
    $action = $_GET['action'];
}


// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);



// tabla de ruteo

switch ($params[0]) {
    case 'login':
        $loginController = new LoginController();
        $loginController->showLogin();
        break;
    case 'verify':
        $loginController = new LoginController();
        $loginController->verifyLogin();
        break;
    case 'logout':
        $loginController = new LoginController();
        $loginController->logout();   
        break;  
    case 'home':
        $serieController = new SeriesController();
        $serieController->showHome();
        break;
    case 'series':
        $serieController = new SeriesController();
        $serieController->showAllSeries();
        break;
    case 'platforms':
        $platformsController = new PlatformsController();
        $platformsController->showAllPlatforms();
        break;   
    case 'search':
        $platformsController = new PlatformsController();
        $platformsController->searchByPlatform();
        break;       
    case 'filter':
        $platformsController = new PlatformsController();
        $platformsController->seriesFiltred();
        break;
    case 'viewSerie':
        $serieController = new SeriesController();
        $serieController->viewSerie($params[1]);
        break;     
    case 'addSerie':
        $serieController = new SeriesController();
        $serieController->addNewSerie();
        break;
    case 'addPlatform':
        $platformsController = new PlatformsController();
        $platformsController->addNewPlatform();
        break;      
    case 'updateSerie':
        $serieController = new SeriesController();
        $id = $params[1];
        $serieController->updateSerie($id);   
        break;
    case 'confirmUpdSerie':
       $serieController = new SeriesController();
       $serieController->confirmUpdateSerie();  
        break;
    case 'updatePlatform':
        $platformsController = new PlatformsController();
        $id = $params[1];
        $platformsController->updatePlatform($id);   
        break;
    case 'confirmUpdPlatform':
        $platformsController = new PlatformsController();
        $platformsController->confirmUpdatePlatform();  
        break;
    case 'deleteSerie':
        $serieController = new SeriesController();
        $id = $params[1];
        $serieController->deleteSerie($id);
        break;
    case 'deletePlatform':
        $platformsController = new PlatformsController();
        $id = $params[1];
        $platformsController->deletePlatform($id);
        break;  
    default:
        echo('404 Page not found');
        break;
}
