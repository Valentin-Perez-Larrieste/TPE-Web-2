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
}