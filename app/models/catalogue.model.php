<?php
class CatalogueModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe-web-2;charset=utf8', 'root', '');
    }

    public function getCatalogue() {
        $query = $this->db->prepare('SELECT * FROM libro ORDER BY nombre ASC');
        $query->execute();

        $catalogue = $query->fetchAll(PDO::FETCH_OBJ);

        return $catalogue;
    }

    public function getGenres() {
        $query = $this->db->prepare('SELECT * FROM géneros ORDER BY nombre ASC');
        $query->execute();

        $genres = $query->fetchAll(PDO::FETCH_OBJ);

        return $genres;
    }

    public function getBook($id) {
        $query = $this->db->prepare('SELECT * FROM libro WHERE id = ?');
        $query->execute([$id]);

        $book = $query->fetch(PDO::FETCH_OBJ);
        
        return $book;
    }
    public function getBookByGenres($ID_genero) {
        $query = $this->db->prepare('SELECT * FROM libro WHERE ID_genero = :id OR ID_genero2 = :id OR ID_genero3 = :id');
        $query->execute([':id'=>$ID_genero]);

        $books = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $books;
    }

}