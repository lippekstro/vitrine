<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/vitrine/models/usuario.php";


try {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    Usuario::logar($email, $senha);
} catch (PDOException $th) {
    echo $th->getMessage();
}