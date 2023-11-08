<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/vitrine/models/usuario.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/vitrine/configs/utils.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/vitrine/configs/sessions.php";

try {
    $nome = Utilidades::sanitizaString($_POST['nome']);
    
    if(Utilidades::validaEmail($_POST['email'])){
        $email = Utilidades::sanitizaEmail($_POST['email']);
    } else {
        setcookie('msg', "Email inválido.", time() + 3600, '/vitrine/');
        setcookie('tipo', 'perigo', time() + 3600, '/vitrine/');
        header("Location: /vitrine/views/usuario_cadastro.php");
        exit();
    }
    
    $senha = $_POST['senha'];
    $senha = password_hash($senha, PASSWORD_DEFAULT);

    if (!empty($_FILES['imagem']['tmp_name'])) {
        $imagem = file_get_contents($_FILES['imagem']['tmp_name']);
    } else {
        $imagem = file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/vitrine/img/user_placeholder.png');
    }

    $usuario = new Usuario();
    $usuario->nome_usuario = $nome;
    $usuario->email = $email;
    $usuario->senha = $senha;
    if ($imagem) {
        $usuario->img_usuario = $imagem;
    }
    $usuario->criar();

    header("Location: /vitrine/views/login.php");
    exit();
} catch (PDOException $e) {
    echo $e->getMessage();
}