<?php
class CatalogueView {
    public function showCatalogue($catalogue, $genres) {
        $countBooks = count($catalogue);
        $countGenres = count($genres);

        require 'templates/catalogue.phtml';
    }

    public function showBook($book, $genres) {
        require 'templates/book.phtml';
    }

    public function showBooks($books, $genre) {
        require 'templates/books.phtml';
    }

    public function showAddBook($genres) {
        require 'templates/formAddBook.phtml';
    }

    public function showAddGenre() {
        require 'templates/formAddGenre.phtml';
    }
}