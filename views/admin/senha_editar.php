<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/cabecalho.php';
?>

<section class="form-login">
    <div class="cabecalho-login">
        <h1 class="margem">EDITE SEU PERFIL</h1>
    </div>

    <form action="" method="POST">

        <div class="campo-form">
            <label for="senha">SENHA</label>
            <input type="password" name="senha" id="senha" placeholder="">
        </div>

        <div class="campo-form">
            <label for="senha_confirma">CONFIRMAR SENHA</label>
            <input type="password" name="senha_confirma" id="senha_confirma" placeholder="">
        </div>

        <div class="campo-form">
            <button class="btn self-center">ATUALIZAR</button>
        </div>
    </form>
</section>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/rodape.php';
?>