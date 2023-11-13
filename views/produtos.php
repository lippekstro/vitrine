<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/models/categoria.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/models/produto.php';

try {
    if (isset($_GET['busca'])) {
        $termo = $_GET['busca'];
        $produtos = Produto::listarPorNome($termo);
    } else {
        $termo = $_GET['categoria'];
        $produtos = Produto::listarPorCategoria($termo);
        $categorias = Categoria::listar();
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<section class="filtros-produtos">
    <section id="filtros">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
            <?php foreach ($categorias as $c) : ?>
                <div class="radios">
                    <input type="radio" name="categoria" id="categoria" value="<?= $c['nome_categoria'] ?>" <?= ($termo == $c['nome_categoria'] ? 'checked' : '') ?>>
                    <label for="categoria"><?= $c['nome_categoria'] ?></label>
                </div>
            <?php endforeach; ?>
            <div class="campo-form">
                <input type="submit" value="Filtrar" class="btn self-center">
            </div>

        </form>
    </section>
    <section class="grade grade-produtos" id="produtos">
        <?php foreach ($produtos as $p) : ?>
            <div>
                <h2 class="titulo-cat"><?= $p['nome_produto'] ?></h2>
                <img src="data:image;charset=utf8;base64,<?= base64_encode($p['img_produto']); ?>" alt="" width="100%">
            </div>
        <?php endforeach; ?>
    </section>
</section>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_rodape.php';
?>