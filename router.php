<?php
require_once './controllers/pay.controller.php';
require_once('./libs/smarty/Smarty.class.php');

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'list'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// instancio el unico controller que existe por ahora
$payController = new PayController();


// tabla de ruteo
switch ($params[0]) {
    case 'list':
        $payController->showPayments();
        break;
    case 'add':
        $payController->etc();
        break;
    case 'delete':
        // obtengo el parametro de la acción
        $id = $params[1];
        $payController->deletePayment($id);
        break;
    default:
        echo('404 Page not found');
        break;
}
