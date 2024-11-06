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
            $catalogue = $this->model->getCatalogue();
            $genres = $this->model->getGenres();

            return $this->view->showCatalogue($catalogue, $genres);
    }

    public function showBook($id, $genres = null, $bookGenres = null) {
        $book = $this->model->getBook($id);

        $ID_genero = $book->ID_genero;
        $ID_genero2 = $book->ID_genero2;
        $ID_genero3 = $book->ID_genero3;
        $bookGenres = $this->model->getGenresById($ID_genero, $ID_genero2, $ID_genero3);

        $genres = $this->model->getGenres();

        return $this->view->showBook($book, $genres, $bookGenres);
    }
    public function showBookByGenres($ID_genero){
        $books = $this->model->getBookByGenres($ID_genero);
        $genre = $this->model->getGenre($ID_genero);

        return $this->view->showBooks($books, $genre);

    }
    public function deleteBook($id) {

        $this->model->deleteBook($id);

        header ('location: '. BASE_URL . 'catalogue');
    }
    public function showAddBook() {
        $genres = $this->model->getGenres();
        return $this->view->showAddBook($genres);
    }
    public function addBook() {
        $nombre = $_POST['nombre'];
        $autor = $_POST['autor'];
        $editorial = $_POST['editorial'] ?? null;
        $ID_genero = $_POST['ID_genero'];
        $ID_genero2 = !empty($_POST['ID_genero2']) ? $_POST['ID_genero2'] : null;
        $ID_genero3 = !empty($_POST['ID_genero3']) ? $_POST['ID_genero3'] : null;
        $stock = $_POST['stock'];

        $this->model->addBook($nombre, $autor, $editorial, $ID_genero, $ID_genero2, $ID_genero3, $stock);

        header('Location: ' . BASE_URL . 'catalogue');
    }
    public function editBook($id){ 
        $book = $this->model->getBook($id); 

        $nombre = $_POST['nombre'];
        $autor = $_POST['autor'];
        $editorial = $_POST['editorial'];
        $ID_genero = $_POST['ID_genero'];
        $ID_genero2 = !empty($_POST['ID_genero2']) ? $_POST['ID_genero2'] : null;
        $ID_genero3 = !empty($_POST['ID_genero3']) ? $_POST['ID_genero3'] : null;
        $stock = $_POST['stock'];

        $this->model->editBook($id, $nombre, $autor, $editorial, $ID_genero, $ID_genero2, $ID_genero3, $stock);

        header('Location: ' . BASE_URL . 'book/' . $book -> id);
    }

    public function deleteGenre($id) {

        $this->model->deleteGenre($id);

        header ('location: '. BASE_URL . 'catalogue');
    }
    public function showAddGenre() {
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