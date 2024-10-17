<?php
class LoginModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe-web-2;charset=utf8', 'root', '');
    }

    public function getUser($email, $contraseña) {
        $query = $this->db->prepare("SELECT * FROM usuario WHERE email = :email");

        $query->bindParam(':email', $email);

        $query->execute();

        $user = $query->fetch(PDO::FETCH_ASSOC);
        
        if ($user && $contraseña === $user['password']) {
            return $user;
        
        }

        return null;
    }

}