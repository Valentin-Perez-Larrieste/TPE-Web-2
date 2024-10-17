<?php
require_once 'index.php';
require_once 'app/controllers/catalogue.controller.php';
require_once 'app/controllers/auth.controller.php';
require_once 'app/controllers/register.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

/*
Tabla de Ruteo

home -> showHome();
showLogin -> AuthController->showLogin();
login -> AuthController->login();
showRegisrer -> RegisterController->showRegister();
register -> RegisterController->register();
logout -> AuthController->logout();
catalogue -> CatalogueController()->showCatalogue();
book/ :ID -> CatalogueController()->showBook($id);
genre/ :ID -> CatalogueController()->showBookByGenre($id);
*/

$params = explode('/', $action);

switch($params[0]) {
    case 'home':
        showHome();
        break;
    case 'showLogin':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'login':
        $controller = new AuthController();
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
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
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