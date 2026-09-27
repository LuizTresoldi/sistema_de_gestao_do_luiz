<?php
$mensagens = [
    'sucesso' => [
        'usuarioCadastrado' => 'Cadastro realizado com sucesso! Faça login para continuar.',
        'fornecedorCadastrado' => 'Fornecedor cadastrado com sucesso!',
        'produtoCadastrado' => 'Produto cadastrado com sucesso!',
        'carrinhoCriado' => 'Carrinho criado com sucesso!',
        'produtosAdicionados' => 'Produtos adicionados ao carrinho!',
    ],
    'erro' => [
        'senhasDiferentes' => 'As senhas digitadas não conferem.',
        'emailExistente' => 'Este email já está cadastrado.',
        'loginInvalido' => 'Email ou senha incorretos.',
        'fornecedorNaoCadastrado' => 'Não foi possível cadastrar o fornecedor.',
        'produtoNaoCadastrado' => 'Não foi possível cadastrar o produto.',
        'carrinhoNaoCriado' => 'Não foi possível criar o carrinho.',
        'selecaoInvalida' => 'Selecione pelo menos um produto e um carrinho.',
    ],
];

$cores = ['sucesso' => 'success', 'erro' => 'danger'];

foreach ($cores as $tipo => $cor) {
    $codigo = $_GET[$tipo] ?? '';
    if (isset($mensagens[$tipo][$codigo])) {
        echo '<div class="alert alert-' . $cor . ' mt-3">' . $mensagens[$tipo][$codigo] . '</div>';
    }
}