<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/configs/utils.php';

if (isset($_COOKIE['msg'])) {
    setcookie('msg', '', time() - 3600, '/vitrine/');
    setcookie('tipo', '', time() - 3600, '/vitrine/');
}

if(Utilidades::isLogado()){
    setcookie('msg', 'Você já está logado', time() + 3600, '/vitrine/');
    setcookie('tipo', 'info', time() + 3600, '/vitrine/');
    header('Location: /vitrine/index.php');
    exit();
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

<section class="sec-centro">
    <div>
        <div class="cabecalho-login">
            <h1 class="margem">Login</h1>
            <p class="margem">Entre para continuar</p>
        </div>

        <form action="/vitrine/controllers/login_controller.php" method="POST">
            <div class="campo-form">
                <label for="email">EMAIL</label>
                <input type="email" name="email" id="email" placeholder="exemplo@mail.com">
            </div>

            <div class="campo-form">
                <label for="senha">SENHA</label>
                <input type="password" name="senha" id="senha" placeholder="sua senha">
            </div>

            <div class="campo-form">
                <button class="btn self-center">LOGIN</button>
            </div>
        </form>

        <div class="text-center">
            <a href="/vitrine/views/usuario_cadastro.php" class="links">CADASTRE-SE</a>
        </div>
    </div>
</section>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_rodape.php';
?>