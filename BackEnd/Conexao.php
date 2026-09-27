<?php
class Conexao
{
    private $servidor = "localhost";
    private $usuario = "root";
    private $senha = "";
    private $banco = "sistema_de_gestao_do_luiz";


    private function criarBanco()
    {
        try {
            $conexao = new PDO("mysql:host=$this->servidor", $this->usuario, $this->senha);
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE IF NOT EXISTS $this->banco CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";
            $conexao->exec($sql);
            return $conexao;
        } catch (PDOException $e) {
            die("Erro ao criar o banco: " . $e->getMessage());
        }
    }

    private function criarTabelas($conexao)
    {
        $tabelas = [
            "CREATE TABLE IF NOT EXISTS usuarios (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(100) NOT NULL,
            email VARCHAR(150) NOT NULL UNIQUE,
            senha CHAR(64) NOT NULL
        ) ENGINE=InnoDB",

            "CREATE TABLE IF NOT EXISTS fornecedores (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(100) NOT NULL,
            cnpj VARCHAR(18) NOT NULL,
            email VARCHAR(150) NOT NULL,
            telefone VARCHAR(20) NOT NULL
        ) ENGINE=InnoDB",

            "CREATE TABLE IF NOT EXISTS produtos (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(100) NOT NULL,
            descricao TEXT,
            preco DECIMAL(10,2) NOT NULL,
            id_fornecedor INT NOT NULL,
            FOREIGN KEY (id_fornecedor) REFERENCES fornecedores(id) ON DELETE RESTRICT
        ) ENGINE=InnoDB",

            "CREATE TABLE IF NOT EXISTS carrinhos (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(100) NOT NULL,
            id_usuario INT NOT NULL,
            FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE
        ) ENGINE=InnoDB",

            "CREATE TABLE IF NOT EXISTS carrinho_produto (
            id_carrinho INT NOT NULL,
            id_produto INT NOT NULL,
            PRIMARY KEY (id_carrinho, id_produto),
            FOREIGN KEY (id_carrinho) REFERENCES carrinhos(id) ON DELETE CASCADE,
            FOREIGN KEY (id_produto) REFERENCES produtos(id) ON DELETE CASCADE
        ) ENGINE=InnoDB"
        ];

        foreach ($tabelas as $sql) {
            $conexao->exec($sql);
        }
    }
    public function conectar()
    {
        try {
            $this->criarBanco();

            $conexao = new PDO(
                "mysql:host=$this->servidor;dbname=$this->banco;charset=utf8mb4",
                $this->usuario,
                $this->senha
            );
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->criarTabelas($conexao);
            return $conexao;

        } catch (PDOException $e) {
            die("Erro ao conectar: " . $e->getMessage());
        }
    }
}