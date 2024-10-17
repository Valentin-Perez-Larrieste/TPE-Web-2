<?php
class RegisterView {

    public function showRegister() {
        require 'templates/register.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}