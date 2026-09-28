<?php
require_once 'verificarSessao.php';
require_once 'Fornecedor.php';
require_once 'Produto.php';
require_once 'Carrinho.php';

header('Content-Type: application/json; charset=utf-8');

function responder($sucesso, $mensagem)
{
    echo json_encode(['sucesso' => $sucesso, 'mensagem' => $mensagem]);
    exit;
}

$operacao = $_GET['operacao'] ?? $_POST['operacao'] ?? '';

$fornecedor = new Fornecedor();
$produto = new Produto();
$carrinho = new Carrinho($_SESSION['id_usuario']);

switch ($operacao) {
    case 'listarFornecedores':
        echo json_encode($fornecedor->listar());
        break;

    case 'listarProdutos':
        echo json_encode($produto->listar());
        break;

    case 'listarCarrinhos':
        echo json_encode($carrinho->listar());
        break;

    case 'atualizarFornecedor':
        $fornecedorId = $_POST['id'];
        $fornecedorNome = trim($_POST['nome']);
        $fornecedorCNPJ = trim($_POST['cnpj']);
        $fornecedorEmail = trim($_POST['email']);
        $fornecedorTelefone = trim($_POST['telefone']);

        $fornecedorAtualizado = $fornecedor->atualizar($fornecedorId, $fornecedorNome, $fornecedorCNPJ, $fornecedorEmail, $fornecedorTelefone);
        responder($fornecedorAtualizado, $fornecedorAtualizado ? 'Fornecedor atualizado com sucesso!' : 'Não foi possível atualizar o fornecedor.');

    case 'excluirFornecedor':
        $fornecedorId = $_POST['id'];

        $fornecedorExcluido = $fornecedor->excluir($fornecedorId);
        responder($fornecedorExcluido, $fornecedorExcluido ? 'Fornecedor excluído com sucesso!' : 'Este fornecedor possui produtos e não pode ser excluído.');

    case 'atualizarProduto':
        $produtoId = $_POST['id'];
        $produtoNome = trim($_POST['nome']);
        $produtoDescricao = trim($_POST['descricao']);
        $produtoPreco = str_replace(',', '.', trim($_POST['preco']));

        if (!is_numeric($produtoPreco) || $produtoPreco <= 0) {
            responder(false, 'Informe um preço válido, maior que zero.');
        }

        $produtoAtualizado = $produto->atualizar($produtoId, $produtoNome, $produtoDescricao, $produtoPreco);
        responder($produtoAtualizado, $produtoAtualizado ? 'Produto atualizado com sucesso!' : 'Não foi possível atualizar o produto.');

    case 'excluirProduto':
        $produtoId = $_POST['id'];

        $produtoExcluido = $produto->excluir($produtoId);
        responder($produtoExcluido, $produtoExcluido ? 'Produto excluído com sucesso!' : 'Não foi possível excluir o produto.');

    case 'atualizarCarrinho':
        $carrinhoId = $_POST['id'];
        $carrinhoNome = trim($_POST['nome']);

        $carrinhoAtualizado = $carrinho->atualizar($carrinhoId, $carrinhoNome);
        responder($carrinhoAtualizado, $carrinhoAtualizado ? 'Carrinho atualizado com sucesso!' : 'Não foi possível atualizar o carrinho.');

    case 'excluirCarrinho':
        $carrinhoId = $_POST['id'];

        $carrinhoExcluido = $carrinho->excluir($carrinhoId);
        responder($carrinhoExcluido, $carrinhoExcluido ? 'Carrinho excluído com sucesso!' : 'Não foi possível excluir o carrinho.');

    default:
        responder(false, 'Operação inválida.');
}