<?php
class CatalogueView {
    public function showCatalogue($catalogue) {
        $count = count($catalogue);

        require 'templates/listado_libros.phtml';
    }
}