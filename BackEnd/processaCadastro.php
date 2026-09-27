<?php
require_once 'Usuario.php';

$nome = trim($_POST['nome']);
$email = trim($_POST['email']);
$senha = $_POST['senha'];
$senhaRepetir = $_POST['senhaRepetir'];

if ($senha !== $senhaRepetir) {
    header('Location: ../FrontEnd/cadastroSistema.php?erro=senhaIncorreta');
    exit;
}

$usuario = new Usuario();

if ($usuario->cadastrar($nome, $email, $senha)) {
    header('Location: ../FrontEnd/loginSistema.php?sucesso=cadastroRealizado');
    exit;
} else {
    header('Location: ../FrontEnd/cadastroSistema.php?erro=emailIncorreto');
    exit;
}

