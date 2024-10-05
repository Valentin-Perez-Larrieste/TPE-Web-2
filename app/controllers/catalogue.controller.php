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

    public function showBook($id) {
        $book = $this->model->getBook($id);

        return $this->view->showBook($book);
    }
}