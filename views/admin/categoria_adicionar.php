<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/cabecalho.php';
?>

<section class="form-login">
    <div class="cabecalho-login">
        <h1 class="margem">CRIE UMA CATEGORIA</h1>
    </div>

    <form action="" method="POST">

        <div class="campo-form">
            <label for="nome">NOME</label>
            <input type="text" name="nome" id="nome" placeholder="categoria">
        </div>

        <div class="campo-form">
            <button class="btn self-center">CADASTRAR</button>
        </div>
    </form>
</section>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/rodape.php';
?>