<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/_cabecalho.php';
?>

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