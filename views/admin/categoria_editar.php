<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/models/categoria.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/configs/utils.php';

if (!Utilidades::isAdmin()) {
    setcookie('msg', 'Você não tem permissão para acessar este conteúdo', time() + 3600, '/vitrine/');
    setcookie('tipo', 'perigo', time() + 3600, '/vitrine/');
    header('Location: /vitrine/index.php');
    exit();
}

try {
    $categoria = new Categoria($_GET['id']);
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<section class="sec-centro">
    <div>
        <div class="cabecalho-login">
            <h1 class="margem">Atualizar Categoria</h1>
        </div>
        <form action="/vitrine/controllers/categoria_add_controller.php" method="post">

            <input type="hidden" name="id" value="<?= $categoria->id_categoria ?>">

            <div class="campo-form">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="<?= $categoria->nome_categoria ?>">
            </div>

            <div class="campo-form">
                <button class="btn self-center">Atualizar</button>
            </div>
        </form>
    </div>
</section>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_rodape.php';
?>