<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/cabecalho.php';
?>

<section class="jumbo">
    <img src="https://source.unsplash.com/random/1920x1080/?product" alt="" width="100%">
    <h1>VEJA NOSSO CATÁLOGO</h1>
</section>

<section class="busca-index margem">
    <form action="" method="get">
        <div class="flex">
            <input type="search" name="busca" id="busca" placeholder="BUSQUE...">
            <button class="btn-semfundo" type="submit"><span class="material-symbols-outlined">search</span></button>
        </div>
    </form>
</section>

<section class="grade">
    <a href="">
        <h2>ROUPAS</h2>
        <img src="https://source.unsplash.com/random/1920x1080/?shirts" alt="" width="100%">
    </a>

    <a href="">
        <h2>CALÇADOS</h2>
        <img src="https://source.unsplash.com/random/1920x1080/?shoes" alt="" width="100%">
    </a>

    <a href="">
        <h2>ACESSÓRIOS</h2>
        <img src="https://source.unsplash.com/random/1920x1080/?bijouterie" alt="" width="100%">
    </a>
</section>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/rodape.php';
?>