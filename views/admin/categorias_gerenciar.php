<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/models/categoria.php';
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