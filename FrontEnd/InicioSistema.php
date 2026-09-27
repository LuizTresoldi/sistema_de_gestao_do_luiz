<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex min-vh-100">
        <!-- Include para não repetir o código da barra lateral em todas as telas. -->
        <?php include 'barraLateral.php'; ?>
        <main class="flex-grow-1 p-4">
            <h1>Bem-vindo ao Sistema</h1>
            <h5>Escolha uma das opções abaixo:</h5>
        <div class="row g-3 mt-4">
            <div class="col-md-3">
                <div class="card h-100 text-center shadow-sm card-atalho">
                    <div class="card-body">
                        <i class="bi bi-grid fs-1 text-primary"></i>
                        <h5 class="card-title mt-2">
                            <a href="telaCatalogo.php"
                                class="stretched-link text-decoration-none text-body">Catálogo</a>
                        </h5>
                        <p class="card-text text-body-secondary">Veja os produtos e selecione os que deseja adicionar ao
                            carrinho.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 text-center shadow-sm card-atalho">
                    <div class="card-body">
                        <i class="bi bi-plus-square fs-1 text-primary"></i>
                        <h5 class="card-title mt-2">
                            <a href="telaCadastros.php"
                                class="stretched-link text-decoration-none text-body">Cadastros</a>
                        </h5>
                        <p class="card-text text-body-secondary">Cadastre novos produtos, fornecedores e cestas.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 text-center shadow-sm card-atalho">
                    <div class="card-body">
                        <i class="bi bi-pencil-square fs-1 text-primary"></i>
                        <h5 class="card-title mt-2">
                            <a href="telaAtualizarDados.php"
                                class="stretched-link text-decoration-none text-body">Atualizar Dados</a>
                        </h5>
                        <p class="card-text text-body-secondary">Edite ou exclua os registros já cadastrados.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 text-center shadow-sm card-atalho">
                    <div class="card-body">
                        <i class="bi bi-cart fs-1 text-primary"></i>
                        <h5 class="card-title mt-2">
                            <a href="telaCarrinho.php"
                                class="stretched-link text-decoration-none text-body">Carrinho</a>
                        </h5>
                        <p class="card-text text-body-secondary">Confira os produtos selecionados e o valor total.</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>


</html>