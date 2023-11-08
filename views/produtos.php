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
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<section class="grade grade-produtos">
    <?php foreach ($produtos as $p) : ?>
        <div>
            <h2 class="titulo-cat"><?= $p['nome_produto'] ?></h2>
            <img src="data:image;charset=utf8;base64,<?= base64_encode($p['img_produto']); ?>" alt="" width="100%">
        </div>
    <?php endforeach; ?>
</section>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_rodape.php';
?>