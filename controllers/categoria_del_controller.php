<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/vitrine/models/categoria.php';
require_once $_SERVER["DOCUMENT_ROOT"] . "/vitrine/configs/sessions.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/vitrine/configs/utils.php";

if (!Utilidades::isAdmin()) {
    setcookie('msg', 'Você não tem permissão para acessar este conteúdo', time() + 3600, '/vitrine/');
    setcookie('tipo', 'perigo', time() + 3600, '/vitrine/');
    header('Location: /vitrine/index.php');
    exit();
}

try {
    $id_categoria = $_GET['id'];

    $categoria = new Categoria($id_categoria);

    $categoria->deletar();

    setcookie('msg', "A categoria $categoria->nome_categoria foi deletada com sucesso!", time() + 3600, '/vitrine/');
    setcookie('tipo', 'sucesso', time() + 3600, '/vitrine/');
    header("Location: /vitrine/views/admin/categorias_gerenciar.php");
    exit();
} catch (Exception $e) {
    echo $e->getMessage();
}
