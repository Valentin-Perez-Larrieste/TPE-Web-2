<?php
require_once 'app/models/register.model.php';
require_once 'app/views/register.view.php';

class registerController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new registerModel();
        $this->view = new registerView();
    }

    public function showRegister() {

        return $this->view->showRegister();
    }
    
    public function register() {
        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->view->showError('Falta completar el nombre de usuario');
        }
        if (!isset($_POST['apellido']) || empty($_POST['apellido'])) {
            return $this->view->showError('Falta completar el apellido');
        }
        if (!isset($_POST['dni']) || empty($_POST['dni'])) {
            return $this->view->showError('Falta completar el DNI');
        }
        if (!isset($_POST['telefono']) || empty($_POST['telefono'])) {
            return $this->view->showError('Falta completar el numero de telefono');
        }
        if (!isset($_POST['email']) || empty($_POST['email'])) {
            return $this->view->showError('Falta completar el nombre de usuario');
        }
        if (!isset($_POST['password']) || empty($_POST['password'])) {
            return $this->view->showError('Falta completar la contraseña');
        }
        $registro = [
            'nombre' => $_POST['nombre'],
            'apellido' => $_POST['apellido'],
            'dni' => $_POST['dni'],
            'telefono' => $_POST['telefono'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'estado' => 'no deudor',  
        ];
        
        
        if (!$this->model->registerUser($registro)) {
            return $this->view->showError('el usuario no se pudo crear');
        }    
        header ('location: '. BASE_URL . 'showLogin');

    }
}