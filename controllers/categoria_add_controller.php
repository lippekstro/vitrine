<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/vitrine/models/categoria.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/vitrine/configs/utils.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/vitrine/configs/sessions.php";


if (!Utilidades::isAdmin()) {
    setcookie('msg', 'Você não tem permissão para acessar este conteúdo', time() + 3600, '/vitrine/');
    setcookie('tipo', 'perigo', time() + 3600, '/vitrine/');
    header('Location: /vitrine/index.php');
    exit();
}

try {
    $nome = Utilidades::sanitizaString($_POST['nome']);

    if (!empty($_FILES['imagem']['tmp_name'])) {
        $imagem = file_get_contents($_FILES['imagem']['tmp_name']);
    } else {
        $imagem = file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/vitrine/img/roupas.jpg');
    }

    $categoria = new Categoria();
    $categoria->nome_categoria = $nome;
    $categoria->img_categoria = $imagem;
    $categoria->criar();

    setcookie('msg', "A categoria $categoria->nome_categoria foi adicionada com sucesso!", time() + 3600, '/vitrine/');
    setcookie('tipo', 'sucesso', time() + 3600, '/vitrine/');
    header("Location: /vitrine/views/admin/categorias_gerenciar.php");
    exit();
} catch (PDOException $e) {
    echo $e->getMessage();
}
