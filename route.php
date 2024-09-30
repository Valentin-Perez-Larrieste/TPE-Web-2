<?php 

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

/*
Tabla de Ruteo

home -> showHome();
login -> COMPLETAR
register -> COMPLETAR
catalogue -> catalogueController()->showCatalogue();
book/ :ID -> catalogueController()->showBook($id);
*/

$params = explode('/', $action);

switch($params[0]) {
    case 'home':

        break;
    case 'login':

        break;
    case 'register':

        break;
    case 'catalogue':
        $controller = new catalogueController();
        $controller->showCatalogue();
        break;
    case 'book':
        $controller = new catalogueController();
        $controller->showBook($params[1]);
        break;
    default:
        echo "404 Page not found";
        break;
}