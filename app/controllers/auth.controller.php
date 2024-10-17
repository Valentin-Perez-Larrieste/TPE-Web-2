<?php
require_once 'app/models/user.model.php';
require_once 'app/views/auth.view.php';

class AuthController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin() {
        return $this->view->showLogin();
    }
    
    public function login() {
        $email = $_POST['email'];
        $password = $_POST['contraseña'];
        
        $userFromDB = $this->model->getUser($email);

        if ($userFromDB && password_verify($password, $userFromDB->password)) {
            session_start();
            $_SESSION['ID_USER'] = $userFromDB->id;
            $_SESSION['EMAIL_USER'] = $userFromDB->email;
            $_SESSION['LAST_ACTIVITY'] = time();

            header ('location: '. BASE_URL);
            exit();
        } else {
            return $this->view->showLogin('Credenciales incorrectas');
        }

    }

    public function logout() {
        session_start();
        session_destroy();

        header ('location: '. BASE_URL);
    }
}