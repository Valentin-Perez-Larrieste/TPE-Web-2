<?php
class registerModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe-web-2;charset=utf8', 'root', '');
    }

    public function registerUser($registro) {
        $query = $this->db->prepare("INSERT INTO usuario (nombre, apellido, dni, telefono, email, estado, password) VALUES
        (:nombre, :apellido, :dni, :telefono, :email, :estado, :password)");

        $params = [
            ':nombre' => $registro['nombre'],
            ':apellido' => $registro['apellido'],
            ':dni' => $registro['dni'],
            ':telefono' => $registro['telefono'],
            ':email' => $registro['email'],
            ':estado' => $registro['estado'],
            ':password' => $registro['contraseña'],
        ];
        

        // Ejecutar la consulta
        return $query->execute($params);
    }
}