<?php
class CatalogueModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe-web-2;charset=utf8', 'root', '');
    }

    public function getCatalogue() {
        $query = $this->db->prepare('SELECT * FROM libro');
        $query->execute();

        $catalogue = $query->fetchAll(PDO::FETCH_OBJ);

        return $catalogue;
    }
}