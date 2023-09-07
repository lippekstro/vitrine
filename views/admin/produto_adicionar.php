<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/cabecalho.php';
?>

<section class="form-login">
    <div class="cabecalho-login">
        <h1 class="margem">CADASTRE UM PRODUTO</h1>
    </div>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="grid-form">
            <div>
                <div class="campo-form">
                    <label for="nome">NOME</label>
                    <input type="text" name="nome" id="nome" placeholder="nome do produto">
                </div>

                <div class="campo-form">
                    <label for="preco">PREÇO</label>
                    <input type="number" name="preco" id="preco" step="0.01">
                </div>
            </div>

            <div>
                <div class="campo-form">
                    <label for="descricao">DESCRIÇÃO</label>
                    <textarea name="descricao" id="descricao"></textarea>
                </div>

                <div class="campo-form">
                    <label for="imagem">FOTO</label>
                    <input type="file" name="imagem" id="imagem" placeholder="">
                </div>
            </div>
        </div>

        <div class="campo-form">
            <label for="categoria">CATEGORIA</label>
            <select name="categoria" id="categoria">
                <option value="">TESTE</option>
                <option value="">TESTE</option>
                <option value="">TESTE</option>
            </select>
        </div>

        <div class="campo-form">
            <button class="btn self-center">CADASTRAR</button>
        </div>
    </form>
</section>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/rodape.php';
?>