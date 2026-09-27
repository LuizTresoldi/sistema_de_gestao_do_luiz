<!DOCTYPE html>
<?php require_once '../BackEnd/verificarSessao.php'; ?>
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
            <h5>Atualize os dados já cadastrados</h5>
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

        </main>

    </div>
</body>


</html>