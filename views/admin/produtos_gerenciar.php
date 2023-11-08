<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/models/produto.php';

try {
    $produtos = Produto::listar();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<section>
    <h1 class="margem text-center">Gerenciar Produtos</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Preco</th>
            <th>Imagem</th>
            <th>Categoria</th>
            <th colspan="2">
                <a href="/vitrine/views/admin/produto_cadastro.php" class="btn">Adicionar</a>
            </th>
        </tr>

        <?php foreach ($produtos as $p) : ?>
            <tr>
                <td><?= $p['nome_produto'] ?></td>
                <td><?= $p['preco'] ?></td>
                <td><img src="data:image;charset=utf8;base64,<?= base64_encode($p['img_produto']); ?>" alt="avatar" width="15%"></td>
                <td><?= $p['nome_categoria'] ?></td>
                <td>
                    <a href="/vitrine/views/admin/produto_editar.php?id=<?= $p['id_produto'] ?>" class="btn">Editar</a>
                </td>
                <td>
                    <a href="/vitrine/controllers/produto_del_controller.php?id=<?= $p['id_produto'] ?>" class="btn">Deletar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_rodape.php';
?>