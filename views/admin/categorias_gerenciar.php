<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/models/categoria.php';

try {
    $categorias = Categoria::listar();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<section>
<h1 class="margem text-center">Gerenciar Categorias</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th colspan="2">
                <a href="/vitrine/views/admin/categoria_cadastro.php" class="btn">Adicionar</a>
            </th>
        </tr>

        <?php foreach($categorias as $c) : ?>
        <tr>
            <td><?= $c['nome_categoria'] ?></td>
            <td>
                <a href="/vitrine/views/admin/categoria_editar.php?id=<?= $c['id_categoria'] ?>" class="btn">Editar</a>
            </td>
            <td>
                <a href="/vitrine/controllers/categoria_del_controller.php?id=<?= $c['id_categoria'] ?>" class="btn">Deletar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</section>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_rodape.php';
?>