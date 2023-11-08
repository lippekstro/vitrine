<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/models/categoria.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/models/produto.php';

try {
    $id_produto = $_GET['id'];
    $produto = new Produto($id_produto);
    $categorias = Categoria::listar();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<section class="sec-centro">
    <div>
        <div class="cabecalho-login">
            <h1 class="margem">Atualizar Produto</h1>
        </div>
        <form action="/vitrine/controllers/produto_edt_controller.php" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $produto->id_produto ?>">

            <div class="campo-form">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="<?= $produto->nome_produto ?>">
            </div>

            <div class="campo-form">
                <label for="preco">Preço</label>
                <input type="number" name="preco" id="preco" value="<?= $produto->preco ?>">
            </div>

            <div class="campo-form">
                <label for="imagem">Imagem</label>
                <input type="file" name="imagem" id="imagem">
            </div>

            <div class="campo-form">
                <label for="categoria">Categoria</label>
                <select name="categoria" id="categoria">
                    <?php $categoria_anterior = $produto->id_categoria ?>
                    <?php foreach ($categorias as $c) : ?>
                        <option value="<?= $c['id_categoria'] ?>" <?= $c['id_categoria'] == $categoria_anterior ? "selected" : "" ?>><?= $c['nome_categoria'] ?></option>
                    <?php endforeach; ?>
                </select>
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