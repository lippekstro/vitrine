<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_cabecalho.php';
?>

<section class="sec-centro">
    <div>
        <div class="cabecalho-login">
            <h1 class="margem">Cadastro</h1>
        </div>
        <form action="/vitrine/controllers/usuario_add_controller.php" method="post" enctype="multipart/form-data">
            <div class="campo-form">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome">
            </div>

            <div class="campo-form">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>

            <div class="campo-form">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha">
            </div>

            <div class="campo-form">
                <label for="imagem">Avatar</label>
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