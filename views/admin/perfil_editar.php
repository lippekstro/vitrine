<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/cabecalho.php';
?>

<section class="form-login">
    <div class="cabecalho-login">
        <h1 class="margem">EDITE SEU PERFIL</h1>
    </div>

    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_usuario" value="">

        <div class="grid-form">
            <div>
                <div class="campo-form">
                    <label for="nome">NOME</label>
                    <input type="text" name="nome" id="nome" placeholder="seu nome">
                </div>

                <div class="campo-form">
                    <label for="email">EMAIL</label>
                    <input type="email" name="email" id="email" placeholder="exemplo@mail.com">
                </div>

                <div class="campo-form">
                    <label for="nasc">NASCIMENTO</label>
                    <input type="date" name="nasc" id="nasc" max="<?= date('Y-m-d') ?>">
                </div>

                <div class="campo-form">
                    <label for="imagem">FOTO</label>
                    <input type="file" name="imagem" id="imagem" placeholder="">
                </div>
            </div>

            <div>
                <div class="campo-form">
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" id="cep" placeholder="" maxlength="8">
                </div>

                <div class="campo-form">
                    <label for="logradouro">LOGRADOURO</label>
                    <input type="text" name="logradouro" id="logradouro" placeholder="rua teste">
                </div>

                <div class="campo-form">
                    <label for="numero">NÚMERO</label>
                    <input type="text" name="numero" id="numero" placeholder="s/n">
                </div>

                <div class="campo-form">
                    <label for="telefone">TELEFONE</label>
                    <input type="tel" name="telefone" id="telefone" placeholder="">
                </div>
            </div>
        </div>

        <div class="campo-form">
            <button class="btn self-center">ATUALIZAR</button>
        </div>
    </form>
</section>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/rodape.php';
?>