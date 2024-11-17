<?php
class CatalogueView {
    public function showCatalogue($catalogue, $genres) {
        require 'templates/catalogue.phtml';
    }

    public function showBook($book, $genres, $bookGenres) {
        require 'templates/book.phtml';
    }

    public function showBooks($books, $genre, $msg = null) {
        require 'templates/books.phtml';
    }

    public function showAddBook($genres, $msg = null) {
        require 'templates/formAddBook.phtml';
    }

    public function showAddGenre($msg = null) {
        require 'templates/formAddGenre.phtml';
    }

    public function showError($msg) {
        require 'templates/error.phtml';
    }
}