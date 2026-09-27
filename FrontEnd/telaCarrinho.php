<!DOCTYPE html>
<?php require_once '../BackEnd/verificarSessao.php'; ?>
<html lang="pt-BR" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex min-vh-100">
        <!-- Include para não repetir o código da barra lateral em todas as telas. -->
        <?php include 'barraLateral.php'; ?>
        <main class="flex-grow-1 p-4">
            <h1>Carrinho</h1>
            <h5>Visualize seu carrinho</h5>
            <select class="form-select mb-3" id="selectCarrinho" style="max-width: 300px" required>
                <option value="">Selecione um carrinho</option>
            </select>
            <div class="row g-4 mt-3">
                <div class="col-md-8">
                    <table class="table table-hover align-middle" id="tabelaFornecedores">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Fornecedor</th>
                                <th>Preço</th>
                                <th class="text-end" style="width: 120px">Ações</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-dark text-white">
                            <h5 class="mb-0">Resumo</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Quantidade de produtos</span>
                                <span id="quantidadeProdutos">0</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between fs-5 fw-bold">
                                <span>Valor total</span>
                                <span id="valorTotal">R$ 0,00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>
</body>


</html>