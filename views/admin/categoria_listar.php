<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/cabecalho.php';
?>

<section class="text-center margem">
    <h1>GERENCIAMENTO DE CATEGORIAS</h1>

    <div class="margem" style="overflow: auto;">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th colspan="2"><a href="/vitrine/views/admin/categoria_adicionar.php" class="btn">ADICIONAR</a></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>LOREM</td>
                    <td><a href="/vitrine/views/admin/categoria_editar.php?id=" class="btn">EDITAR</a></td>
                    <td><a href="/vitrine/controllers/categoria_deletar_controller.php?id=" class="btn">APAGAR</a></td>
                </tr>
            </tbody>
        </table>
    </div>

</section>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/rodape.php';
?>