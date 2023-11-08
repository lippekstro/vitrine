<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/models/categoria.php';

if (isset($_COOKIE['msg'])) {
    setcookie('msg', '', time() - 3600, '/vitrine/');
    setcookie('tipo', '', time() - 3600, '/vitrine/');
}

try {
    $categorias = Categoria::listar();
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<?php if (isset($_COOKIE['msg'])) : ?>
    <?php if ($_COOKIE['tipo'] === 'sucesso') : ?>
        <div class="alert alert-success text-center m-3" role="alert">
            <?= $_COOKIE['msg'] ?>
        </div>
    <?php elseif ($_COOKIE['tipo'] === 'perigo') : ?>
        <div class="alert alert-danger text-center m-3" role="alert">
            <?= $_COOKIE['msg'] ?>
        </div>
    <?php else : ?>
        <div class="alert alert-info text-center m-3" role="alert">
            <?= $_COOKIE['msg'] ?>
        </div>
    <?php endif; ?>
<?php endif; ?>

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
    <?php foreach ($categorias as $c) : ?>
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