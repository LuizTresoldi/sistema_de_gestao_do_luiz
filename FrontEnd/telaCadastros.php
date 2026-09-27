<!DOCTYPE html>
<?php require_once '../BackEnd/verificarSessao.php'; ?>
<html lang="pt-BR" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex min-vh-100">
        <!-- Include para não repetir o código da barra lateral em todas as telas. -->
        <?php include 'barraLateral.php'; ?>
        <main class="flex-grow-1 p-4">
            <h1>Cadastros</h1>
            <h5>Faça cadastro de produtos, fornecedores e crie um novo carrinho</h5>
            <!-- card do produto -->
            <div class="row g-4 mt-3">
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Novo produto</h5>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="mb-3">
                                    <label for="nomeProduto" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="nomeProduto" name="nomeProduto"
                                        placeholder="Digite o nome do produto" required>
                                </div>

                                <div class="mb-3">
                                    <label for="descricaoProduto" class="form-label">Descrição</label>
                                    <textarea class="form-control" id="descricaoProduto" name="descricaoProduto"
                                        rows="3" placeholder="Digite a descrição do produto"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="precoProduto" class="form-label">Preço</label>
                                    <div class="input-group">
                                        <span class="input-group-text">R$</span>
                                        <input type="number" class="form-control" id="precoProduto" name="precoProduto"
                                            step="0.01" min="0" placeholder="0,00" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="fornecedor_id" class="form-label">Fornecedor</label>
                                    <select class="form-select" id="fornecedor_id" name="fornecedor_id" required>
                                        <option value="">Selecione um fornecedor</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Cadastrar produto</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- card do fornecedor -->
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Novo fornecedor</h5>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="mb-3">
                                    <label for="nomeFornecedor" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="nomeFornecedor" name="nomeFornecedor"
                                        placeholder="Digite o nome do fornecedor" required>
                                </div>

                                <div class="mb-3">
                                    <label for="cnpjFornecedor" class="form-label">CNPJ</label>
                                    <input type="number" class="form-control" id="cnpjFornecedor" name="cnpjFornecedor"
                                        placeholder="Digite o CNPJ do fornecedor" required>
                                </div>

                                <div class="mb-3">
                                    <label for="emailFornecedor" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="emailFornecedor" name="emailFornecedor"
                                        placeholder="Digite o email do fornecedor" required>
                                </div>

                                <div class="mb-3">
                                    <label for="telefoneFornecedor" class="form-label">Telefone</label>
                                    <input type="tel" class="form-control" id="telefoneFornecedor"
                                        name="telefoneFornecedor" placeholder="Digite o telefone do fornecedor"
                                        required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Cadastrar fornecedor</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- card do carrinho -->
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Novo carrinho</h5>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="mb-3">
                                    <label for="nomeCarrinho" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="nomeCarrinho" name="nomeCarrinho"
                                        placeholder="Digite o nome do carrinho" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Cadastrar carrinho</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </main>

    </div>
</body>


</html>