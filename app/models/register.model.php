<?php
class registerModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe-web-2;charset=utf8', 'root', '');
    }

    public function registerUser($registro) {
        $query = $this->db->prepare("INSERT INTO `usuario` (`nombre`, `apellido`, `dni`, `telefono`, `email`, `estado`, 'contraseña') VALUES
        (:nombre, :apellido, :dni, :telefono, :email, :estado, :contraseña)");

        // $query->bindParam(':nombre', $nombre);
        // $query->bindParam(':apellido', $apellido);
        // $query->bindParam(':dni', $dni);
        // $query->bindParam(':telefono', $telefono);
        // $query->bindParam(':email', $email);
        // $query->bindParam(':estado', $estado);
        // $query->bindParam(':contraseña', $contraseña); 

        return($query->execute($registro));

        
 }

}