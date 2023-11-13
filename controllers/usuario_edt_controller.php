<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/vitrine/models/usuario.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/vitrine/configs/utils.php';
require_once $_SERVER["DOCUMENT_ROOT"] . "/vitrine/configs/sessions.php";

if (!Utilidades::isLogado()) {
    setcookie('msg', 'Você não tem permissão para acessar este conteúdo', time() + 3600, '/vitrine/');
    setcookie('tipo', 'perigo', time() + 3600, '/vitrine/');
    header('Location: /vitrine/index.php');
    exit();
}

try {
    $id_usuario = $_SESSION['usuario']['id'];
    $nome = Utilidades::sanitizaString($_POST['nome']);

    if (Utilidades::validaEmail($_POST['email'])) {
        $email = Utilidades::sanitizaEmail($_POST['email']);
    } else {
        setcookie('msg', "Email inválido.", time() + 3600, '/vitrine/');
        setcookie('tipo', 'perigo', time() + 3600, '/vitrine/');
        header("Location: /vitrine/views/editar_perfil.php");
        exit();
    }

    if (!empty($_FILES['imagem']['tmp_name'])) {
        $imagem = file_get_contents($_FILES['imagem']['tmp_name']);
    }

    $usuario = new Usuario($id_usuario);
    $usuario->nome_usuario = $nome;
    $usuario->email = $email;
    if ($imagem) {
        $usuario->img_usuario = $imagem;
    } else {
        $usuario->img_usuario = $usuario->img_usuario;
    }
    $usuario->editar();

    $_SESSION['usuario']['nome'] = $usuario->nome_usuario;
    $_SESSION['usuario']['email'] = $usuario->email;
    $_SESSION['usuario']['img_usuario'] = $usuario->img_usuario;

    header("Location: /vitrine/views/perfil.php");
    exit();
} catch (PDOException $e) {
    echo $e->getMessage();
}
