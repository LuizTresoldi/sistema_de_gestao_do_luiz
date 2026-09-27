<?php
require_once 'Conexao.php';
require_once 'Fornecedor.php';

class Produto
{
    private $produtoId;
    private $produtoNome;
    private $produtoDescricao;
    private $produtoPreco;
    private $fornecedor; // objeto Fornecedor (associação)

    public function setFornecedor(Fornecedor $fornecedor)
    {
        $this->fornecedor = $fornecedor;
    }

    public function getFornecedor()
    {
        return $this->fornecedor;
    }

    public function cadastrar($nome, $descricao, $preco)
    {
        $conexao = new Conexao();
        $pdo = $conexao->conectar();

        try {
            $comando = $pdo->prepare("INSERT INTO produtos (nome, descricao, preco, id_fornecedor) VALUES (?, ?, ?, ?)");
            $comando->execute([$nome, $descricao, $preco, $this->fornecedor->getFornecedorId()]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function listar()
    {
        $conexao = new Conexao();
        $pdo = $conexao->conectar();

        $comando = $pdo->query("SELECT p.id, p.nome, p.descricao, p.preco, f.nome AS fornecedor FROM produtos p JOIN fornecedores f ON f.id = p.id_fornecedor ORDER BY p.nome");

        return $comando->fetchAll(PDO::FETCH_ASSOC);
    }
}