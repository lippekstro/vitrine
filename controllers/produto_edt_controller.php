<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/vitrine/models/produto.php';
require_once $_SERVER["DOCUMENT_ROOT"] . "/vitrine/configs/sessions.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/vitrine/configs/utils.php";

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['nivel_acesso'] < 2) {
    setcookie('msg', 'Você não tem permissão para acessar este conteúdo', time() + 3600, '/vitrine/');
    setcookie('tipo', 'perigo', time() + 3600, '/vitrine/');
    header('Location: /vitrine/index.php');
    exit();
}

try {
    $id_produto = $_POST['id'];
    $nome = Utilidades::sanitizaString($_POST['nome']);
    
    if(Utilidades::validaFloat($_POST['preco'])){
        $preco = $_POST['preco'];
    }
    
    
    $categoria = $_POST['categoria'];
    
    if (!empty($_FILES['imagem']['tmp_name'])) {
        $imagem = file_get_contents($_FILES['imagem']['tmp_name']);
    }

    $produto = new Produto($id_produto);
    $produto->nome_produto = $nome;
    $produto->preco = $preco;
    $produto->id_categoria = $categoria;
    if ($imagem) {
        $produto->img_produto = $imagem;
    } else {
        $produto->img_produto = $produto->img_produto;
    }

    $produto->editar();

    setcookie('msg', "O produto $produto->nome_produto foi atualizado com sucesso!", time() + 3600, '/vitrine/');
    setcookie('tipo', 'sucesso', time() + 3600, '/vitrine/');
    header("Location: /vitrine/views/admin/produtos_gerenciar.php");
    exit();
} catch (PDOException $e) {
    echo $e->getMessage();
}