<?php
require_once 'Conexao.php';

class Carrinho
{
    private $carrinhoId;
    private $carrinhoNome;
    private $idUsuario;

    public function __construct($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function criarCarrinho($nomeCarrinho)
    {
        $conexao = new Conexao();
        $pdo = $conexao->conectar();

        try {
            $comando = $pdo->prepare("INSERT INTO carrinhos (nome, id_usuario) VALUES (?, ?)");
            $comando->execute([$nomeCarrinho, $this->idUsuario]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function listar()
    {
        $conexao = new Conexao();
        $pdo = $conexao->conectar();

        $comando = $pdo->prepare("SELECT id, nome FROM carrinhos WHERE id_usuario = ? ORDER BY nome");
        $comando->execute([$this->idUsuario]);
        return $comando->fetchAll(PDO::FETCH_ASSOC);
    }

    public function adicionarProdutos($idCarrinho, $idsProdutos)
    {
        $conexao = new Conexao();
        $pdo = $conexao->conectar();

        $comando = $pdo->prepare("INSERT IGNORE INTO carrinho_produto (id_carrinho, id_produto) VALUES (?, ?)");
        foreach ($idsProdutos as $idProduto) {
            $comando->execute([$idCarrinho, $idProduto]);
        }
    }

    // lista os produtos de um carrinho, com o nome do fornecedor
    public function listarProdutos($idCarrinho)
    {
        $conexao = new Conexao();
        $pdo = $conexao->conectar();

        $comando = $pdo->prepare("SELECT p.id, p.nome, p.preco, f.nome AS fornecedor
                                  FROM carrinho_produto cp
                                  JOIN produtos p ON p.id = cp.id_produto
                                  JOIN fornecedores f ON f.id = p.id_fornecedor
                                  JOIN carrinhos c ON c.id = cp.id_carrinho
                                  WHERE cp.id_carrinho = ? AND c.id_usuario = ?
                                  ORDER BY p.nome");
        $comando->execute([$idCarrinho, $this->idUsuario]);
        return $comando->fetchAll(PDO::FETCH_ASSOC);
    }

    // remove um produto do carrinho
    public function removerProduto($idCarrinho, $idProduto)
    {
        $conexao = new Conexao();
        $pdo = $conexao->conectar();

        $comando = $pdo->prepare("DELETE cp FROM carrinho_produto cp
                                  JOIN carrinhos c ON c.id = cp.id_carrinho
                                  WHERE cp.id_carrinho = ? AND cp.id_produto = ? AND c.id_usuario = ?");
        $comando->execute([$idCarrinho, $idProduto, $this->idUsuario]);
    }
}