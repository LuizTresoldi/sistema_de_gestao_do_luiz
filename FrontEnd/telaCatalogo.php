<?php
require_once '../BackEnd/verificarSessao.php';
require_once '../BackEnd/Produto.php';
require_once '../BackEnd/Carrinho.php';

$produtos = (new Produto())->listar();
$carrinhos = (new Carrinho($_SESSION['id_usuario']))->listar();
?>
<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex min-vh-100">
        <!-- Include para não repetir o código da barra lateral em todas as telas. -->
        <?php include 'barraLateral.php'; ?>
        <main class="flex-grow-1 p-4">
            <h1>Catálogo de Produtos</h1>
            <h5>Selecione os produtos que deseja adicionar ao carrinho</h5>
            <?php include 'mensagens.php'; ?>
            <form action="../BackEnd/adicionarCarrinho.php" method="POST" id="formCatalogo">

                <table class="table table-hover align-middle mt-4">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="form-check-input" id="selecionarTodos"></th>
                            <th>Produto</th>
                            <th>Fornecedor</th>
                            <th>Preço</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($produtos)): ?>
                            <tr>
                                <td colspan="4" class="text-center text-body-secondary py-4">
                                    Nenhum produto cadastrado ainda.
                                </td>
                            </tr>
                        <?php endif; ?>

                        <?php foreach ($produtos as $p): ?>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input produto-check" name="produtos[]"
                                        value="<?= $p['id'] ?>">
                                </td>
                                <td><?= htmlspecialchars($p['nome']) ?></td>
                                <td><?= htmlspecialchars($p['fornecedor']) ?></td>
                                <td>R$ <?= number_format($p['preco'], 2, ',', '.') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="d-flex gap-2 align-items-center">
                    <select class="form-select" name="id_carrinho" style="max-width: 300px" required>
                        <option value="">Selecione um carrinho</option>
                        <?php foreach ($carrinhos as $c): ?>
                            <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['nome']) ?></option>
                        <?php endforeach; ?>
                    </select>

                    <button type="submit" class="btn btn-primary" id="btnAdicionar" disabled>
                        Adicionar ao carrinho
                    </button>

                    <span class="text-body-secondary" id="contador">0 produtos selecionados</span>
                </div>

                <?php if (empty($carrinhos)): ?>
                    <p class="text-danger mt-2">
                        Você ainda não tem carrinhos. <a href="telaCadastros.php">Crie um na tela de Cadastros</a>.
                    </p>
                <?php endif; ?>
            </form>

            <script>
                const checks = document.querySelectorAll('.produto-check');
                const selecionarTodos = document.getElementById('selecionarTodos');
                const botao = document.getElementById('btnAdicionar');
                const contador = document.getElementById('contador');

                function atualizar() {
                    const marcados = document.querySelectorAll('.produto-check:checked').length;
                    contador.textContent = marcados + (marcados === 1 ? ' produto selecionado' : ' produtos selecionados');
                    botao.disabled = marcados === 0;
                }

                checks.forEach(c => c.addEventListener('change', atualizar));

                selecionarTodos.addEventListener('change', () => {
                    checks.forEach(c => c.checked = selecionarTodos.checked);
                    atualizar();
                });

                document.getElementById('formCatalogo').addEventListener('submit', (e) => {
                    if (document.querySelectorAll('.produto-check:checked').length === 0) {
                        e.preventDefault();
                        alert('Selecione pelo menos um produto.');
                    }
                });
            </script>
        </main>

    </div>
</body>


</html>