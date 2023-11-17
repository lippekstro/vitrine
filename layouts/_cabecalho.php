<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/configs/sessions.php';

Session::criaResumeSessao();
Session::encerraInativo();

$logado = isset($_SESSION['usuario']);
if ($logado) {
    $id = $_SESSION['usuario']['id'];
    $nome = $_SESSION['usuario']['nome'];
    $email = $_SESSION['usuario']['email'];
    $nivel = $_SESSION['usuario']['nivel_acesso'];
    $foto = $_SESSION['usuario']['img_usuario'];
    
    $admin = $nivel > 1 ? true : false;
}


?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vitrine</title>
    <link rel="shortcut icon" href="/vitrine/img/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="/vitrine/css/style.css">
    <script src="/vitrine/js/script.js"></script>
</head>

<body>
    <header>
        <nav>
            <div class="brand">
                <img src="/vitrine/img/android-chrome-512x512.png" alt="" width="100%">
            </div>

            <div class="navlinks">
                <a href="/vitrine/index.php">INICIO</a>
                <a href="/vitrine/views/sobre.php">SOBRE</a>
                <?php if (!$logado) : ?>
                    <a href="/vitrine/views/login.php">LOGIN</a>
                <?php else : ?>
                    <a href="/vitrine/views/perfil.php">PERFIL</a>
                    <a href="/vitrine/controllers/logout_controller.php">LOGOUT</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <main>