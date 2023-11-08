<?php

class Session
{
    public static function criaResumeSessao()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function encerraInativo()
    {
        if (isset($_SESSION['usuario']['inicio'])) {
            $segundos = time() - $_SESSION['usuario']['inicio'];
            if ($segundos > $_SESSION['usuario']['expira']) {
                header('Location: /vitrine/controllers/logout_controller.php');
            } else {
                $_SESSION['usuario']['inicio'] = time();
            }
        }
    }
}
