<!doctype html>
<html lang="pt">

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
        <h1>Cadastro Estagiário</h1>
        <?php if (isset($validacao)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $validacao->listErrors() ?>
            </div>
        <?php endif; ?>
        <form action="cadastro/estagiario" method="post">
            <div class="form-group">
                <label for="nomeEstagiario">Nome</label>
                <input class="form-control" id="nomeEstagiario" name="nomeEstagiario" placeholder="Informe seu nome" required>
            </div>
            <div class="form-group">
                <label for="curso">Curso</label>
                <input class="form-control" id="curso" name="curso" placeholder="Informe seu curso" required>
            </div>
            <div class="form-group">
                <label for="minicurriculo">Minicurrículo</label>
                <textarea class="form-control" id="minicurriculo" name="minicurriculo" placeholder="Informe seu minicurrículo" required></textarea>
            </div>
            <div class="form-group">
                <label for="anoIngresso">Ano de ingresso</label>
                <input type="text" class="form-control" id="anoIngresso" name="anoIngresso" />
            </div>
            <div class="form-group">
                <label for="semestre">Semestre atual</label>
                <input type="number" class="form-control" id="semestre" name="semestre" placeholder="Informe o semestre do curso" min="1" max="20" required>
            </div>
            <div>
                <input type="hidden" name="email" value=<?= $email ?>>
                <input type="hidden" name="senha" value=<?= $senha ?>>
                <input type="hidden" name="tipo" value=<?= $tipo ?>>
            </div>
            <button type="submit" class="btn btn-primary">Criar Conta</button>
        </form>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>

<script>
    $("#anoIngresso").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
    });
</script>