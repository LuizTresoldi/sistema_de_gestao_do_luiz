<?php
require_once 'PDO.php';

class usuario
{
    private $userId;
    private $userNome;
    private $userEmail;

    public function getNome()
    {
        return $this->userNome;
    }

    public function getEmail()
    {
        return $this->userEmail;
    }

    public function getId()
    {
        return $this->userId;
    }

    public function cadastrar($userNome, $userEmail, $userSenha)
    {
        $senhaProtegida = hash('sha256', $userSenha);

        $conexao = new Conexao();
        $pdo = $conexao->conectar();

        $comando = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        $comando->execute([$userNome, $userEmail, $senhaProtegida]);

    }
}