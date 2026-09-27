<?php
require_once 'verificarSessao.php';
require_once 'Carrinho.php';

$idCarrinho = $_POST['id_carrinho'] ?? '';
$idsProdutos = $_POST['produtos'] ?? [];

if ($idCarrinho === '' || empty($idsProdutos)) {
    header('Location: ../FrontEnd/telaCatalogo.php?erro=selecaoInvalida');
    exit;
}

$carrinho = new Carrinho($_SESSION['id_usuario']);
$carrinho->adicionarProdutos($idCarrinho, $idsProdutos);

header('Location: ../FrontEnd/telaCarrinho.php?carrinho=' . $idCarrinho . '&sucesso=produtosAdicionados');
exit;