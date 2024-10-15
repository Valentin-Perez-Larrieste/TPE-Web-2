<?php
require_once 'index.php';
require_once 'app/controllers/catalogue.controller.php';
require_once 'app/controllers/login.controller.php';
require_once 'app/controllers/register.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

/*
Tabla de Ruteo

home -> showHome();
login -> showLogin();
logout -> COMPLETAR
register -> COMPLETAR
catalogue -> catalogueController()->showCatalogue();
book/ :ID -> catalogueController()->showBook($id);
*/

$params = explode('/', $action);

switch($params[0]) {
    case 'home':
        showHome();
        break;
    case 'showLogin':
        $controller = new LoginController();
        $controller->showLogin();
        break;
    case 'login':
        $controller = new LoginController();
        $controller->login();
        break;
    case 'showRegister':
        $controller = new registerController();
        $controller->showRegister();
        break;    
    case 'register':
        $controller = new registerController();
        $controller->register();
        break;
    case 'catalogue':
        $controller = new CatalogueController();
        $controller->showCatalogue();
        break;
    case 'book':
        $controller = new CatalogueController();
        $controller->showBook($params[1]);
        break;
    case 'genre':
        $controller = new CatalogueController();
        $controller->showBookByGenres($params[1]);
        break;
    default:
        echo "404 Page not found";
        break;
}