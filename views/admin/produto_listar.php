<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/configs/utils.php';

if (!Utilidades::isAdmin()) {
    setcookie('msg', 'Você não tem permissão para acessar este conteúdo', time() + 3600, '/vitrine/');
    setcookie('tipo', 'perigo', time() + 3600, '/vitrine/');
    header('Location: /vitrine/index.php');
    exit();
}
?>

<section class="text-center margem">
    <h1>GERENCIAMENTO DE PRODUTOS</h1>

    <div class="margem" style="overflow: auto;">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>PREÇO</th>
                    <th>DESCRIÇÃO</th>
                    <th colspan="2"><a href="/vitrine/views/admin/produto_adicionar.php" class="btn">ADICIONAR</a></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>LOREM</td>
                    <td>R$ 50,00</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea harum porro hic aut voluptatum officiis quae nesciunt quasi, error vero optio debitis sunt quo culpa atque earum est quas ullam?</td>
                    <td><a href="/vitrine/views/admin/produto_editar.php?id=" class="btn">EDITAR</a></td>
                    <td><a href="/vitrine/controllers/produto_deletar_controller.php?id=" class="btn">APAGAR</a></td>
                </tr>
            </tbody>
        </table>
    </div>

</section>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vitrine/layouts/rodape.php';
?>