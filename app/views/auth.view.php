<?php
class AuthView {

    public function showLogin($error = '') {
        require 'templates/formLogin.phtml';
    }
}