<?php
require_once 'verificarSessao.php';
require_once 'Fornecedor.php';

$nomeFornecedor = trim($_POST['nomeFornecedor']);
$cnpjFornecedor = trim($_POST['cnpjFornecedor']);
$emailFornecedor = trim($_POST['emailFornecedor']);
$telefoneFornecedor = trim($_POST['telefoneFornecedor']);

$fornecedor = new Fornecedor();

if ($fornecedor->cadastrar($nomeFornecedor, $cnpjFornecedor, $emailFornecedor, $telefoneFornecedor)) {
    header('Location: ../FrontEnd/telaCadastros.php?sucesso=fornecedor');
    exit;
} else {
    header('Location: ../FrontEnd/telaCadastros.php?erro=fornecedor');
    exit;
}