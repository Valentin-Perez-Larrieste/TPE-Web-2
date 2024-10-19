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

    public function showBook($id) {
        session_start();

        $book = $this->model->getBook($id);

        return $this->view->showBook($book);
    }
    public function showBookByGenres($ID_genero){
        session_start();

        $books = $this->model->getBookByGenres($ID_genero);

        return $this->view->showBooks($books);

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
        $ID_genero = $_POST['ID_genero'];
        $ID_genero2 = !empty($_POST['ID_genero2']) ? $_POST['ID_genero2'] : null;
        $ID_genero3 = !empty($_POST['ID_genero3']) ? $_POST['ID_genero3'] : null;
        $stock = $_POST['stock'];

        $this->model->addBook($nombre, $autor, $editorial, $ID_genero, $ID_genero2, $ID_genero3, $stock);

        header('Location: ' . BASE_URL . 'catalogue');
    }
}