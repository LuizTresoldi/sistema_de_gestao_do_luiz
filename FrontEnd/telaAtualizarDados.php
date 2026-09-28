<?php require_once '../BackEnd/verificarSessao.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Dados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex min-vh-100">
        <!-- Include para não repetir o código da barra lateral em todas as telas. -->
        <?php include 'barraLateral.php'; ?>
        <main class="flex-grow-1 p-4">
            <h1>Atualizar Dados</h1>
            <h5>Clique em um campo para editar e depois em Salvar</h5>

            <!-- Tabela de Fornecedores -->
            <h4 class="mt-5">Fornecedores</h4>
            <table class="table table-hover align-middle" id="tabelaFornecedores">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CNPJ</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th class="text-end" style="width: 120px">Ações</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <!-- Tabela de Produtos -->
            <h4 class="mt-5">Produtos</h4>
            <table class="table table-hover align-middle" id="tabelaProdutos">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Fornecedor</th>
                        <th class="text-end" style="width: 120px">Ações</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <!-- Tabela de Carrinhos -->
            <h4 class="mt-5">Carrinhos</h4>
            <table class="table table-hover align-middle" id="tabelaCarrinhos">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th class="text-end" style="width: 120px">Ações</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>

            <script>
                const enderecoOperacoes = '../BackEnd/operacoes.php';

                function protegerTexto(texto) {
                    const div = document.createElement('div');
                    div.textContent = texto ?? '';
                    return div.innerHTML;
                }

                function celulaEditavel(valor, campo) {
                    return `<td contenteditable="true" data-campo="${campo}">${protegerTexto(valor)}</td>`;
                }

                function celulaAcoes(tipo, id) {
                    return `<td class="text-end text-nowrap">
            <button class="btn btn-sm btn-primary" onclick="salvar('${tipo}', ${id}, this)">Salvar</button>
            <button class="btn btn-sm btn-outline-danger" onclick="excluir('${tipo}', ${id})">Excluir</button>
        </td>`;
                }

                function linhaVazia(colunas) {
                    return `<tr><td colspan="${colunas}" class="text-center text-body-secondary py-4">Nenhum registro cadastrado.</td></tr>`;
                }

                async function carregarTabelas() {
                    const listaFornecedores = await fetch(enderecoOperacoes + '?operacao=listarFornecedores').then(resposta => resposta.json());
                    const listaProdutos = await fetch(enderecoOperacoes + '?operacao=listarProdutos').then(resposta => resposta.json());
                    const listaCarrinhos = await fetch(enderecoOperacoes + '?operacao=listarCarrinhos').then(resposta => resposta.json());

                    document.querySelector('#tabelaFornecedores tbody').innerHTML = listaFornecedores.length
                        ? listaFornecedores.map(fornecedor => `<tr>
                ${celulaEditavel(fornecedor.nome, 'nome')}
                ${celulaEditavel(fornecedor.cnpj, 'cnpj')}
                ${celulaEditavel(fornecedor.email, 'email')}
                ${celulaEditavel(fornecedor.telefone, 'telefone')}
                ${celulaAcoes('Fornecedor', fornecedor.id)}
              </tr>`).join('')
                        : linhaVazia(5);

                    document.querySelector('#tabelaProdutos tbody').innerHTML = listaProdutos.length
                        ? listaProdutos.map(produto => `<tr>
                ${celulaEditavel(produto.nome, 'nome')}
                ${celulaEditavel(produto.descricao, 'descricao')}
                ${celulaEditavel(produto.preco, 'preco')}
                <td>${protegerTexto(produto.fornecedor)}</td>
                ${celulaAcoes('Produto', produto.id)}
              </tr>`).join('')
                        : linhaVazia(5);

                    document.querySelector('#tabelaCarrinhos tbody').innerHTML = listaCarrinhos.length
                        ? listaCarrinhos.map(carrinho => `<tr>
                ${celulaEditavel(carrinho.nome, 'nome')}
                ${celulaAcoes('Carrinho', carrinho.id)}
              </tr>`).join('')
                        : linhaVazia(2);
                }

                async function salvar(tipo, id, botao) {
                    const dados = new FormData();
                    dados.append('operacao', 'atualizar' + tipo);
                    dados.append('id', id);

                    botao.closest('tr').querySelectorAll('[data-campo]').forEach(celula => {
                        dados.append(celula.dataset.campo, celula.textContent.trim());
                    });

                    const resposta = await fetch(enderecoOperacoes, { method: 'POST', body: dados }).then(r => r.json());
                    alert(resposta.mensagem);
                    carregarTabelas();
                }

                async function excluir(tipo, id) {
                    if (!confirm('Deseja realmente excluir este registro?')) {
                        return;
                    }

                    const dados = new FormData();
                    dados.append('operacao', 'excluir' + tipo);
                    dados.append('id', id);
                    const resposta = await fetch(enderecoOperacoes, { method: 'POST', body: dados }).then(r => r.json());
                    alert(resposta.mensagem);
                    carregarTabelas();
                }
                carregarTabelas();
            </script>
        </main>

    </div>
</body>


</html>