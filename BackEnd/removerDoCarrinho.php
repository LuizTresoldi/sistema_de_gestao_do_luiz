<?php
require_once 'verificarSessao.php';
require_once 'Carrinho.php';

$idCarrinho = $_POST['id_carrinho'];
$idProduto = $_POST['id_produto'];

$carrinho = new Carrinho($_SESSION['id_usuario']);
$carrinho->removerProduto($idCarrinho, $idProduto);

header('Location: ../FrontEnd/telaCarrinho.php?carrinho=' . $idCarrinho);
exit;