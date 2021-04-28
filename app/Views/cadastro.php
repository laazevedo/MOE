<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Cadastro</title>
</head>

<body>
    <div class="container">
        <h1>Cadastro</h1>
        <form method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Informe seu email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Informe a senha" minlength="6" required>
                <small id="senhaHelp" class="form-text text-muted">No mínimo 6 caracteres, com uma letra maiúscula, um caractere especial e um caractere numérico.</small>
            </div>
            <div class="form-group">
                <label for="repetirSenha">Repetir senha</label>
                <input type="password" class="form-control" id="repetirSenha" name="repetirSenha" placeholder="Informe a senha" minlength="6" required>
                <small id="repetirSenhaHelp" class="form-text text-muted">Deve ser igual à senha informada no campo anterior</small>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo" id="estagiario" value="estagiario" checked>
                <label class="form-check-label" for="estagiario">
                    Estagiário
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo" id="empregador" value="empregador">
                <label class="form-check-label" for="empregador">
                    Empregador
                </label>
            </div>
            <?php if (isset($validacao)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $validacao->listErrors() ?>
                </div>
            <?php endif; ?>
            <div></div>
            <button type="submit" class="btn btn-primary">Criar Conta</button>
        </form>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>