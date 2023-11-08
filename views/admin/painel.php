<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/cabecalho.php';
?>

<section class="grade-painel">
    <a href="/vitrine/views/admin/categoria_listar.php" class="text-center">
        <div>
            <img src="https://source.unsplash.com/random/1920x1080/?shoes" alt="" width="100%">
        </div>
        <div>
            <p>
                GERENCIAR CATEGORIAS
            </p>
        </div>
    </a>

    <a href="/vitrine/views/admin/produto_listar.php" class="text-center">
        <div>
            <img src="https://source.unsplash.com/random/1920x1080/?products" alt="" width="100%">
        </div>
        <div>
            <p>
                GERENCIAR PRODUTOS
            </p>
        </div>
    </a>
</section>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/rodape.php';
?>