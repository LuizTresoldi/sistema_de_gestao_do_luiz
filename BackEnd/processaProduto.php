<?php
require_once 'verificarSessao.php';
require_once 'Produto.php';

$nome = trim($_POST['nomeProduto']);
$descricao = trim($_POST['descricaoProduto']);
$preco = $_POST['precoProduto'];
$idFornecedor = $_POST['fornecedor_id'];

$fornecedor = new Fornecedor();
$fornecedor->setFornecedorId($idFornecedor);

$produto = new Produto();
$produto->setFornecedor($fornecedor);

if ($produto->cadastrar($nome, $descricao, $preco)) {
    header('Location: ../FrontEnd/telaCadastros.php?sucesso=produtoCadastrado');
    exit;
} else {
    header('Location: ../FrontEnd/telaCadastros.php?erro=produtoNaoCadastrado');
    exit;
}