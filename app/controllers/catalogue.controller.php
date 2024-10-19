<?php
require_once 'app/models/catalogue.model.php';
require_once 'app/views/catalogue.view.php';

class CatalogueController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new CatalogueModel();
        $this->view = new CatalogueView();
    }

    public function showCatalogue() {
        session_start();
        if(isset($_SESSION['ID_USER'])) {
            $catalogue = $this->model->getCatalogue();
            $genres = $this->model->getGenres();

            return $this->view->showCatalogue($catalogue, $genres);
        } else {
            header ('location: '. BASE_URL . 'showLogin');
        }
    }

    public function showBook($id, $genres = null) {
        session_start();

        $book = $this->model->getBook($id);

        return $this->view->showBook($book, $genres);
    }
    public function showBookByGenres($ID_genero){
        session_start();

        $books = $this->model->getBookByGenres($ID_genero);
        $genre = $this->model->getGenre($ID_genero);

        return $this->view->showBooks($books, $genre);

    }
    public function deleteBook($id) {

        $this->model->deleteBook($id);

        header ('location: '. BASE_URL . 'catalogue');
    }
    public function showAddBook() {
        session_start();
        
        $genres = $this->model->getGenres();
        return $this->view->showAddBook($genres);
    }
    public function addBook() {
        $nombre = $_POST['nombre'];
        $autor = $_POST['autor'];
        $editorial = $_POST['editorial'] ?? null;
        $genero = $_POST['genero'];
        $ID_genero = $_POST['ID_genero'];
        $ID_genero2 = !empty($_POST['ID_genero2']) ? $_POST['ID_genero2'] : null;
        $ID_genero3 = !empty($_POST['ID_genero3']) ? $_POST['ID_genero3'] : null;
        $stock = $_POST['stock'];

        $this->model->addBook($nombre, $autor, $editorial, $genero, $ID_genero, $ID_genero2, $ID_genero3, $stock);

        header('Location: ' . BASE_URL . 'catalogue');
    }
    public function editBook($id){ 
        $book = $this->model->getBook($id); 

        $nombre = $_POST['nombre'];
        $autor = $_POST['autor'];
        $editorial = $_POST['editorial'];
        $genero = $_POST['genero'];
        $ID_genero = $_POST['ID_genero'];
        $ID_genero2 = !empty($_POST['ID_genero2']) ? $_POST['ID_genero2'] : null;
        $ID_genero3 = !empty($_POST['ID_genero3']) ? $_POST['ID_genero3'] : null;
        $stock = $_POST['stock'];

        $this->model->editBook($id, $nombre, $autor, $editorial, $genero, $ID_genero, $ID_genero2, $ID_genero3, $stock);

        header('Location: ' . BASE_URL . 'book/' . $book -> id);
    }

    public function deleteGenre($id) {

        $this->model->deleteGenre($id);

        header ('location: '. BASE_URL . 'catalogue');
    }
    public function showAddGenre() {
        session_start();

        return $this->view->showAddGenre();
    }
    public function addGenre() {
        $nombre = $_POST['nombre'];

        $this->model->addGenre($nombre);

        header('Location: ' . BASE_URL . 'catalogue');
    }
    public function editGenre($id){
        $genre = $this->model->getGenre($id);

        $nombre = $_POST['nombre'];

        $this->model->editGenre($id, $nombre);

        header('Location: ' . BASE_URL . 'catalogue');
    }
}