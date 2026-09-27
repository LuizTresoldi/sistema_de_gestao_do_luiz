<?php
require_once 'Conexao.php';

class Usuario
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

        try {
            $comando = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
            $comando->execute([$userNome, $userEmail, $senhaProtegida]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function autenticar($userEmail, $userSenha)
    {
        $senhaProtegida = hash('sha256', $userSenha);

        $conexao = new Conexao();
        $pdo = $conexao->conectar();

        $comando = $pdo->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
        $comando->execute([$userEmail, $senhaProtegida]);

        $usuario = $comando->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            $this->userId = $usuario['id'];
            $this->userNome = $usuario['nome'];
            $this->userEmail = $usuario['email'];
            return true;
        } else {
            return false;
        }
    }
}