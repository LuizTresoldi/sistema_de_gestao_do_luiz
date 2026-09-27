<?php
session_start();

require_once("Usuario.php");

$usuario = new Usuario();
$email = trim($_POST['email']);
$senha = $_POST['senha'];

if ($usuario->autenticar($email, $senha)) {
    $_SESSION['id_usuario'] = $usuario->getId();
    $_SESSION['nome_usuario'] = $usuario->getNome();
    header('Location: ../FrontEnd/inicioSistema.php');
    exit;
} else {
    header('Location: ../FrontEnd/loginSistema.php?erro=loginIncorreto');
    exit;
}