<?php
require_once 'app/models/login.model.php';
require_once 'app/views/login.view.php';

class LoginController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new LoginModel();
        $this->view = new LoginView();
    }

    public function showLogin() {

        return $this->view->showLogin();
    }
    
    public function login() {
        if (!isset($_POST['email']) || empty($_POST['email'])) {
            return $this->view->showError('Falta completar el email');
        }
        if (!isset($_POST['contraseña']) || empty($_POST['contraseña'])) {
            return $this->view->showError('Falta completar la contraseña');
        }
        $email = $_POST['email'];
        $contraseña = $_POST['contraseña'];
        
        $userFromDB = $this->model->getUser($email,$contraseña);
        if ($userFromDB == NULL) {
            return $this->view->showError('no existe el usuario');
        }    
        header ('location: '. BASE_URL . 'catalogue');

    }
}