<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro no Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="d-flex justify-content-center align-items-center vh-100 bg-body-tertiary">
    <div class="card p-4" style="width: 450px;">
        <h2 class="text-left mb-4">Cadastro</h2>
        <form action="../BackEnd/processaCadastro.php" method="POST">
            <div class="mb-3">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required
                        placeholder="Digite seu nome">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required
                        placeholder="Digite seu e-mail">
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" required
                        placeholder="Digite sua senha">
                </div>
                <div class="mb-3">
                    <label for="senhaRepetir" class="form-label">Confirmar Senha</label>
                    <input type="password" class="form-control" id="senhaRepetir" name="senhaRepetir" required
                        placeholder="Confirme sua senha">
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
            <p>Já possui cadastro? <a href="loginSistema.php">Clique aqui</a></p>
        </form>
    </div>
</body>

</html>