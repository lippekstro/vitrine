<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/vitrine/db/conexao.php';

class Categoria
{
    public $id_categoria;
    public $nome_categoria;

    public function __construct($id_categoria = false)
    {
        if ($id_categoria) {
            $this->id_categoria = $id_categoria;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT nome_categoria FROM categorias WHERE id_categoria = :id_categoria";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_categoria', $this->id_categoria);
        $stmt->execute();

        $categoria = $stmt->fetch();
        $this->nome_categoria = $categoria['nome_categoria'];
    }

    public function criar()
    {
        $query = "INSERT INTO categorias (nome_categoria) VALUES (:nome_categoria)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome_categoria', $this->nome_categoria);
        $stmt->execute();
        $this->id_categoria = $conexao->lastInsertId();
        return $this->id_categoria;
    }

    public static function listar()
    {
        $query = "SELECT * FROM categorias ORDER BY nome_categoria ASC";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }

    public function editar()
    {
        $query = "UPDATE categorias SET nome_categoria = :nome_categoria WHERE id_categoria = :id_categoria";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":nome_categoria", $this->nome_categoria);
        $stmt->bindValue(":id_categoria", $this->id_categoria);
        $stmt->execute();
    }

    public function deletar()
    {
        $query = "DELETE FROM categorias WHERE id_categoria = :id_categoria";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_categoria', $this->id_categoria);
        $stmt->execute();
    }
}
