<!DOCTYPE html>
<?php require_once '../BackEnd/verificarSessao.php'; ?>
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
            <h5>Veja os produtos disponíveis em nosso catálogo:</h5>
            <table class="table table-hover align-middle mt-4">
                <thead>
                    <tr>
                        <th>Selecionar</th>
                        <th>Produto</th>
                        <th>Fornecedor</th>
                        <th>Preço</th>
                    </tr>
                </thead>
            </table>
        </main>

    </div>
</body>


</html>