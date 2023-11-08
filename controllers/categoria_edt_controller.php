<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/vitrine/models/categoria.php';
require_once $_SERVER["DOCUMENT_ROOT"] . "/vitrine/configs/sessions.php";

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['nivel_acesso'] < 2) {
    setcookie('msg', 'Você não tem permissão para acessar este conteúdo', time() + 3600, '/vitrine/');
    setcookie('tipo', 'perigo', time() + 3600, '/vitrine/');
    header('Location: /vitrine/index.php');
    exit();
}

try {
    $id_categoria = $_POST['id'];
    $nome = Utilidades::sanitizaString($_POST['nome']);

    $categoria = new Categoria($id_categoria);
    $categoria->nome_categoria = $nome;
    $categoria->editar();

    setcookie('msg', "A categoria $categoria->nome_categoria foi atualizada com sucesso!", time() + 3600, '/vitrine/');
    setcookie('tipo', 'sucesso', time() + 3600, '/vitrine/');
    header("Location: /vitrine/views/admin/categorias_gerenciar.php");
    exit();
} catch (PDOException $e) {
    echo $e->getMessage();
}
