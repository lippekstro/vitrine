<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/models/categoria.php';

try {
    $categorias = Categoria::listar();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<section class="jumbo">
    <img src="/vitrine/img/produtos.jpg" alt="" width="100%">
    <h1>VEJA NOSSO CATÁLOGO</h1>
</section>

<section class="busca-index margem">
    <form action="/vitrine/views/produtos.php" method="get">
        <div class="flex">
            <input type="search" name="busca" id="busca" placeholder="BUSQUE...">
            <button class="btn-semfundo" type="submit"><span class="material-symbols-outlined">search</span></button>
        </div>
    </form>
</section>

<section class="grade">
    <?php foreach($categorias as $c): ?>
    <a href="/vitrine/views/produtos.php?categoria=<?= $c['nome_categoria'] ?>">
        <div>
            <h2 class="titulo-cat"><?= $c['nome_categoria'] ?></h2>
            <img src="/vitrine/img/dummy.png" alt="" width="100%">
        </div>
    </a>
    <?php endforeach; ?>
</section>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_rodape.php';
?>