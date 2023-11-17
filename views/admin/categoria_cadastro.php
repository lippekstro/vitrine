<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/configs/utils.php';

if (!Utilidades::isAdmin()) {
    setcookie('msg', 'Você não tem permissão para acessar este conteúdo', time() + 3600, '/vitrine/');
    setcookie('tipo', 'perigo', time() + 3600, '/vitrine/');
    header('Location: /vitrine/index.php');
    exit();
}


?>

<section class="sec-centro">
    <div>
        <div class="cabecalho-login">
            <h1 class="margem">Cadastro</h1>
        </div>
        <form action="/vitrine/controllers/categoria_add_controller.php" method="post" enctype="multipart/form-data">
            <div class="campo-form">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome">
            </div>

            <div class="campo-form">
                <label for="imagem">Imagem</label>
                <input type="file" name="imagem" id="imagem">
            </div>

            <div class="campo-form">
                <button class="btn self-center">Cadastrar</button>
            </div>
        </form>
    </div>
</section>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_rodape.php';
?>