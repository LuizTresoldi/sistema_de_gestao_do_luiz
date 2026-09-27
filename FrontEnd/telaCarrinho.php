<?php
require_once '../BackEnd/verificarSessao.php';
require_once '../BackEnd/Carrinho.php';

$carrinho = new Carrinho($_SESSION['id_usuario']);
$carrinhos = $carrinho->listar();

$idCarrinho = $_GET['carrinho'] ?? '';
$produtos = $idCarrinho !== '' ? $carrinho->listarProdutos($idCarrinho) : [];

$quantidade = count($produtos);
$total = array_sum(array_column($produtos, 'preco'));
?>
<!DOCTYPE html>
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
            <?php include 'mensagens.php'; ?>
            <form method="GET" class="mt-3">
                <select class="form-select" name="carrinho" style="max-width: 300px" onchange="this.form.submit()">
                    <option value="">Selecione um carrinho</option>
                    <?php foreach ($carrinhos as $c): ?>
                        <option value="<?= $c['id'] ?>" <?= $c['id'] == $idCarrinho ? 'selected' : '' ?>>
                            <?= htmlspecialchars($c['nome']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>

            <div class="row g-4 mt-3">
                <div class="col-md-8">
                    <table class="table table-hover align-middle" id="tabelaCarrinho">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Fornecedor</th>
                                <th>Preço</th>
                                <th class="text-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($produtos)): ?>
                                <tr>
                                    <td colspan="4" class="text-center text-body-secondary py-4">
                                        <?= $idCarrinho === '' ? 'Escolha um carrinho para ver os produtos.' : 'Este carrinho está vazio.' ?>
                                    </td>
                                </tr>
                            <?php endif; ?>

                            <?php foreach ($produtos as $p): ?>
                                <tr>
                                    <td>
                                        <?= htmlspecialchars($p['nome']) ?>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($p['fornecedor']) ?>
                                    </td>
                                    <td>R$
                                        <?= number_format($p['preco'], 2, ',', '.') ?>
                                    </td>
                                    <td class="text-end">
                                        <form action="../BackEnd/removerDoCarrinho.php" method="POST">
                                            <input type="hidden" name="id_carrinho" value="<?= $idCarrinho ?>">
                                            <input type="hidden" name="id_produto" value="<?= $p['id'] ?>">
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Remover</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
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
                                <span id="qtdProdutos">
                                    <?= $quantidade ?>
                                </span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between fs-5 fw-bold">
                                <span>Valor total</span>
                                <span id="valorTotal">R$
                                    <?= number_format($total, 2, ',', '.') ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>
</body>


</html>