<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/vitrine/models/produto.php';
require_once $_SERVER["DOCUMENT_ROOT"] . "/vitrine/configs/sessions.php";

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['nivel_acesso'] < 2) {
    setcookie('msg', 'Você não tem permissão para acessar este conteúdo', time() + 3600, '/vitrine/');
    setcookie('tipo', 'perigo', time() + 3600, '/vitrine/');
    header('Location: /vitrine/index.php');
    exit();
}

try {
    $id_produto = $_GET['id'];

    $produto = new Produto($id_produto);

    $produto->deletar();

    setcookie('msg', "O produto $produto->nome_produto foi deletado com sucesso!", time() + 3600, '/vitrine/');
    setcookie('tipo', 'sucesso', time() + 3600, '/vitrine/');
    header("Location: /vitrine/views/admin/produtos_gerenciar.php");
    exit();
} catch (Exception $e) {
    echo $e->getMessage();
}