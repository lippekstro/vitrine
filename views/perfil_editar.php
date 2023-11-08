<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/models/usuario.php';

if(!isset($_SESSION['usuario'])){
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

<section class="sec-centro">
    <div>
        <div class="cabecalho-login">
            <h1 class="margem">Atualizar Cadastro</h1>
        </div>
        <form action="/vitrine/controllers/usuario_edt_controller.php" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $usuario->id_usuario ?>">

            <div class="campo-form">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="<?= $usuario->nome_usuario ?>">
            </div>

            <div class="campo-form">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?= $usuario->email ?>">
            </div>

            <div class="campo-form">
                <label for="imagem">Avatar</label>
                <input type="file" name="imagem" id="imagem">
            </div>

            <div class="campo-form">
                <button class="btn self-center">Atualizar</button>
            </div>
        </form>
    </div>
</section>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_rodape.php';
?>