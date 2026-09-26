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
        <aside class="bg-dark text-white p-3 d-flex flex-column" style="width: 250px;">
            <h5>Gestão de Produtos</h5>

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="telaDeInicio.php" class="nav-link text-white">Início</a>
                </li>
                <li class="nav-item">
                    <a href="telaProdutos.php" class="nav-link text-white">Produtos</a>
                </li>
                <li class="nav-item">
                    <a href="telaCadastros.php" class="nav-link text-white">Cadastros</a>
                </li>
                <li class="nav-item">
                    <a href="telaAtualizarDados.php" class="nav-link text-white">Atualizar Dados</a>
                </li>
                <li class="nav-item">
                    <a href="telaCarrinho.php" class="nav-link text-white">Carrinho</a>
                </li>
            </ul>
            <a href="sairSistema.php" class="nav-link text-danger mt-auto">Sair</a>
        </aside>

        <main class="flex-grow-1 p-4">

        </main>

    </div>
</body>


</html>