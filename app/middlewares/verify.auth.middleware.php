<?php
    function verifyAuthMiddleware($res) {
        if($res->user && !empty($_SESSION['IS_ADMIN']) && $res->user->admin == 'si') {
            return;
        } else {
            header('Location: ' . BASE_URL . 'showLogin');
            die();
        }
    }
?>