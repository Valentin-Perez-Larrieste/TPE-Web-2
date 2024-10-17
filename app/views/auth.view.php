<?php
class AuthView {

    public function showLogin($error = '') {
        require 'templates/login.phtml';
    }
}