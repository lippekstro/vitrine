<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/models/categoria.php';

try {
    $categorias = Categoria::listar();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<section class="sec-centro">
    <div>
        <div class="cabecalho-login">
            <h1 class="margem">Cadastro de Produto</h1>
        </div>
        <form action="/vitrine/controllers/produto_add_controller.php" method="post" enctype="multipart/form-data">
            <div class="campo-form">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome">
            </div>

            <div class="campo-form">
                <label for="preco">Preço</label>
                <input type="number" name="preco" id="preco">
            </div>

            <div class="campo-form">
                <label for="imagem">Imagem</label>
                <input type="file" name="imagem" id="imagem">
            </div>

            <div class="campo-form">
                <label for="categoria">Categoria</label>
                <select name="categoria" id="categoria">
                    <?php foreach($categorias as $c) : ?>
                        <option value="<?= $c['id_categoria'] ?>"><?= $c['nome_categoria'] ?></option>
                    <?php endforeach; ?>
                </select>
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