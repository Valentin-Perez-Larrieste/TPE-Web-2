<?php
class CatalogueView {
    public function showCatalogue($catalogue, $genres) {
        $countBooks = count($catalogue);
        $countGenres = count($genres);

        require 'templates/catalogue.phtml';
    }

    public function showBook($book) {
        require 'templates/book.phtml';
    }
}