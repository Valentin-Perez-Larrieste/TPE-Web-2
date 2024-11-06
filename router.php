<?php
require_once 'index.php';
require_once 'libs/response.php';
require_once 'app/middlewares/session.auth.middleware.php';
require_once 'app/middlewares/verify.auth.middleware.php';
require_once 'app/controllers/catalogue.controller.php';
require_once 'app/controllers/auth.controller.php';
require_once 'app/controllers/register.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res = new Response();

$action = 'home';
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
deleteBook/ :ID -> CatalogueController()->deleteBook($id);
showAddBook -> CatalogueController()->showAddBook;
addBook -> CatalogueController()->addBook();
editBook/ :ID -> CatalogueController()->editBook($id);
deleteGenre/ :ID -> CatalogueController()->deleteGenre($id);
showAddGenre -> CatalogueController()->showAddGenre();
addGenre -> CatalogueController()->addGenre();
editGenre/ :ID -> CatalogueController()->editGenre($id);
*/

$params = explode('/', $action);

switch($params[0]) {
    case 'home':
        sessionAuthMiddleware($res);
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
        sessionAuthMiddleware($res);
        $controller = new CatalogueController();
        $controller->showCatalogue();
        break;
    case 'book':
        sessionAuthMiddleware($res);
        $controller = new CatalogueController();
        $controller->showBook($params[1]);
        break;
    case 'genre':
        sessionAuthMiddleware($res);
        $controller = new CatalogueController();
        $controller->showBookByGenres($params[1]);
        break;
    case 'deleteBook':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new CatalogueController();
        $controller->deleteBook($params[1]);
        break;
    case 'showAddBook':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new CatalogueController();
        $controller->showAddBook();
        break;
    case 'addBook':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new CatalogueController();
        $controller->addBook();
        break;
    case 'editBook':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new CatalogueController();
        $controller->editBook($params[1]);
        break;
    case 'deleteGenre':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new CatalogueController();
        $controller->deleteGenre($params[1]);
        break;
    case 'showAddGenre':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new CatalogueController();
        $controller->showAddGenre();
        break;
    case 'addGenre':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new CatalogueController();
        $controller->addGenre();
        break;
    case 'editGenre':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new CatalogueController();
        $controller->editGenre($params[1]);
        break;
    default:
        echo "404 Page not found";
        break;
}