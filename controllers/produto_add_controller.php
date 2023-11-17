<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/vitrine/models/produto.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/vitrine/configs/sessions.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/vitrine/configs/utils.php";


if (!Utilidades::isAdmin()) {
    setcookie('msg', 'Você não tem permissão para acessar este conteúdo', time() + 3600, '/vitrine/');
    setcookie('tipo', 'perigo', time() + 3600, '/vitrine/');
    header('Location: /vitrine/index.php');
    exit();
}

try {
    $nome = Utilidades::sanitizaString($_POST['nome']);

    if (Utilidades::validaFloat($_POST['preco'])) {
        $preco = $_POST['preco'];
    } else {
        setcookie('msg', "Preço inválido.", time() + 3600, '/vitrine/');
        setcookie('tipo', 'perigo', time() + 3600, '/vitrine/');
        header("Location: /vitrine/views/admin/cadastrar_produto.php");
        exit();
    }

    $categoria = $_POST['categoria'];

    if (!empty($_FILES['imagem']['tmp_name'])) {
        $imagem = file_get_contents($_FILES['imagem']['tmp_name']);
    } else {
        $imagem = file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/vitrine/img/dummy.png');
    }

    $produto = new Produto();
    $produto->nome_produto = $nome;
    $produto->preco = $preco;
    $produto->id_categoria = $categoria;
    $produto->img_produto = $imagem;
    
    $produto->criar();

    setcookie('msg', "O produto $produto->nome_produto foi adicionado com sucessoo!", time() + 3600, '/vitrine/');
    setcookie('tipo', 'sucesso', time() + 3600, '/vitrine/');
    header("Location: /vitrine/views/admin/produtos_gerenciar.php");
    exit();
} catch (PDOException $e) {
    echo $e->getMessage();
}