<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/models/produto.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/configs/utils.php';

if (isset($_COOKIE['msg'])) {
    setcookie('msg', '', time() - 3600, '/vitrine/');
    setcookie('tipo', '', time() - 3600, '/vitrine/');
}

if (!Utilidades::isAdmin()) {
    setcookie('msg', 'Você não tem permissão para acessar este conteúdo', time() + 3600, '/vitrine/');
    setcookie('tipo', 'perigo', time() + 3600, '/vitrine/');
    header('Location: /vitrine/index.php');
    exit();
}

try {
    $produtos = Produto::listar();
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

<section class="sessao-tabela">
    <h1 class="margem text-center">Gerenciar Produtos</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Preco</th>
            <th class="coluna-img">Imagem</th>
            <th>Categoria</th>
            <th colspan="2">
                <a href="/vitrine/views/admin/produto_cadastro.php" class="btn">Adicionar</a>
            </th>
        </tr>

        <?php foreach ($produtos as $p) : ?>
            <tr>
                <td><?= $p['nome_produto'] ?></td>
                <td><?= $p['preco'] ?></td>
                <td><img src="data:image;charset=utf8;base64,<?= base64_encode($p['img_produto']); ?>" width="100%"></td>
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