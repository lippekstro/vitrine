<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/models/usuario.php';

if (!isset($_SESSION['usuario'])) {
    setcookie('msg', 'Você precisa estar logado', time() + 3600, '/vitrine/');
    setcookie('tipo', 'info', time() + 3600, '/vitrine/');
    header('Location: /vitrine/views/login.php');
    exit();
}

try {
    $usuario = new Usuario($id);
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<section>
    <div class="ficha-usuario">
        <div>
            <img src="data:image;charset=utf8;base64,<?= base64_encode($usuario->img_usuario); ?>" alt="avatar" width="100%">
        </div>
        <div>
            <p><?= $usuario->nome_usuario ?></p>
            <p><?= $usuario->email ?></p>
            <a href="/vitrine/views/perfil_editar.php" class="links">Editar Perfil</a>
            <a href="/vitrine/views/perfil_editar_senha.php" class="links">Editar Senha</a>
        </div>
    </div>
</section>

<?php if ($admin) : ?>
    <section class="sec-centro">
        <a href="/vitrine/views/admin/categorias_gerenciar.php" class="btn">Gerenciar Categorias</a>
        <a href="/vitrine/views/admin/produtos_gerenciar.php" class="btn">Gerenciar Produtos</a>
    </section>
<?php endif; ?>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_rodape.php';
?>