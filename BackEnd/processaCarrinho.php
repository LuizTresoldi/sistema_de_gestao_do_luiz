<?php
require_once 'verificarSessao.php';
require_once 'Carrinho.php';

$nomeCarrinho = trim($_POST['nomeCarrinho']);

$carrinho = new Carrinho($_SESSION['id_usuario']);

if ($carrinho->criarCarrinho($nomeCarrinho)) {
    header('Location: ../FrontEnd/telaCadastros.php?sucesso=carrinhoCriado');
    exit;
} else {
    header('Location: ../FrontEnd/telaCadastros.php?erro=carrinhoNaoCriado');
    exit;
}