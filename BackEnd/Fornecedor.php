<?php
require_once 'Conexao.php';

class Fornecedor
{
    private $fornecedorNome;
    private $fornecedorCNPJ;
    private $fornecedorEmail;
    private $fornecedorTelefone;
    private $fornecedorId;

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
}