<?php
function showHome() {
    session_start();

    require 'templates/layout/header.phtml';
    

    require 'templates/home.phtml';


    require 'templates/layout/footer.phtml';
}