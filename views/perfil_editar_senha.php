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
            <h1 class="margem">Atualizar Senha</h1>
        </div>
        <form action="/vitrine/controllers/usuario_edt_senha_controller.php" method="post">

            <input type="hidden" name="id" value="<?= $usuario->id_usuario ?>">

            <div class="campo-form">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha">
            </div>

            <div class="campo-form">
                <label for="nova_senha">Nova Senha</label>
                <input type="password" name="nova_senha" id="nova_senha">
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