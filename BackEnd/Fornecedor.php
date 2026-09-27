<?php
require_once 'Conexao.php';

class Fornecedor
{
    private $fornecedorNome;
    private $fornecedorCNPJ;
    private $fornecedorEmail;
    private $fornecedorTelefone;
    private $fornecedorId;

    public function setFornecedorId($id)
    {
        $this->fornecedorId = $id;
    }

    public function getFornecedorId()
    {
        return $this->fornecedorId;
    }

    public function cadastrar($fornecedorNome, $fornecedorCNPJ, $fornecedorEmail, $fornecedorTelefone)
    {
        $conexao = new Conexao();
        $pdo = $conexao->conectar();

        try {
            $comando = $pdo->prepare("INSERT INTO fornecedores (nome, cnpj, email, telefone) VALUES (?, ?, ?, ?)");
            $comando->execute([$fornecedorNome, $fornecedorCNPJ, $fornecedorEmail, $fornecedorTelefone]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function listar()
    {
        $conexao = new Conexao();
        $pdo = $conexao->conectar();

        $comando = $pdo->query("SELECT id, nome, cnpj, email, telefone FROM fornecedores ORDER BY nome");

        return $comando->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizar($fornecedorId, $fornecedorNome, $fornecedorCNPJ, $fornecedorEmail, $fornecedorTelefone)
    {
        $conexao = new Conexao();
        $pdo = $conexao->conectar();

        try {
            $comando = $pdo->prepare("UPDATE fornecedores SET nome = ?, cnpj = ?, email = ?, telefone = ? WHERE id = ?");
            $comando->execute([$fornecedorNome, $fornecedorCNPJ, $fornecedorEmail, $fornecedorTelefone, $fornecedorId]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function excluir($fornecedorId)
    {
        $conexao = new Conexao();
        $pdo = $conexao->conectar();

        try {
            $comando = $pdo->prepare("DELETE FROM fornecedores WHERE id = ?");
            $comando->execute([$fornecedorId]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}